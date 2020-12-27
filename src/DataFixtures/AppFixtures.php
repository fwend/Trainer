<?php

namespace App\DataFixtures;

use App\DataFixtures\data\LinuxCommandLine;
use App\Entity\Challenge;
use App\Entity\ChallengeCategory;
use App\Entity\ChallengeSection;
use App\Entity\RunMode;
use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

// php bin/console do:fi:lo -n

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
        $this->loadLinuxCommandLineSection($manager);
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

    /**
     * @param ObjectManager $manager
     */
    public function loadLinuxCommandLineSection(ObjectManager $manager): void
    {
        $section = new ChallengeSection();
        $section->setPosition(1);
        $section->setName(LinuxCommandLine::$name);
        $manager->persist($section);

        $countCategories = 0;
        foreach (LinuxCommandLine::$data as $categoryName => $categoryData) {
            $category = new ChallengeCategory();
            $category->setPosition(++$countCategories);
            $category->setName($categoryName);
            $category->setSection($section);
            $section->addCategory($category);
            $manager->persist($category);

            foreach ($categoryData as $idx => $challengeData) {
                $challenge = new Challenge();
                $challenge->setPosition($idx);
                $challenge->setName($challengeData['name']);
                $challenge->setContent($challengeData['content']);
                $challenge->setAnswers($challengeData['answers']);
                $challenge->setCategory($category);
                $category->addChallenge($challenge);
                if (isset($challengeData['note'])) {
                    $challenge->setNote($challengeData['note']);
                }
                if (isset($challengeData['link'])) {
                    $challenge->setLink($challengeData['link']);
                }
                $manager->persist($challenge);
            }
        }

        $manager->flush();
    }
}
