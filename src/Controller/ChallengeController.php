<?php

namespace App\Controller;

use App\Entity\Challenge;
use App\Entity\ChallengeCategory;
use App\Entity\ChallengeRun;
use App\Form\ChallengeType;
use App\Form\TakeChallengeType;
use App\Repository\ChallengeCategoryRepository;
use App\Repository\ChallengeRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ChallengeController extends AbstractController
{
    /**
     * @Route("/list-challenges/{category}", name="list_challenges")
     * @param ChallengeCategory $category
     * @param ChallengeRepository $repo
     * @return Response
     */
    public function indexAction(
        ChallengeCategory $category,
        ChallengeRepository $repo)
    {
        $challenges = $repo->findBy(['category' => $category], ['name' => 'asc']);

        return $this->render('challenge/challenge.index.html.twig', [
            'challenges' => $challenges,
            'category' => $category
        ]);
    }

    /**
     * @Route("/create-challenge/{category}", name="create_challenge")
     * @param Request $request
     * @param ChallengeCategory $category
     * @param ChallengeRepository $repo
     * @return Response
     */
    public function createChallengeAction(
        Request $request,
        ChallengeCategory $category,
        ChallengeRepository $repo): Response
    {
        $challenge = (new Challenge())->setCategory($category);
        $challenge->setPosition($repo->findPosition($category));
        return $this->editChallengeAction($request, $challenge, true);
    }

    /**
     * @Route("/edit-challenge/{challenge}", name="edit_challenge")
     * @param Request $request
     * @param Challenge $challenge
     * @param bool $adding
     * @return Response
     */
    public function editChallengeAction(
        Request $request,
        Challenge $challenge,
        bool $adding = false): Response
    {
        $form = $this->createForm(ChallengeType::class, $challenge);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($challenge);
            $em->flush();
            return $this->redirectToRoute('list_challenges', [
                'category' => $challenge->getCategory()->getId()
            ]);
        }
        return $this->render('challenge/challenge.edit.html.twig', [
            'form' => $form->createView(),
            'challenge' => $challenge,
            'adding' => $adding
        ]);
    }

    /**
     * @Route("/take-challenge/{run}", name="take_challenge")
     * @param Request $request
     * @param ChallengeRun $run
     * @param ChallengeRepository $challengeRepo
     * @param ChallengeCategoryRepository $challengeCategoryRepo
     * @return Response
     */
    public function takeChallengeAction(
        Request $request,
        ChallengeRun $run,
        ChallengeRepository $challengeRepo,
        ChallengeCategoryRepository $challengeCategoryRepo): Response
    {
        $curr = $run->getCurrent();
        if (!$curr) {
            return $this->render('challenge/challenge.done.html.twig');
        }

        $form = $this->createForm(TakeChallengeType::class, null);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $next = $this->findNextChallenge($curr, $challengeRepo, $challengeCategoryRepo);

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
            'form' => $form->createView()
        ]);
    }

    /**
     * @param Challenge $current
     * @param ChallengeRepository $challengeRepo
     * @param ChallengeCategoryRepository $challengeCategoryRepo
     * @return Challenge|int|mixed|string|null
     */
    private function findNextChallenge(
        Challenge $current,
        ChallengeRepository $challengeRepo,
        ChallengeCategoryRepository $challengeCategoryRepo)
    {
        $next = $challengeRepo->findNextChallenge($current);
        if (!$next) {
            $nextCategory = $challengeCategoryRepo->findNextCategory($current->getCategory());
            if ($nextCategory) {
                $next = $challengeRepo->findFirstFromCategory($nextCategory);
            }
        }
        return $next;
    }
}
