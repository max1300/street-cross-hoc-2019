<?php

namespace App\DataFixtures;

use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use Faker;

class UserFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $faker = Faker\Factory::create('fr_FR');

        for($i = 0; $i < 11; $i++){
            $user = new User();
            $user->setUsername($faker->name);
            $user->setPassword($faker->password);
            $user->setEmail($faker->email);
        
            $manager->persist($user); 
        }
        

        $manager->flush();
    }
}
