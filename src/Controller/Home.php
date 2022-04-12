<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use App\Repository\CategoryRepository;
use App\Entity\Order;
use App\Form\OrderType;
use Symfony\Component\HttpFoundation\Request;



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
        if ($form->isSubmitted() && $form->isValid()) {
            $data = $form->getdata();
            $entityManager->persist($data);
            $entityManager->flush();
            return $this->redirectToRoute('app_contact');
        }
        return $this->renderForm('/pizzapages/home.html.twig', ['categories' => $Category, 'form' => $form]);
    }

}
