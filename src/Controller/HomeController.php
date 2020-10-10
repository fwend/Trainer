<?php

namespace App\Controller;

use App\Repository\ChallengeSectionRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController {

    /**
     * @Route("/", name="index")
     * @param ChallengeSectionRepository $repo
     * @return Response
     */
    public function indexAction(ChallengeSectionRepository $repo)
    {
        $sections = $repo->findBy([], ['position' => 'asc']);

        $sections = ['one', 'two', 'three'];

        return $this->render('home/index.html.twig', [
            'sections' => $sections,
        ]);
    }

}
