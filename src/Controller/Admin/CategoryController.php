<?php

namespace App\Controller\Admin;

use App\Controller\BaseController;
use App\Entity\ChallengeCategory;
use App\Entity\ChallengeSection;
use App\Form\CategoryType;
use App\Repository\ChallengeCategoryRepository;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/admin/categories")
 * @IsGranted("ROLE_ADMIN")
 */
class CategoryController extends BaseController
{
    /**
     * @Route("/list/{section}", name="list_categories")
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
     * @Route("/edit/{category}/{section}", name="edit_category")
     *
     * @param Request $request
     * @param ChallengeCategory $category
     * @param ChallengeSection $section
     * @return Response
     */
    public function editCategoryAction(
        Request $request,
        ChallengeCategory $category,
        ChallengeSection $section): Response
    {
        $form = $this->createForm(CategoryType::class, $category);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($category);
            $em->flush();
            return $this->redirectToRoute('list_categories', [
                'section' => $section->getId()
            ]);
        }
        return $this->render('category/category.edit.html.twig', [
            'form' => $form->createView(),
            'category' => $category
        ]);
    }
}
