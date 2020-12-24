<?php

namespace App\Services;

use App\Entity\Challenge;
use App\Entity\ChallengeRun;
use App\Entity\RunMode;
use App\Repository\ChallengeCategoryRepository;
use App\Repository\ChallengeRepository;

class ChallengeSelector
{
    private ChallengeRepository $challengeRepo;
    private ChallengeCategoryRepository $categoryRepo;

    public function __construct(
        ChallengeRepository $challengeRepo,
        ChallengeCategoryRepository $categoryRepo
    )
    {
        $this->challengeRepo = $challengeRepo;
        $this->categoryRepo = $categoryRepo;
    }

    /**
     * @param ChallengeRun $run
     * @return Challenge|null
     */
    public function findFirst(
        ChallengeRun $run): ?Challenge
    {
        $mode = $run->getMode();

        switch ($mode->getType()) {

            default:
            case RunMode::TYPE_ALL:
                return $this->challengeRepo->findFirstFromSection($run->getSection());

            case RunMode::TYPE_RANDOM:
                return $this->findRandom($run);
        }
    }

    /**
     * @param Challenge $current
     * @param ChallengeRun $run
     * @return Challenge|null
     */
    public function findNextChallenge(
        Challenge $current,
        ChallengeRun $run): ?Challenge
    {
        switch ($run->getMode()->getType()) {

            default:
            case RunMode::TYPE_ALL:

                $next = $this->challengeRepo->findNextChallenge($current);
                if (!$next) {
                    $nextCategory = $this->categoryRepo->findNextCategory($current->getCategory());
                    if ($nextCategory) {
                        $next = $this->challengeRepo->findFirstFromCategory($nextCategory);
                    }
                }
                return $next;

            case RunMode::TYPE_RANDOM:
                return $this->findRandom($run);
        }
    }

    public function findRandom(ChallengeRun $run)
    {
        if ($run->getCount() >= $run->getMode()->getLength()) {
            return null;
        }
        $category = $this->categoryRepo->findRandomCategory($run->getSection());
        $candidates = $category->getChallenge()->toArray();
        $candidateKey = array_rand($candidates);
        $next = $candidates[$candidateKey];
        if ($next) {
            $run->incrementCount();
        }
        // avoid duplicates ?
        return $next;
    }
}