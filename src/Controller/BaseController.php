<?php

namespace App\Controller;

use App\Entity\User;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class BaseController extends AbstractController
{
    protected function getUser(): ?User
    {
        /** @var User $user */
        $user = parent::getUser();
        return $user;
    }
}
