<?php

namespace App\Controller;

use App\Entity\User;
use App\Entity\Annonce;
use App\Form\AnnonceType;
use App\Form\ImagType;
use App\Repository\AnnonceRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class AdminController extends AbstractController
{
    /**
     * @Route("/admin/types", name="admin")
     */
    public function index(AnnonceRepository $repo)
    {  
        $annonce = $repo->findAll();
        return $this->render('admin/annonce.html.twig', [
            'annonces' => $annonce,
            
        ]);
    }

     /**
      * @Route("/admin/types/create", name="create")
     * @Route("/admin/types/modif/{id}", name="modif", methods="GET|POST")
     */
    public function modif( Annonce $annonce = null, Request $req, EntityManagerInterface $om )
    {  
        if(!$annonce){
            $annonce= new Annonce();
            
        }
        $user = $this->getUser();
        $form = $this->createForm(AnnonceType::class, $annonce);
        $form->handleRequest($req);
        if($form->isSubmitted() && $form->isValid()){
           $annonce->setUser($user);
            $annonce->setArchived(false);
            $annonce->setseen(0);
            $annonce->setValide(false);
            $annonce->setValiderPar($user->getUsername());
            $om->persist($annonce);
            $om->flush();
            $this->addFlash("success", "l'action est validée");
            return $this->redirectToRoute('accueil');
        }
        return $this->render('admin/modif.html.twig', [
            'annonces' => $annonce,
            'form'=> $form->createView(),
            'isModification'=> $annonce->getId() !== null
            
        ]);
    }

     /**
     * @Route("admin/types/modif/{id}", name="supp", methods={"delete"})
     */
    public function supp(Annonce $annonce, Request $request,  EntityManagerInterface $manager)
    {
        
        if($this->isCsrfTokenValid("supp". $annonce->getId(), $request->get('_token'))){
            $manager->remove($annonce);
            $manager->flush();
            $this->addFlash("success", "la suppression est bien effectuée");
           return  $this->redirectToRoute("accueil");
        }
    }

    /**
     * @Route("/admin/types/valider", name="valider")
     */
    public function adminanoonce(AnnonceRepository $repo)
    {  
        $annonce = $repo->findAll();
        return $this->render('admin/valider.html.twig', [
            'annonces' => $annonce,
            
        ]);
    }

    /**
     * @Route("/admin/types/validerannonce/{id}", name="v")
     */
    public function valider( Annonce $annonce, Request $req, EntityManagerInterface $om )
    {  
        
            $user = $this->getUser();
            $annonce->setUser($user);
            $annonce->setValide(true);
            $annonce->setValiderPar($user->getUsername());
            $om->persist($annonce);
            $om->flush();
            $this->addFlash("success", "l'action est validée");
            return $this->redirectToRoute('valider');
       
    }
}
