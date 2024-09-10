<?php

namespace App\DataFixtures;

use App\Entity\Exercise;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;

class ExerciseFixture extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $faker = Factory::create();

        foreach (range(0, 30) as $value) {
            $exercise = new Exercise();
            $exercise->setName($faker->text(20));
            $exercise->setDescription($faker->text(500));
            $exercise->setImageLink($faker->imageUrl());
            $exercise->setVideoLink('');
            $exercise->setCreated(new \DateTime());
            $exercise->setUpdated(new \DateTime());

            $manager->persist($exercise);
        }

        $manager->flush();
    }
}
