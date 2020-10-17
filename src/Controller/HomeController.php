<?php

namespace App\Controller;

use App\Repository\ChallengeRunRepository;
use App\Repository\ChallengeSectionRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{

    /**
     * @Route("/", name="index")
     * @param Request $request
     * @param ChallengeSectionRepository $repo
     * @return Response
     */
    public function indexAction(Request $request, ChallengeRunRepository $repo)
    {
        $run = $repo->findRun();

        if (!$run) {
            $form = $this->createForm(ChallengeRunType::class, $run = new ChallengeRun());

            $form->handleRequest($request);

            if ($form->isSubmitted() && $form->isValid()) {
                $em = $this->getDoctrine()->getManager();
                $em->persist($run);
                $em->flush();
                return $this->redirectToRoute('index');
            }

            return $this->render('home/home.start.html.twig', [
                'form' => $form->createView()
            ]);
        }
        return $this->render('home/home.continue.html.twig', [
            'run' => $run
        ]);
    }

}
