<?php

namespace App\DataFixtures;

use App\DataFixtures\data\Composer;
use App\DataFixtures\data\Doctrine;
use App\DataFixtures\data\Emmet;
use App\DataFixtures\data\Git;
use App\DataFixtures\data\HttpHeaders;
use App\DataFixtures\data\HttpStatusCodes;
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
use App\Services\HtmlFormatter;
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
    private HtmlFormatter $formatter;

    public function __construct(
        EntityManagerInterface $em,
        UserPasswordEncoderInterface $passwordEncoder,
        HtmlFormatter $formatter)
    {
        $this->passwordEncoder = $passwordEncoder;
        $this->em = $em;
        $this->formatter = $formatter;
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
        $sections = [
            LinuxCommandLine::$name => LinuxCommandLine::$data,
            HttpStatusCodes::$name => HttpStatusCodes::$data,
            HttpHeaders::$name => HttpHeaders::$data,
            Git::$name => Git::$data,
            Composer::$name => Composer::$data,
            Npm::$name => Npm::$data,
            Emmet::$name => Emmet::$data,
            Mysql::$name => Mysql::$data,
            Ports::$name => Ports::$data,
            Doctrine::$name => Doctrine::$data,
            Symfony::$name => Symfony::$data
        ];

        $position = 0;
        foreach ($sections as $name => $data) {
            $section = new ChallengeSection();
            $section->setPosition(++$position);
            $section->setName($name);
            $manager->persist($section);

            $this->processData($data, $section, $manager);
        }
    }

    private function processData(
        array $data,
        ChallengeSection $section,
        ObjectManager $manager)
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
                $challenge->setContent($this->format($challengeData));
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

    private function format(array $data): string
    {
        if (isset($data['format'])) {
            return $this->formatter->format($data['content']);
        }
        return $data['content'];
    }
}
