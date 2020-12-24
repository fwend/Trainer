<?php

namespace App\DataFixtures;

use App\Entity\RunMode;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

// php bin/console do:fi:lo --append

class AppFixtures extends Fixture
{
    /**
     * @param ObjectManager $manager
     */
    public function load(ObjectManager $manager): void
    {
        $mode = new RunMode();
        $mode->setType(RunMode::TYPE_RANDOM);
        $mode->setName('Random 10');
        $mode->setLength(10);
        $mode->setPosition(0);
        $manager->persist($mode);

        $mode = new RunMode();
        $mode->setType(RunMode::TYPE_RANDOM);
        $mode->setName('Random 25');
        $mode->setLength(25);
        $mode->setPosition(1);
        $manager->persist($mode);

        $mode = new RunMode();
        $mode->setType(RunMode::TYPE_RANDOM);
        $mode->setName('Random 50');
        $mode->setLength(50);
        $mode->setPosition(2);
        $manager->persist($mode);

        $mode = new RunMode();
        $mode->setType(RunMode::TYPE_ALL);
        $mode->setName('All');
        $mode->setLength(null);
        $mode->setPosition(3);
        $manager->persist($mode);

        $manager->flush();
    }
}
