<?php

namespace App\Controller;

use App\Entity\ChallengeCategory;
use App\Entity\ChallengeSection;
use App\Form\CategoryType;
use App\Repository\ChallengeCategoryRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CategoryController extends AbstractController
{
    /**
     * @Route("/categories/{section}", name="list_categories")
     * @param Request $request
     * @param ChallengeSection $section
     * @param ChallengeCategoryRepository $repo
     * @return Response
     */
    public function index(Request $request, ChallengeSection $section, ChallengeCategoryRepository $repo)
    {
        $categories = $repo->findBy(['section' => $section], ['name' => 'asc']);

        $form = $this->createForm(CategoryType::class, $category = new ChallengeCategory());

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($category);
            $em->flush();
            return $this->redirectToRoute('list_categories', [
                'section' => $section->getId()
            ]);
        }

        return $this->render('category/index.html.twig', [
            'categories' => $categories,
            'section' => $section,
            'form' => $form->createView()
        ]);
    }
}
