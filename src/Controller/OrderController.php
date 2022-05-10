<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Order;
use App\Form\OrderType;
use App\Repository\SizeRepository;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Session\SessionInterface;

class OrderController extends AbstractController
{
    #[Route('/order', name: 'app_order')]
    public function index(Request $request, ManagerRegistry $doctrine, SessionInterface $session): Response
    {
        $manager = $doctrine->getManager();
        $order = new Order();
        $form = $this->createForm(OrderType::class, $order);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $data = $form->getData();
            // $size = $sizeRepository->find($data['size']);
            $order->setPizza($session->get('pizza'));
            $order->setStatus('pending');
            $manager->persist($data);
            
            $manager->flush();
        }


        return $this->renderForm('order/index.html.twig', [
            'form' => $form
        ]);
    }
}
