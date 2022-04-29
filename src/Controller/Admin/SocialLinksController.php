<?php

namespace App\Controller\Admin;

use App\Form\SocialLinksType;
use App\Repository\SocialLinksRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("admin")
 */
class SocialLinksController extends AbstractController
{
    /**
     * @Route("who/socialLinks/edit/{id}", name="socialLinks_edit")
     */
    public function editSocialLinks(SocialLinksRepository $socialLinksRepository, Request $request, EntityManagerInterface $entityManagerInterface, $id)
    {
        $socialLinks = $socialLinksRepository->find($id);
        $socialLinksForm = $this->createForm(SocialLinksType::class, $socialLinks);
        $socialLinksForm->remove('title');
        $socialLinksForm->handleRequest($request);

        if($socialLinksForm->isSubmitted() && $socialLinksForm->isValid()) {

            $entityManagerInterface->persist($socialLinks);
            $entityManagerInterface->flush();

            return $this->redirectToRoute('admin_who');
        }

        return $this->render('admin/editSocialLinks.html.twig', ['socialLinksForm' => $socialLinksForm->createView()]);
    }
}
