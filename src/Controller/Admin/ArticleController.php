<?php

namespace App\Controller\Admin;

use App\Entity\Article;
use App\Form\ArticleType;
use App\Repository\ArticleRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("admin")
 */
class ArticleController extends AbstractController
{
    /**
     * @Route("/article/new", name="admin_article_new")
     */
    public function newArticle(Request $request, EntityManagerInterface $entityManager): Response
    {
        $article = new Article();
        $form = $this->createForm(ArticleType::class, $article);
        $form->remove('createDate');
        $form->remove('updateDate');
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $entityManager->persist($article);
            $entityManager->flush();

            return $this->redirectToRoute('admin_home'); 
        }

        return $this->render('admin/article/new.html.twig', [
            // 'article' => $article,
            'articleForm' => $form->createView(),
        ]);
    }

    /**
     * @Route("/article/edit/{id}", name="article_edit")
     */
    public function editArticle(Request $request, ArticleRepository $articleRepository, EntityManagerInterface $entityManagerInterface, $id)
    {
        $article = $articleRepository->find($id);
        $form = $this->createForm(ArticleType::class, $article);
        $form->remove('createDate');
        $form->remove('updateDate');
        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()) {

            $entityManagerInterface->persist($article);
            $entityManagerInterface->flush();

            return $this->redirectToRoute('admin_home');
        }

        return $this->render('admin/article/edit.html.twig', ['articleForm' => $form->createView()]);
    }

    /**
     * @Route("/article/delete/{id}", name="article_delete")
     */
    public function deleteArticle($id, ArticleRepository $articleRepository, EntityManagerInterface $entityManagerInterface)
    {
        $article = $articleRepository->find($id);

        $entityManagerInterface->remove($article);
        $entityManagerInterface->flush();

        return $this->redirectToRoute('admin_home');
    }

    /**
     * @Route("/article/{id}", name="admin_article_show")
     */
    public function article(ArticleRepository $articleRepository, $id)
    {
        $article = $articleRepository->find($id);
        $articles = $articleRepository->findAll();

        return $this->render('admin/article.html.twig', [
            'article' => $article,
            'articles' => $articles
        ]);
    }
}
