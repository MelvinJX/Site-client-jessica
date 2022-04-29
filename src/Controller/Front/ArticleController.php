<?php

namespace App\Controller\Front;

use App\Repository\ArticleRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class ArticleController extends AbstractController 
{

    /**
     * @Route("home/article/{id}", name="article_show")
     */
    public function article(ArticleRepository $articleRepository, $id)
    {
        $article = $articleRepository->find($id);
        $articles = $articleRepository->findAll();

        return $this->render('front/article.html.twig', [
            'article' => $article,
            'articles' => $articles
        ]);
    }

    /**
     * @Route("articles", name="articles")
     */
    public function articles()
    {
        return $this->render('front/article.html.twig');
    }
}