<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class EquipsController extends AbstractController
{
    private $equips = [
        ["codi" => "1", "nom" => "Equip Roig", "cicle" => "DAW", "curs" => "22/23", "membres" => ["Elena", "Vicent", "Joan", "Maria"]],
        ["codi" => "2", "nom" => "Equip Verd", "cicle" => "DAW", "curs" => "22/23", "membres" => ["Pau", "Laia", "Pol", "Marta"]],
        ["codi" => "3", "nom" => "Equip Blau", "cicle" => "DAW", "curs" => "22/23", "membres" => ["Sergi", "Clara", "Xavi", "Júlia"]],
        // Agrega más equipos según sea necesario
    ];

    #[Route('/equip/{codi}', name: 'equip')]
    public function equip($codi = null)
    {
        if ($codi === null) {
            // Si no se proporciona un código, mostrar información del primer equipo por defecto
            $equip = reset($this->equips);

            return $this->render('dades_equip.html.twig', [
                'equip' => $equip,
                'imagen_ruta' => 'images/' . $equip['codi'] . '.jpg', // Ruta de la imagen del primer equipo
            ]);
        } else {
            $resultatEquip = array_filter($this->equips, function ($equip) use ($codi) {
                return $equip["codi"] == $codi;
            });

            if (count($resultatEquip) > 0) {
                // Mostrar datos del equipo encontrado
                $equip = array_shift($resultatEquip);

                return $this->render('dades_equip.html.twig', [
                    'equip' => $equip,
                    'imagen_ruta' => 'images/' . $codi . '.jpg',
                ]);
            } else {
                // Mostrar mensaje de no encontrado
                $equip = ["codi" => "null", "nom" => "null", "cicle" => "null", "curs" => "null", "membres" => ["null", "null", "null", "null"]];
                $resposta = "No s'ha trobat l'equip amb codi: $codi";

                return $this->render('dades_equip_notrobat.html.twig', [
                    'no_encontrado' => $resposta,
                    'equip' => $equip,
                    'imagen_ruta' => 'images/' . 'null' . '.jpg',
                ]);
            }
        }
    }
}
