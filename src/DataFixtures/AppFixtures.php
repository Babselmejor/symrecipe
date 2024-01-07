<?php

namespace App\DataFixtures;

use App\Entity\Ingredient;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;
use faker\Generator;

class AppFixtures extends Fixture
{
    /**
     * 
     *
     * @var Generator
     */
    private Generator $faker;

    public function __construct()
    {
        $this->faker = Factory::create('fr_FR');
    }

    public function load(ObjectManager $manager): void
    {
        // $product = new Product();
        // $manager->persist($product);

        for ($i=0; $i < 50 ; $i++) { 
            # code...
            $ingredient = new Ingredient();
            //$ingredient->setName('Ingredient ' . $i)
            $ingredient->setName($this->faker->word())
                ->setPrice(mt_rand(10, 100));

            $manager->persist($ingredient); // Dire à l'objet qu'il est prés à aller en base de données 
        }

        $manager->flush(); // Ensuite flush via manager(contient +sieurs méthodes) que l'on recupere via Doctrine\Persistence\ObjectManager
    }
}
//madeinsenegal.dev, galsen.dev