<?php

namespace App\Entity;

use App\Repository\RunHistoryRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=RunHistoryRepository::class)
 */
class RunHistory extends Entity
{
    /**
     * @ORM\ManyToMany(targetEntity=Challenge::class)
     */
    private Collection $challenges;

    /**
     * @ORM\OneToOne(targetEntity=ChallengeRun::class, inversedBy="runHistory")
     * @ORM\JoinColumn(nullable=false)
     */
    private ?ChallengeRun $run;

    public function __construct()
    {
        $this->challenges = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @return Collection|Challenge[]
     */
    public function getChallenges(): Collection
    {
        return $this->challenges;
    }

    public function addChallenge(Challenge $challenge): self
    {
        if (!$this->challenges->contains($challenge)) {
            $this->challenges[] = $challenge;
        }

        return $this;
    }

    public function removeChallenge(Challenge $challenge): self
    {
        if ($this->challenges->contains($challenge)) {
            $this->challenges->removeElement($challenge);
        }

        return $this;
    }

    public function getRun(): ?ChallengeRun
    {
        return $this->run;
    }

    public function setRun(ChallengeRun $run): self
    {
        $this->run = $run;

        return $this;
    }
}
