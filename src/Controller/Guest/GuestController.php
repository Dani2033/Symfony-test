<?php

namespace App\Controller\Guest;

use App\Entity\Guest;
use App\Form\GuestType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\ORM\EntityManagerInterface;

class GuestController extends AbstractController
{
    #[Route('/guest/form', name: 'guest_form')]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
    
        $guest = new Guest();
        // ...

        $form = $this->createForm(GuestType::class, $guest);

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            // $form->getData() holds the submitted values
            // but, the original `$guest` variable has also been updated
            $guest = $form->getData();

            // ... perform some action, such as saving the guest to the database
            $entityManager->persist($guest);
            $entityManager->flush();

            return $this->redirectToRoute('guest_form');
        }

        return $this->render('guest/form.html.twig', [
            'form' => $form,
        ]);
    }
}