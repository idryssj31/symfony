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

class ContratFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $contrat = new Contrats();
        $contrat->setcontrat("CDI");
        $manager->persist($contrat);
        $contrat = new Contrats();
        $contrat->setcontrat("CDD");
        $manager->persist($contrat);
        $contrat = new Contrats();
        $contrat->setcontrat("Freelance");
        $manager->persist($contrat);
        // $product = new Product();
        // $manager->persist($product);

        $manager->flush();
    }
}
