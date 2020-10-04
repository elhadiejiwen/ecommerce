<?php

namespace App\DataFixtures;

use App\Entity\User;
use App\Entity\Image;
use App\Entity\Annonce;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class AppFixtures extends Fixture
{

    public function __construct(UserPasswordEncoderInterface $encode)
    {
    $this->encode = $encode;
    }
    public function load(ObjectManager $manager)
    {   
             $u1 = new User();
            $u1->setUsername("elhadi");
            $u1->setPrenom("ejiwen");
            $u1->setEmail("lha@gm.com");
             $plain = '123456';
              $b1 = $this->encode->encodePassword($u1, $plain);
              $u1->setPassword($b1);
              $u1->setTel(36363636);
              $u1->setRoles(["USER_ROLE"]);
              $manager->persist($u1);

              $m1 = new Image();
              $m1->setLibelle("Modele1.jpg")
                 ->setNom("elhadi")
                 ;
              $manager->persist($m1);   
              $m2 = new Image();
              $m2->setLibelle("Modele2.jpg")
                  ->setNom("elhadi");

              $manager->persist($m2); 
              $m3 = new Image();
              $m3->setLibelle("Modele3.jpg")
                 ->setNom("elhadi");
              $manager->persist($m3);  
              $m4 = new Image();
              $m4->setLibelle("Modele4.jpg")
                 ->setNom("elhadi");
              $manager->persist($m4);  
              $m5 = new Image();
              $m5->setLibelle("Modele5.jpg")
                 ->setNom("elhadi");
              $manager->persist($m5); 
              $m6 = new Image();
              $m6->setLibelle("Modele6.jpg")
                 ->setNom("elhadi");
              $manager->persist($m6);
     
             $a1 = new Annonce();
             $a1->setTitre("Toyota")
                ->setPrix(120)
               // ->setImage1($m1)
                // ->setImage2($m2)
                // ->setImage3($m3)
                ->setNegociable(false)
                ->setDescription("une voiture de type toyota en bonne etat")
                
                ->setArchived(false)
                ->setSeen(0)
                ->setValide(false)
                ->setValiderpar("elhadi")
                ->setUser($u1)
                
                ;
                $manager->persist($a1);
     
                $a2 = new Annonce();
                $a2->setTitre("V8")
                ->setPrix(1200)
                //->setImage1($m1)
                // ->setImage2($m2)
                // ->setImage3($m3)
                ->setNegociable(false)
                ->setDescription("une voiture de type toyota en bonne etat")
                ->setValiderpar("elhadi")
                ->setArchived(false)
                ->setSeen(0)
                ->setValide(false)
                ->setUser($u1)
               
                ;
                $manager->persist($a2);
     
                $a3 = new Annonce();
                $a3->setTitre("prado")
                ->setPrix(425)
                //->setImage1($m1)
                // ->setImage2($m2)
                // ->setImage3($m3)
                ->setNegociable(true)
                ->setDescription("une voiture de type toyota en bonne etat")
                ->setValiderpar("elhadi")
                ->setArchived(false)
                ->setSeen(0)
                ->setValide(false)
                ->setUser($u1)
                
                ;
                $manager->persist($a3);
     
                $a4 = new Annonce();
                $a4->setTitre("corolla")
                ->setPrix(15)
               // ->setImage1($m1)
                // ->setImage2($m2)
                // ->setImage3($m3)
                ->setNegociable(true)
                ->setDescription("une voiture de type toyota en bonne etat")
                ->setValiderpar("elhadi")
                ->setArchived(false)
                ->setSeen(0)
                ->setValide(false)
                ->setUser($u1)
               
                ;
                $manager->persist($a4);
     
                $a5 = new Annonce();
                $a5->setTitre("le")
                ->setPrix(420)
                ->setNegociable(false)
                ->setDescription("une voiture de type toyota en bonne etat")
                // ->setImage1($m1)
                // ->setImage2($m2)
                // ->setImage3($m3)
                ->setArchived(false)
                ->setSeen(0)
                ->setValide(false)
                ->setUser($u1)
                ->setValiderpar("elhadi")
                ;
                $manager->persist($a5);
     
                $a6 = new Annonce();
                $a6->setTitre("camry")
                   ->setPrix(1000)
                   ->setNegociable(true)
                   ->setDescription("une voiture de type toyota en bonne etat")
                //    ->setImage1($m1)
                //    ->setImage2($m2)
                //    ->setImage3($m3)
                   ->setArchived(false)
                   ->setSeen(0)
                   ->setValide(false)
                   ->setUser($u1)
                   ->setValiderpar("elhadi")
                   ;
                   $manager->persist($a6);

                   
                   
             // $product = new Product();
             // $manager->persist($product);
     
             $manager->flush();
    }
}
