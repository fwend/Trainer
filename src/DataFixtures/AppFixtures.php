<?php

namespace App\DataFixtures;

use App\DataFixtures\data\Composer;
use App\DataFixtures\data\Git;
use App\DataFixtures\data\Http;
use App\DataFixtures\data\LinuxCommandLine;
use App\DataFixtures\data\Mysql;
use App\DataFixtures\data\Npm;
use App\DataFixtures\data\Ports;
use App\DataFixtures\data\Runmodes;
use App\Entity\Challenge;
use App\Entity\ChallengeCategory;
use App\Entity\ChallengeSection;
use App\Entity\RunMode;
use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\DBAL\Exception;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

// php bin/console do:fi:lo -n

class AppFixtures extends Fixture
{
    private UserPasswordEncoderInterface $passwordEncoder;
    private EntityManagerInterface $em;

    public function __construct(
        EntityManagerInterface $em,
        UserPasswordEncoderInterface $passwordEncoder)
    {
        $this->passwordEncoder = $passwordEncoder;
        $this->em = $em;
    }

    /**
     * @param ObjectManager $manager
     */
    public function load(ObjectManager $manager): void
    {
        $this->resetAutoIncrement();
        $this->loadUsers($manager);
        $this->loadRunModes($manager);
        $this->loadLinuxCommandLineSection($manager);
        $this->loadGitSection($manager);
        $this->loadHttpSection($manager);
        $this->loadNpmSection($manager);
        $this->loadComposerSection($manager);
        $this->loadMysqlSection($manager);
        $this->loadPortsSection($manager);
        $manager->flush();
    }

    private function loadRunModes(ObjectManager $manager)
    {
        foreach (Runmodes::$data as $mode) {
            $runMode = new RunMode();
            $runMode->setType($mode['type']);
            $runMode->setName($mode['name']);
            $runMode->setLength($mode['length']);
            $runMode->setPosition($mode['position']);
            $manager->persist($runMode);
        }
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

        $this->processDataTextField(LinuxCommandLine::$data, $section, $manager);

        $manager->flush();
    }

    /**
     * @param ObjectManager $manager
     */
    public function loadHttpSection(ObjectManager $manager): void
    {
        $section = new ChallengeSection();
        $section->setPosition(2);
        $section->setName(Http::$name);
        $manager->persist($section);

        $this->processDataTextField(Http::$data, $section, $manager);

        $manager->flush();
    }

    /**
     * @param ObjectManager $manager
     */
    public function loadGitSection(ObjectManager $manager): void
    {
        $section = new ChallengeSection();
        $section->setPosition(3);
        $section->setName(Git::$name);
        $manager->persist($section);

        $this->processDataTextField(Git::$data, $section, $manager);

        $manager->flush();
    }

    /**
     * @param ObjectManager $manager
     */
    public function loadNpmSection(ObjectManager $manager): void
    {
        $section = new ChallengeSection();
        $section->setPosition(4);
        $section->setName(Npm::$name);
        $manager->persist($section);

        $this->processDataTextField(Npm::$data, $section, $manager);

        $manager->flush();
    }

    /**
     * @param ObjectManager $manager
     */
    public function loadComposerSection(ObjectManager $manager): void
    {
        $section = new ChallengeSection();
        $section->setPosition(5);
        $section->setName(Composer::$name);
        $manager->persist($section);

        $this->processDataTextField(Composer::$data, $section, $manager);

        $manager->flush();
    }

    /**
     * @param ObjectManager $manager
     */
    public function loadMysqlSection(ObjectManager $manager): void
    {
        $section = new ChallengeSection();
        $section->setPosition(6);
        $section->setName(Mysql::$name);
        $manager->persist($section);

        $this->processDataTextField(Mysql::$data, $section, $manager);

        $manager->flush();
    }

    /**
     * @param ObjectManager $manager
     */
    public function loadPortsSection(ObjectManager $manager): void
    {
        $section = new ChallengeSection();
        $section->setPosition(7);
        $section->setName(Ports::$name);
        $manager->persist($section);

        $this->processDataTextField(Ports::$data, $section, $manager);

        $manager->flush();
    }

    private function processDataTextField(array $data, ChallengeSection $section, ObjectManager $manager)
    {
        $countCategories = 0;
        foreach ($data as $categoryName => $categoryData) {
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
    }

    private function resetAutoIncrement()
    {
        try {
            $this->em->getConnection()->executeStatement(
                 /** @lang Text */
                'ALTER TABLE trainer.challenge AUTO_INCREMENT = 1;
                 ALTER TABLE trainer.challenge_category AUTO_INCREMENT = 1;
                 ALTER TABLE trainer.challenge_run AUTO_INCREMENT = 1;
                 ALTER TABLE trainer.challenge_section AUTO_INCREMENT = 1;
                 ALTER TABLE trainer.run_history AUTO_INCREMENT = 1;
                 ALTER TABLE trainer.run_mode AUTO_INCREMENT = 1;
                 ALTER TABLE trainer.user AUTO_INCREMENT = 1;'
            );
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }
}
