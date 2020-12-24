<?php

namespace App\Entity;

use App\Repository\ChallengeRunRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ChallengeRunRepository::class)
 */
class ChallengeRun extends Entity
{
    // TODO user
    // TODO mode
    // TODO delete when done

    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private int $id;

    /**
     * @ORM\ManyToOne(targetEntity=ChallengeSection::class)
     */
    private ChallengeSection $section;

    /**
     * @ORM\OneToOne(targetEntity=Challenge::class, cascade={"persist"})
     * @ORM\JoinColumn(nullable=true)
     */
    private ?Challenge $current;

    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @return ChallengeSection
     */
    public function getSection(): ChallengeSection
    {
        return $this->section;
    }

    /**
     * @param ChallengeSection $section
     * @return ChallengeRun
     */
    public function setSection(ChallengeSection $section): ChallengeRun
    {
        $this->section = $section;
        return $this;
    }

    public function getCurrent(): ?Challenge
    {
        return $this->current;
    }

    public function setCurrent(?Challenge $current): self
    {
        $this->current = $current;

        return $this;
    }
}
