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
    // TODO delete when done

    /**
     * @ORM\ManyToOne(targetEntity=ChallengeSection::class)
     */
    private ChallengeSection $section;

    /**
     * @ORM\OneToOne(targetEntity=Challenge::class, cascade={"persist"})
     * @ORM\JoinColumn(nullable=true)
     */
    private ?Challenge $current;

    /**
     * @ORM\OneToOne(targetEntity=RunMode::class)
     */
    private ?RunMode $mode;

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

    /**
     * @return RunMode|null
     */
    public function getMode(): ?RunMode
    {
        return $this->mode;
    }

    /**
     * @param RunMode|null $mode
     * @return ChallengeRun
     */
    public function setMode(?RunMode $mode): ChallengeRun
    {
        $this->mode = $mode;
        return $this;
    }
}
