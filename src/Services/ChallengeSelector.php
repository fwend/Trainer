<?php

namespace App\Services;

use App\Entity\Challenge;
use App\Entity\ChallengeRun;
use App\Entity\RunHistory;
use App\Entity\RunMode;
use App\Repository\ChallengeCategoryRepository;
use App\Repository\ChallengeRepository;
use App\Services\interfaces\ChallengeSelectorInterface;

class ChallengeSelector implements ChallengeSelectorInterface
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
    public function findFirst(ChallengeRun $run): ?Challenge
    {
        switch ($run->getMode()->getType()) {

            default:
            case RunMode::TYPE_ALL:
                return $this->challengeRepo->findFirstFromSection($run->getSection());

            case RunMode::TYPE_RANDOM:
                $first = $this->findFirstRandom($run);
                $runHistory = new RunHistory();
                $runHistory->addChallengeId($first->getId());
                $run->setRunHistory($runHistory);
                return $first;
        }
    }

    /**
     * @param Challenge $current
     * @param ChallengeRun $run
     * @return Challenge|null
     */
    public function findNext(
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
                return $this->findNextRandom($run);
        }
    }

    /**
     * @param ChallengeRun $run
     * @return Challenge|null
     */
    private function findFirstRandom(ChallengeRun $run): ?Challenge
    {
        if ($run->getCount() >= $run->getMode()->getLength()) {
            return null;
        }

        $ids = $this->challengeRepo->findChallengeIds($run->getSection());

        if (count($ids) && shuffle($ids)) {
            $id = array_shift($ids);
            if ($next = $this->challengeRepo->find($id)) {
                $run->incrementCount();
            }
            return $next;
        }
        return null;
    }

    /**
     * @param ChallengeRun $run
     * @return Challenge|null
     */
    private function findNextRandom(ChallengeRun $run): ?Challenge
    {
        if ($run->getCount() >= $run->getMode()->getLength()) {
            return null;
        }

        $alreadyDone = $run->getRunHistory()->getChallengeIds();

        $ids = $this->challengeRepo->findChallengeIds($run->getSection());
        $ids = array_diff($ids, $alreadyDone);

        if (count($ids) && shuffle($ids)) {
            $id = array_shift($ids);
            if ($next = $this->challengeRepo->find($id)) {
                $run->incrementCount();
                $run->getRunHistory()->addChallengeId($next->getId());
            }
            return $next;
        }
        return null;
    }
}