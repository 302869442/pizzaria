<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\OrderRepository;

class OrdersController extends AbstractController
{
    /**
     * @Route("/orders", name="app_orders")
     */
    public function index(OrderRepository $OrderRepository): Response
    {
        $this->denyAccessUnlessGranted('IS_AUTHENTICATED_FULLY');
        /**@var \App\Entity\User $user */
        $user = $this->getUser();
        $order = $OrderRepository->findBy(array('user' => $user->getId()));
        return $this->render('orders/index.html.twig', [
            'orders' => $order,
        ]);
    }
}
