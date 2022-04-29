<?php

namespace App\Controller\Front;

use App\Entity\Reservations;
use App\Form\ReservationsType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ReservationsController extends AbstractController
{
    /**
     * @Route("reservations/new", name="new_reservation")
     */
    public function newReservation(Request $request, EntityManagerInterface $entityManagerInterface)
    {
        $reservation = new Reservations();
        $reservationForm = $this->createForm(ReservationsType::class, $reservation);
        $reservationForm->handleRequest($request);
        
        if($reservationForm->isSubmitted() && $reservationForm->isValid()) {

            $entityManagerInterface->persist($reservation);
            $entityManagerInterface->flush();

            return $this->redirectToRoute('home');
        }

        return $this->render('front/reservations.html.twig', ['reservationForm' => $reservationForm->createView()]);
    }
}