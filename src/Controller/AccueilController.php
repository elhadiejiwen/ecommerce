<?php

namespace App\Controller;

use App\Entity\Annonce;
use App\Entity\Image;
use App\Repository\AnnonceRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class AccueilController extends AbstractController
{
    /**
     * @Route("/accueil", name="accueil")
     */
    public function index(AnnonceRepository $repo)
    {  
       
         $annonce = $repo->findBy(array('valide' => true));
         //$annonce = $repo->findAll();
             return $this->render('accueil/annonce.html.twig', [
            'annonces' => $annonce,
            
        ]);
    }

    /**
     * @Route("/client/show/{id}", name="show")
     */
    public function show(Annonce $annonce, EntityManagerInterface $om)
    {  
        $ip = $_SERVER['REMOTE_ADDR'];
        if($ip !== $_SERVER['REMOTE_ADDR']){
        $nb = $annonce->getSeen()+1;
        $annonce->setSeen($nb);
        $om->persist($annonce);
        $om->flush();
        }
        return $this->render('accueil/show.html.twig', [
            'annonce' => $annonce,
        ]);
    }


}

