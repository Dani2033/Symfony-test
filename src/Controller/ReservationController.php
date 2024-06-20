<?php

namespace App\Controller;

use App\Entity\Reservation;
use App\Entity\Guest;
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
        $reservation = new Reservation();

        // dummy code - add some example guests to the reservation
        // (otherwise, the template will render an empty list of guests)
        /* $guest1 = new Guest();
        $guest1->setName('guest1');
        $reservation->getGuests()->add($guest1);
        $guest2 = new Guest();
        $guest2->setName('guest2');
        $reservation->getGuests()->add($guest2); */
        // end dummy code

        $form = $this->createForm(ReservationType::class, $reservation);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            // $form->getData() holds the submitted values
            // but, the original `$reservation` variable has also been updated
            $reservation = $form->getData();

            // ... perform some action, such as saving the reservation to the database
            $entityManager->persist($reservation);
            $entityManager->flush();

            return $this->redirectToRoute('reservation_form');
        }

        return $this->render('reservation/form.html.twig', [
            'form' => $form,
        ]);
    }
    /* public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $guestList = [];
        $guestList = new Guest();
        $reservation = new Reservation();
        // ...

        $form = $this->createForm(ReservationType::class, $reservation);

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            // $form->getData() holds the submitted values
            // but, the original `$reservation` variable has also been updated
            $reservation = $form->getData();

            // ... perform some action, such as saving the reservation to the database
            $entityManager->persist($reservation);
            $entityManager->flush();

            return $this->redirectToRoute('reservation_form');
        }

        return $this->render('reservation/form.html.twig', [
            'form' => $form,
        ]);
    } */
}