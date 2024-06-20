<?php

namespace App\Controller\Reservation;

use App\Entity\Reservation;
use App\Form\ReservationType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\ORM\EntityManagerInterface;

class ReservationController extends AbstractController
{
    #[Route('/reservation/form', name: 'reservation_form')]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        // Check if user is authenticated
        if (!$this->getUser()) {
            $this->addFlash('warning', 'You need to be logged in to access the reservation form.');
            return $this->redirectToRoute('app_register');
        }

        $reservation = new Reservation();

        $form = $this->createForm(ReservationType::class, $reservation);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $reservation = $form->getData();

            $entityManager->persist($reservation);
            $entityManager->flush();

            // Redirect to the same route to clear the form (PRG pattern)
            $this->addFlash('success', 'Reservation added succesfully');
            return $this->redirectToRoute('reservation_form');
        }

        return $this->render('reservation/form.html.twig', [
            'form' => $form->createView(),
        ]);
    }
}
