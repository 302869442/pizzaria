<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Order;
use App\Form\OrderType;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Component\HttpFoundation\Request;

class OrderController extends AbstractController
{
    /**
     * @Route("/order", name="app_order")
     */
    public function index(Request $request, ManagerRegistry $doctrine): Response
    {
        $this->denyAccessUnlessGranted('IS_AUTHENTICATED_FULLY');
        $order = new Order();
        /**@var \App\Entity\User $user */
        $user = $this->getUser();
        $order->setUser($user);
        $form = $this->createForm(OrderType::class, $order);
        $entityManager = $doctrine->getManager();

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $data = $form->getdata();
            $entityManager->persist($data);
            $entityManager->flush();
            return $this->redirectToRoute('app_contact');
        }

        return $this->renderForm('order/index.html.twig', [
            'form' => $form,
        ]);
    }
}
