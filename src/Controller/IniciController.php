<?php


namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class IniciController extends AbstractController
{
    #[Route('/', name: 'inici')]
    public function inici(): Response
    {
        return new Response ('Gestión de equipos del proyecto de 2n de DAW');
        
    }
}
