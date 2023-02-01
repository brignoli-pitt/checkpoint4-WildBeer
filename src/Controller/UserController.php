<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class UserController extends AbstractController
{
    #[Route('/profile/{id}', name: 'app_profile')]
    public function index(int $id): Response
    {
        return $this->render('user/profile.html.twig', [
            'controller_name' => 'UserController',
            'id' => $id,
        ]);
    }
}
