<?php 
namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use App\Repository\CategoryRepository;


class Home extends AbstractController
{
    /**
     * @Route("/", name="app_home")
     */
    public function homepage(CategoryRepository $categoryRepository): Response
    {
        $Category = $categoryRepository->findAll();
        return $this->render('/pizzapages/home.html.twig', ['categories' => $Category]);
        // return new Response($Category->getName());
    }
}