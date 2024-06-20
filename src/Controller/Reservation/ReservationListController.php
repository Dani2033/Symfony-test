<?php

namespace App\Controller\Reservation;

use App\Entity\Reservation;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ReservationListController extends AbstractController
{
    #[Route('/reservations', name: 'reservation_list')]
    public function list(EntityManagerInterface $entityManager): Response
    {
        // Check if user is authenticated
        if (!$this->getUser()) {
            $this->addFlash('warning', 'You need to be logged in to access the reservation list.');
            return $this->redirectToRoute('app_register');
        }

        // Fetch all data from Reservation entity
        $reservationRepository = $entityManager->getRepository(Reservation::class);
        $reservations = $reservationRepository->findAll();

        return $this->render('reservation/list.html.twig', [
            'reservations' => $reservations,
        ]);
    }
}
