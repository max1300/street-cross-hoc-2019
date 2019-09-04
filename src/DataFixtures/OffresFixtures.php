<?php

namespace App\DataFixtures;

use App\Entity\Offre;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class OffresFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        for($i= 0; $i < 10; $i++){
            $offre = new Offre();
            $offre->setTitle("Mon offre n°$i")
                ->setDescription("tentative d enregistrement d'offre  n°$i")
                ->setCreatedAt(new \DateTime());

            $manager->persist($offre);
        }

        $manager->flush();

       
    }
}
