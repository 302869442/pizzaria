<?php 

namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;


class LoginController extends AbstractController{
    /**
     * @Route("/login")
     */

    public function ContactPage() {
        return $this->render('/pizzapages/login.html.twig');
    }
}