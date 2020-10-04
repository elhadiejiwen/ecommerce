<?php

namespace App\Controller;

use App\Entity\User;
use App\Form\InscriptionType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class InscriptionController extends AbstractController
{
    /**
     * @Route("/client/inscription", name="inscription")
     */
    public function index(EntityManagerInterface $om, Request $req, UserPasswordEncoderInterface $encoder)
    { 
        $use = new User();
        $form = $this->createForm(InscriptionType::class, $use);
        $form->handleRequest($req);
        if($form->isSubmitted() && $form->isValid()){
            $use->setRoles(["USER_ROLES"]);
            $passwordencod = $encoder->encodePassword($use, $use->getPassword());
            $use->setPassword($passwordencod);
            $om->persist($use);
            $om->flush();
            return $this->redirectToRoute("login");
        }
       

        return $this->render('inscription/inscription.html.twig', [
            'form'=> $form->createView()
        ]);
    }
/**
 * @Route("/client/Login", name="login")
 */
    public function login(AuthenticationUtils $utili){
          return $this->render('inscription/login.html.twig', [
              'lastname'=> $utili->getLastUsername(),
              'error'=> $utili->getLastAuthenticationError()
          ]);
    }
/**
 * @Route("/client/Logout", name="logout")
 */
   public function logout(){

   }
}
