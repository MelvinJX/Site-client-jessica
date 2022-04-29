<?php

namespace App\Controller\Admin;

use App\Form\WhoType;
use App\Repository\SocialLinksRepository;
use App\Repository\WhoRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("admin")
 */
class WhoController extends AbstractController
{
    /**
     * @Route("/who", name="admin_who")
     */
    public function adminWho(WhoRepository $whoRepository, SocialLinksRepository $socialLinksRepository)
    {
        $who = $whoRepository->findAll();
        $socialLinks = $socialLinksRepository->findAll();
        
        return $this->render('admin/who.html.twig', [
            'who' => $who,
            'socialLinks' => $socialLinks
        ]);
    }

    /**
     * @Route("/who/edit/{id}", name="who_edit")
     */
    public function editWho(WhoRepository $whoRepository, Request $request, EntityManagerInterface $entityManagerInterface, $id)
    {
        $who = $whoRepository->find($id);
        $whoForm = $this->createForm(WhoType::class, $who);
        $whoForm->handleRequest($request);

        if($whoForm->isSubmitted() && $whoForm->isValid()) {

            $entityManagerInterface->persist($who);
            $entityManagerInterface->flush();

            return $this->redirectToRoute('admin_who');
        }

        return $this->render('admin/editWho.html.twig', ['whoForm' => $whoForm->createView()]);
    }
}
