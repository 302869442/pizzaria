<?php 
namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;


class Home extends AbstractController
{
    /**
     * @Route("/")
     */
    public function homepage(): Response
    {
        $test = ['test1', 'test2'];
        return $this->render('/pizzapages/home.html.twig', ['categories' => $test]);
    }
}