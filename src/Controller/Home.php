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
    public function init(): Response
    {
        $test = 'test';
        return $this->render('base.html.twig', ['title' => $test]);
    }
}