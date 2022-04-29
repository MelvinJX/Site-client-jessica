<?php

namespace App\Controller\Admin;

use App\Repository\ReservationsRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("admin")
 */
class ReservationsController extends AbstractController
{
    /**
     * @Route("/upCommingMeeting", name="admin_upCommingMeeting")
     */
    public function upCommingMeeting(ReservationsRepository $reservationsRepository)
    {
        $meetings = $reservationsRepository->findAll();
        return $this->render('admin/upCommingMeeting.html.twig', ['meetings' => $meetings]);
    }
}