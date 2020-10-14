<?php

namespace App\Controller;

use App\Entity\Challenge;
use App\Entity\ChallengeCategory;
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
     * @return Response
     */
    public function createChallengeAction(
        Request $request,
        Challengecategory $category)
    {
        $challenge = (new Challenge())->setCategory($category);
        return $this->editChallengeAction($request, $challenge);
    }

    /**
     * @Route("/edit-challenge/{challenge}", name="edit_challenge")
     * @param Request $request
     * @param Challenge $challenge
     * @return Response
     */
    public function editChallengeAction(
        Request $request,
        Challenge $challenge)
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
        return $this->render('challenge/challenge.html.twig', [
            'form' => $form->createView()
        ]);
    }

    /**
     * @Route("/take-challenge/{challenge}", name="take_challenge")
     * @param Challenge $challenge
     * @return Response
     */
    public function takeChallengeAction(
        Challenge $challenge)
    {
        return $this->render('challenge/challenge.html.twig', [
            'challenge' => $challenge
        ]);
    }
}
