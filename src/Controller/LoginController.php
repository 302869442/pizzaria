<?php 
namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class LoginController
{
    /**
     * @Route("/login")
     */
    public function init(): Response
    {
        return new Response(
            include_once "../templates/login.php"
        );
    }
}