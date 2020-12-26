<?php

namespace App\Controller\Admin;

use App\Entity\Challenge;
use App\Entity\ChallengeCategory;
use App\Form\ChallengeType;
use App\Repository\ChallengeRepository;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/admin/challenge")
 * @IsGranted("ROLE_ADMIN")
 */
class ChallengeController extends AbstractController
{
    /**
     * @Route("/list/{category}", name="list_challenges")
     * @param ChallengeCategory $category
     * @param ChallengeRepository $repo
     * @return Response
     */
    public function indexAction(
        ChallengeCategory $category,
        ChallengeRepository $repo): Response
    {
        $challenges = $repo->findBy(['category' => $category], ['name' => 'asc']);

        return $this->render('challenge/challenge.index.html.twig', [
            'challenges' => $challenges,
            'category' => $category
        ]);
    }

    /**
     * @Route("/create/{category}", name="create_challenge")
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
     * @Route("/edit/{challenge}", name="edit_challenge")
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
}
