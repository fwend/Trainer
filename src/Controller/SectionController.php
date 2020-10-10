<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/section")
 */
class SectionController extends AbstractController
{
    /**
     * @Route("/add-section", name="add-section")
     */
    public function addSectionAction()
    {
        return $this->render('home/add.section.html.twig', [

        ]);
    }
}
