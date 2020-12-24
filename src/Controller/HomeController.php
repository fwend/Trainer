<?php

namespace App\Controller;

use App\Entity\Challenge;
use App\Entity\ChallengeRun;
use App\Entity\RunMode;
use App\Form\ChallengeRunType;
use App\Repository\ChallengeCategoryRepository;
use App\Repository\ChallengeRepository;
use App\Repository\ChallengeRunRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    // TODO user login
    // TODO easy admin

    /**
     * @Route("/", name="index")
     * @param Request $request
     * @param ChallengeRunRepository $runRepo
     * @param ChallengeRepository $challengeRepo
     * @param ChallengeCategoryRepository $categoryRepo
     * @return Response
     */
    public function indexAction(
        Request $request,
        ChallengeRunRepository $runRepo,
        ChallengeRepository $challengeRepo,
        ChallengeCategoryRepository $categoryRepo): Response
    {
        $run = $runRepo->findRun();

        if (!$run) {
            $form = $this->createForm(ChallengeRunType::class, $run = new ChallengeRun());

            $form->handleRequest($request);

            if ($form->isSubmitted() && $form->isValid()) {
                $runRepo->purge();// TODO user
                if ($current = $this->findFirst($challengeRepo, $categoryRepo, $run)) {
                    $run->setCurrent($current);
                    $em = $this->getDoctrine()->getManager();
                    $em->persist($run);
                    $em->flush();
                    return $this->redirectToRoute('take_challenge', [
                        'run' => $run->getId()
                    ]);
                }
            }

            return $this->render('home/home.start.html.twig', [
                'form' => $form->createView()
            ]);
        }
        return $this->render('home/home.continue.html.twig', [
            'run' => $run
        ]);
    }

    /**
     * @Route("/endrun/{run}", name="endrun")
     * @param ChallengeRun $run
     * @return RedirectResponse
     */
    public function endRunAction(ChallengeRun $run): RedirectResponse
    {
        $run->setCurrent(null);
        $em = $this->getDoctrine()->getManager();
        $em->persist($run);
        $em->flush();
        return $this->redirectToRoute('index');
    }

    /**
     * @param ChallengeRepository $challengeRepo
     * @param ChallengeCategoryRepository $categoryRepo
     * @param ChallengeRun $run
     * @return Challenge|null
     */
    private function findFirst(
        ChallengeRepository $challengeRepo,
        ChallengeCategoryRepository $categoryRepo,
        ChallengeRun $run): ?Challenge
    {
        $mode = $run->getMode();

        switch ($mode->getType()) {

            default:
            case RunMode::TYPE_ALL:
                return $challengeRepo->findFirstFromSection($run->getSection());

            case RunMode::TYPE_RANDOM:
                // TODO code duplication
                if ($run->getCount() >= $mode->getLength()) {
                    return null;
                }
                $category = $categoryRepo->findRandomCategory($run->getSection());
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
}
