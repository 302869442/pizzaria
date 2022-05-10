<?php

namespace App\Controller;

use App\Form\AddToCartType;
use App\Repository\PizzaRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Component\Routing\Annotation\Route;

class DetailController extends AbstractController
{
    #[Route('/detail/{id}', name: 'app_detail')]
    public function index(int $id, PizzaRepository $pizzaRepository, Request $request, SessionInterface $session): Response
    {
        $pizza = $pizzaRepository->find($id);

        $form = $this->createForm(AddToCartType::class);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $session->set('pizza', $pizza);
            return $this->redirectToRoute('app_order');
        }

        return $this->renderForm('detail/index.html.twig', [
            'form' => $form,
        ]);
    }
}