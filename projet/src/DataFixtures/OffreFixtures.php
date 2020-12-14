<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;
use App\Entity\Offres;
use App\Entity\Contrats;
use App\Entity\Type;
use App\Repository\TypeRepository;
use App\Repository\OffresRepository;
use App\Repository\ContratsRepository;


class OffreFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $faker = Factory::create('fr_FR');

        


        for($i=0;$i<5;$i++) {
            $offre = new Offres;
            $offre->setTitle($faker->jobTitle())
                  ->setDescription($faker->realText($maxNbChars = 200))
                  ->setAdresse($faker->address())
                  ->setCodePostal($faker->postcode())
                  ->setDateDeCreation($faker->dateTimeBetween($startDate='-1 years', $endDate='-2 months'))
                  ->setDateDeMiseAJour($faker->dateTimeBetween($startDate='-2 months', $endDate='now'))
                  ->setVille($faker->city());
            $manager->persist($offre);
            
        }
        


        // $product = new Product();
        // $manager->persist($product);

        $manager->flush();
    }
}
