<?php

namespace App\Controller;

use App\Entity\ChallengeRun;
use App\Form\ChallengeRunType;
use App\Repository\ChallengeRepository;
use App\Repository\ChallengeRunRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    /**
     * @Route("/", name="index")
     * @param Request $request
     * @param ChallengeRunRepository $runRepo
     * @param ChallengeRepository $challengeRepo
     * @return Response
     */
    public function indexAction(
        Request $request,
        ChallengeRunRepository $runRepo,
        ChallengeRepository $challengeRepo): Response
    {
        $run = $runRepo->findRun();

        if (!$run) {
            $form = $this->createForm(ChallengeRunType::class, $run = new ChallengeRun());

            $form->handleRequest($request);

            if ($form->isSubmitted() && $form->isValid()) {
                $current = $challengeRepo->findFirstFromSection($run->getSection());
                $run->setCurrent($current);
                $em = $this->getDoctrine()->getManager();
                $em->persist($run);
                $em->flush();
                return $this->redirectToRoute('take_challenge', [
                    'run' => $run->getId()
                ]);
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
}
