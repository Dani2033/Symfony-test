<?php

namespace App\Controller\Guest;

use App\Entity\Guest;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class GuestListController extends AbstractController
{
    #[Route('/guests', name: 'guest_list')]
    public function list(EntityManagerInterface $entityManager): Response
    {
        // Check if user is authenticated
        if (!$this->getUser()) {
            $this->addFlash('warning', 'You need to be logged in to access the guest list.');
            return $this->redirectToRoute('app_register');
        }

        // Fetch all data from Guest entity
        $guestRepository = $entityManager->getRepository(Guest::class);
        $guests = $guestRepository->findAll();

        return $this->render('guest/list.html.twig', [
            'guests' => $guests,
        ]);
    }
}
