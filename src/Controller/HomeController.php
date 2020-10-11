<?php

namespace App\Controller;

use App\Entity\ChallengeSection;
use App\Form\SectionType;
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
    public function indexAction(Request $request, ChallengeSectionRepository $repo)
    {
        $sections = $repo->findBy([], ['position' => 'asc']);

        $form = $this->createForm(SectionType::class, $section = new ChallengeSection());

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($section);
            $em->flush();
            return $this->redirectToRoute('index');
        }

        return $this->render('home/section.index.html.twig', [
            'sections' => $sections,
            'form' => $form->createView()
        ]);
    }

}
