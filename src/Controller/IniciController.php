<?php


namespace App\Controller;

use App\Service\ServeiDadesEquips;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class IniciController extends AbstractController
{
    private $serveiDadesEquips;

    public function __construct(ServeiDadesEquips $serveiDadesEquips)
    {
        $this->serveiDadesEquips = $serveiDadesEquips;
    }

    #[Route('/', name: 'inici')]
    public function inici(): Response
    {
        // Obtener la lista de equipos
        $equips = $this->serveiDadesEquips->obtenirEquips();

        // Pasar la lista de equipos a la plantilla Twig
        return $this->render('inici/inici.html.twig', ['equips' => $equips]);
    }
}
