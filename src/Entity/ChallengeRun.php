<?php

namespace App\Entity;

use App\Repository\ChallengeRunRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ChallengeRunRepository::class)
 */
class ChallengeRun extends Entity
{
    /**
     * @ORM\ManyToOne(targetEntity=ChallengeSection::class)
     */
    private ChallengeSection $section;

    /**
     * @ORM\OneToOne(targetEntity=Challenge::class, cascade={"persist"})
     * @ORM\JoinColumn(nullable=true)
     */
    private ?Challenge $current = null;

    /**
     * @ORM\ManyToOne(targetEntity=RunMode::class)
     */
    private ?RunMode $mode = null;

    /**
     * @ORM\Column(type="integer")
     */
    private ?int $count = 0;

    /**
     * @ORM\OneToOne(targetEntity=RunHistory::class, mappedBy="run", cascade={"persist", "remove"})
     */
    private ?RunHistory $runHistory = null;

    /**
     * @ORM\ManyToOne(targetEntity=User::class, inversedBy="runs")
     * @ORM\JoinColumn(nullable=false)
     */
    private User $user;

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

    /**
     * @return int|null
     */
    public function getCount(): ?int
    {
        return $this->count;
    }

    /**
     * @param int $count
     * @return ChallengeRun
     */
    public function setCount(int $count): ChallengeRun
    {
        $this->count = $count;
        return $this;
    }

    public function incrementCount()
    {
        $this->count++;
    }

    public function getRunHistory(): ?RunHistory
    {
        return $this->runHistory;
    }

    public function setRunHistory(RunHistory $runHistory): self
    {
        $this->runHistory = $runHistory;

        // set the owning side of the relation if necessary
        if ($runHistory->getRun() !== $this) {
            $runHistory->setRun($this);
        }

        return $this;
    }

    public function getUser(): User
    {
        return $this->user;
    }

    public function setUser(User $user): self
    {
        $this->user = $user;

        return $this;
    }
}
