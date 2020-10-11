<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class ChallengeController extends AbstractController
{
    /**
     * @Route("/list-challenges", name="list_challenges")
     */
    public function index()
    {
        return $this->render('challenge/index.html.twig', [
            'controller_name' => 'ChallengeController',
        ]);
    }
}
