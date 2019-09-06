<?php

namespace App\DataFixtures;

use App\Entity\Offre;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use Faker;

class OffresFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $faker = Faker\Factory::create('fr_FR');

        for($i= 0; $i < 10; $i++){
            $offre = new Offre();
            $offre->setTitle($faker->jobTitle)
                ->setDescription($faker->sentence)
                ->setCreatedAt(new \DateTime());

            $manager->persist($offre);
        }

        $manager->flush();

       
    }
}
