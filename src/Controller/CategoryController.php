<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Pizza;
use Doctrine\Persistence\ManagerRegistry;
use App\Repository\PizzaRepository;

class CategoryController extends AbstractController
{
    /**
     * @Route("/category/{id}", name="app_category", methods={"GET","HEAD"})
     */
    public function show(int $id, PizzaRepository $PizzaRepository, ManagerRegistry $doctrine): Response
    {
        $pizzas = $PizzaRepository->findBy(array('category' => $id));
        
        return $this->render('category/index.html.twig', [
            'pizzas' => $pizzas,
        ]);
        
    }
}
