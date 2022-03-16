<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Pizza;

class CategoryController extends AbstractController
{
    /**
     * @Route("/category/{$id}", name="app_category")
     */
    public function show(ManagerRegistry $doctrine, int $id): Response
    {
        return $this->render('category/index.html.twig', [
            'controller_name' => 'CategoryController',
        ]);
    }
}
