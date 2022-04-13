<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use App\Repository\CategoryRepository;
use App\Entity\Order;
use App\Entity\Pizza;
use App\Form\OrderType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Session\Session;

class Home extends AbstractController
{
    /**
     * @Route("/", name="app_home")
     */
    public function homepage(CategoryRepository $categoryRepository, Request $request, ManagerRegistry $doctrine)
    {
        $Category = $categoryRepository->findAll();
        $order = new Order();
        /**@var \App\Entity\User $user */
        $user = $this->getUser();
        $order->setUser($user);
        $form = $this->createForm(OrderType::class, $order);
        $entityManager = $doctrine->getManager();
        $form->handleRequest($request);
        $session = new Session();
        $session->set('order', ['test','test']);
        print_r($session->get('order'));
        if ($form->isSubmitted() && $form->isValid()) {
            $data = $form->getdata();
            $entityManager->persist($data);
            
            $entityManager->flush();
            return $this->redirectToRoute('app_home');
        }
        return $this->renderForm('/pizzapages/home.html.twig', ['categories' => $Category, 'form' => $form]);
    }

}
