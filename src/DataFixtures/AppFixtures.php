<?php

namespace App\DataFixtures;

use App\DataFixtures\data\Composer;
use App\DataFixtures\data\Doctrine;
use App\DataFixtures\data\Emmet;
use App\DataFixtures\data\Git;
use App\DataFixtures\data\Http;
use App\DataFixtures\data\LinuxCommandLine;
use App\DataFixtures\data\Mysql;
use App\DataFixtures\data\Npm;
use App\DataFixtures\data\Ports;
use App\DataFixtures\data\Runmodes;
use App\DataFixtures\data\Symfony;
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

    private array $sections = [];

    public function __construct(
        EntityManagerInterface $em,
        UserPasswordEncoderInterface $passwordEncoder)
    {
        $this->passwordEncoder = $passwordEncoder;
        $this->em = $em;

        $this->sections[LinuxCommandLine::$name] = LinuxCommandLine::$data;
        $this->sections[Http::$name] = Http::$data;
        $this->sections[Git::$name] = Git::$data;
        $this->sections[Composer::$name] = Composer::$data;
        $this->sections[Npm::$name] = Npm::$data;
        $this->sections[Emmet::$name] = Emmet::$data;
        $this->sections[Mysql::$name] = Mysql::$data;
        $this->sections[Ports::$name] = Ports::$data;
        $this->sections[Doctrine::$name] = Doctrine::$data;
        $this->sections[Symfony::$name] = Symfony::$data;
    }

    /**
     * @param ObjectManager $manager
     */
    public function load(ObjectManager $manager): void
    {
        $this->resetAutoIncrement();
        $this->loadUsers($manager);
        $this->loadRunModes($manager);
        $this->loadSections($manager);

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

    private function loadSections(ObjectManager $manager)
    {
        $count = 0;
        foreach ($this->sections as $name => $data) {
            $section = new ChallengeSection();
            $section->setPosition(++$count);
            $section->setName($name);
            $manager->persist($section);

            $this->processDataTextField($data, $section, $manager);
        }
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
