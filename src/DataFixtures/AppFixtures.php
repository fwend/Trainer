<?php

namespace App\DataFixtures;

use App\Entity\RunMode;
use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

// php bin/console do:fi:lo --append

class AppFixtures extends Fixture
{
    private UserPasswordEncoderInterface $passwordEncoder;

    public function __construct(UserPasswordEncoderInterface $passwordEncoder)
    {
        $this->passwordEncoder = $passwordEncoder;
    }

    /**
     * @param ObjectManager $manager
     */
    public function load(ObjectManager $manager): void
    {
        $this->loadUsers($manager);
        $this->loadRunModes($manager);
        $manager->flush();
    }

    private function loadRunModes(ObjectManager $manager)
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
    }

    private function loadUsers(ObjectManager $manager)
    {
        $user = new User();
        $user->setPassword($this->passwordEncoder->encodePassword(
            $user,
            'D9Go88'
        ));
        $user->setRoles(['ROLE_ADMIN']);
        $user->setEmail('jos@iboss.nl');
        $manager->persist($user);
    }
}
