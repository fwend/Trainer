<?php

namespace App\Controller;

use App\Entity\ChallengeRun;
use App\Form\ChallengeRunType;
use App\Form\TakeChallengeType;
use App\Repository\ChallengeRunRepository;
use App\Services\ChallengeSelector;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends BaseController
{
    // TODO easy admin

    /**
     * @Route("/", name="index")
     * @param Request $request
     * @param ChallengeRunRepository $runRepo
     * @param ChallengeSelector $selector
     * @return Response
     */
    public function indexAction(
        Request $request,
        ChallengeRunRepository $runRepo,
        ChallengeSelector $selector): Response
    {
        $user = $this->getUser();
        $run = $runRepo->findRun($user);

        if (!$run) {
            $run = new ChallengeRun();
            $run->setUser($user);

            $form = $this->createForm(ChallengeRunType::class, $run);
            $form->handleRequest($request);

            if ($form->isSubmitted() && $form->isValid()) {
                $runRepo->purge($run->getUser());

                if ($current = $selector->findFirst($run)) {
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
     * @Route("/take-challenge/{run}", name="take_challenge")
     * @param Request $request
     * @param ChallengeRun $run
     * @param ChallengeSelector $selector
     * @return Response
     */
    public function takeChallengeAction(
        Request $request,
        ChallengeRun $run,
        ChallengeSelector $selector): Response
    {
        $curr = $run->getCurrent();
        if (!$curr) {
            return $this->render('challenge/challenge.done.html.twig');
        }

        $form = $this->createForm(TakeChallengeType::class, null);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $next = $selector->findNext($curr, $run);

            // null is valid here, it means the run is over
            $run->setCurrent($next);

            $em = $this->getDoctrine()->getManager();
            $em->persist($run);
            $em->flush();

            return $this->render('challenge/challenge.result.html.twig', [
                'challenge' => $curr,
                'answer' => $form->get('answer')->getData(),
                'run' => $run
            ]);
        }

        return $this->render('challenge/challenge.html.twig', [
            'challenge' => $curr,
            'form' => $form->createView(),
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
}
