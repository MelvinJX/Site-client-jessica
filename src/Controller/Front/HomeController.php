<?php

namespace App\Controller\Front;

use App\Repository\ArticleRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController 
{
    /**
     * @Route("/home", name="home")
     */
    public function home(ArticleRepository $articleRepository)
    {
        $articles = $articleRepository->findAll();
        
        return $this->render('front/home.html.twig', ['articles' => $articles]);
    }

    /**
     * @Route("who", name="who")
     */
    public function who()
    {
        return $this->render('front/who.html.twig');
    }

    /**
     * @Route("admin", name="admin")
     */
    public function admin()
    {
        return $this->render('admin/admin.html.twig');
    }
}