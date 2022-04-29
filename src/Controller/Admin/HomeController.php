<?php

namespace App\Controller\Admin;

use App\Repository\ArticleRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("admin")
 */
class HomeController extends AbstractController 
{
    /**
     * @Route("/home", name="admin_home")
     */
    public function adminHome(ArticleRepository $articleRepository)
    {
        $articles = $articleRepository->findAll();
        
        return $this->render('admin/home.html.twig', ['articles' => $articles]);
    }


}