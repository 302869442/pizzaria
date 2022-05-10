<?php

namespace App\Controller;

use App\Form\AddToCartType;
use App\Repository\PizzaRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;


class CategoryController extends AbstractController
{
    #[Route('/category/{id}', name: 'app_category', methods: ['GET', 'HEAD', 'POST'])]
    public function index(int $id, Request $request, PizzaRepository $pizzaRepository): Response
    {
        $pizzas = $pizzaRepository->findBy(array('category' => $id));

        $form = $this->createForm(AddToCartType::class);

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $data = $form->getData();
            
        }

        return $this->renderForm('category/index.html.twig', [
            'pizzas' => $pizzas,
            'form' => $form
        ]);
    }
}
