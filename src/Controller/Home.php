<?php 
namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use App\Repository\CategoryRepository;
use App\Entity\Category;

class Home extends AbstractController
{
    /**
     * @Route("/")
     */
    public function homepage(CategoryRepository $categoryRepository): Response
    {
        $Category = $categoryRepository->findAll();
        $test = ['test1', 'test2'];
        return $this->render('/pizzapages/home.html.twig', ['categories' => $Category]);
        // return new Response($Category->getName());
    }
}