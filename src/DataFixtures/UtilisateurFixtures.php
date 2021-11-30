<?php

namespace App\DataFixtures;

use App\Entity\Utilisateur;
use App\Entity\Concessionnaire;
use App\Entity\Marchand;
use App\Entity\Fabriquant;
use App\Entity\Administrateur;
use App\Entity\Concessionnairemarchand;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class UtilisateurFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {  
        $current = new \DateTime('@'.strtotime('now')); 

        $user = new Utilisateur();
        $user->setNom("bulvard")
        ->setCourriel("bulvard@genie.com")
        ->setTelephone("+54215365")
        ->setNomutilisateur("user")
        ->setMotdepasse("+54215365")
        ->setDatecreation($current)
        ->setDatemodification($current);
        $manager->persist($user);






        $fab1 = new Fabriquant();
        $fab1->setActifcrm(true);
        $fab1->setActifservice(true);
        $fab1->setActifaccueil(true);
        $fab1->setNom("Audi");
        $fab1->setLien("www.audi.com");
        $fab1->setDatecreation($current);
        $fab1->setDatemodification($current);
        $manager->persist($fab1);

        $fab2 = new Fabriquant();
        $fab2->setActifcrm(true);
        $fab2->setActifservice(true);
        $fab2->setActifaccueil(true);
        $fab2->setNom("renault");
        $fab2->setLien("www.renault.com");
        $fab2->setDatecreation($current);
        $fab2->setDatemodification($current);
        $manager->persist($fab2);
        
        
        $a1 = new Administrateur();
        $a1->setAuthenvoiemail(true);
        $a1->setAuthenvoisms(true);
        $a1->setUtilisateur($user);
        $manager->persist($a1);






        
        

        $cm = new Concessionnairemarchand();
        $cm->setActif(true)
        ->setlogo("logo")
        ->setSiteweb("www.bulvard.com")
        ->setLiendealertrack("hhtp://bulvarrd")
        ->setDescription("hhtp://bulvarrd")
        ->addFabriquant($fab1)
        ->addFabriquant($fab2)
        ->setUtilisateur($user);
        $manager->persist($cm);

        $conc = new Concessionnaire();
        $conc->setConcessionnairemarchand($cm);
        $manager->persist($conc);

        $marh = new Marchand();
        $marh->setConcessionnairemarchand($cm);
        $manager->persist($marh);
      
        $manager->flush();
    }
}
