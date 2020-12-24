<?php

namespace App\Entity;

use App\Repository\RunHistoryRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=RunHistoryRepository::class)
 */
class RunHistory extends Entity
{
    /**
     * @ORM\Column(type="array")
     */
    private array $challengeIds = [];

    /**
     * @ORM\OneToOne(targetEntity=ChallengeRun::class, inversedBy="runHistory")
     * @ORM\JoinColumn(nullable=false)
     */
    private ?ChallengeRun $run = null;

    public function getRun(): ?ChallengeRun
    {
        return $this->run;
    }

    public function setRun(ChallengeRun $run): self
    {
        $this->run = $run;

        return $this;
    }

    /**
     * @return array
     */
    public function getChallengeIds(): array
    {
        return $this->challengeIds;
    }

    /**
     * @param array $challengeIds
     * @return RunHistory
     */
    public function setChallengeIds(array $challengeIds): RunHistory
    {
        $this->challengeIds = $challengeIds;
        return $this;
    }

    public function addChallengeId(int $id)
    {
        $this->challengeIds[] = $id;
    }
}
