<?php

namespace App\Services\interfaces;

use App\Entity\Challenge;
use App\Entity\ChallengeRun;

interface ChallengeSelectorInterface
{
    public function findFirst(ChallengeRun $run);

    public function findNext(Challenge $current, ChallengeRun $run);
}