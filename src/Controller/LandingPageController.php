<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class LandingPageController extends AbstractController
{
    #[Route('/', name: 'landing_page')]  
    public function modifyLP(): Response
    {

        return $this->render('landing/lp.html.twig');
    }
}