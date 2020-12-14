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

class TypeFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $type = new Type();
        $type->settcontrat("Temps partiel");
        $manager->persist($type);
        $type = new Type();
        $type->settcontrat("Temps plein");
        $manager->persist($type);
        // $product = new Product();
        // $manager->persist($product);

        $manager->flush();
    }
}
