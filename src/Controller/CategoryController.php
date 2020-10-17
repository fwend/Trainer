<?php

namespace App\Controller;

use App\Entity\ChallengeCategory;
use App\Entity\ChallengeSection;
use App\Form\CategoryType;
use App\Repository\ChallengeCategoryRepository;
use Entity\Category;
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
    public function indexAction(
        Request $request,
        ChallengeSection $section,
        ChallengeCategoryRepository $repo): Response
    {
        $categories = $repo->findBy(['section' => $section], ['name' => 'asc']);

        $form = $this->createForm(CategoryType::class, $category = new ChallengeCategory());

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $category->setPosition($repo->findPosition($section));
            $category->setSection($section);
            $em = $this->getDoctrine()->getManager();
            $em->persist($category);
            $em->flush();
            return $this->redirectToRoute('list_categories', [
                'section' => $section->getId()
            ]);
        }

        return $this->render('category/category.index.html.twig', [
            'categories' => $categories,
            'section' => $section,
            'form' => $form->createView()
        ]);
    }

    /**
     * @Route("/categories/edit/{category}", name="edit_category")
     *
     * @param Request $request
     * @param Category $category
     * @return Response
     */
    public function editCategoryAction(Request $request, Category $category): Response
    {
        return new Response('todo');
    }
}
