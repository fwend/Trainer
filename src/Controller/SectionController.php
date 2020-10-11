<?php

namespace App\Controller;

use App\Entity\ChallengeSection;
use App\Form\SectionType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/section")
 */
class SectionController extends AbstractController
{
    /**
     * @Route("/add-section", name="add-section")
     * @param Request $request
     * @return Response
     */
    public function addSectionAction(Request $request)
    {
        $form = $this->createForm(SectionType::class, $section = new ChallengeSection());

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($section);
            $em->flush();
            return $this->redirectToRoute('index');
        }

        return $this->render('home/add.section.html.twig', [
            'form' => $form->createView()
        ]);
    }
}
