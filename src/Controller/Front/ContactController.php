<?php

namespace App\Controller\Front;

use App\Entity\Contact;
use App\Form\ContactType;
use App\Repository\ContactRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("contact")
 */
class ContactController extends AbstractController 
{
    /**
     * @Route("/new", name="contact_new")
     */
    public function newContact(ContactRepository $contactRepository, Request $request, EntityManagerInterface $entityManagerInterface)
    {

        $message = new Contact();
        $contactForm = $this->createForm(ContactType::class, $message);
        $contactForm->handleRequest($request);

        if($contactForm->isSubmitted() && $contactForm->isValid()) {

            $entityManagerInterface->persist($message);
            $entityManagerInterface->flush();

            return $this->redirectToRoute('contact_new');
        }

        return $this->render('front/contact.html.twig', ['contactForm' => $contactForm->createView()]);
    }
}