<?php

namespace App\Controller;

use App\Entity\ChallengeCategory;
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
     * @param ChallengeCategory $category
     * @param ChallengeCategoryRepository $repo
     * @return Response
     */
    public function index(Request $request, ChallengeCategory $category, ChallengeCategoryRepository $repo)
    {
        $categories = $repo->findBy(['section' => $category]);

        $form = $this->createForm(CategoryType::class, $category = new ChallengeCategory());

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($category);
            $em->flush();
            return $this->redirectToRoute('list_categories');
        }

        return $this->render('category/index.html.twig', [
            'categories' => $categories,
            'form' => $form->createView()
        ]);
    }
}
