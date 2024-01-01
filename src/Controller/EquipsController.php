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

    #[Route('/equip/{codi}', name: 'fitxa_equip')]
    public function equip($codi)
    {
        $resultatEquip = array_filter($this->equips, function ($equip) use ($codi) {
            return $equip["codi"] == $codi;
        });

        if (count($resultatEquip) > 0) {
            // Mostrar datos del equipo encontrado
            $equip = array_shift($resultatEquip);
            $resposta = "<ul><li>" . $equip["nom"] . "</li>" .
                "<li>Codi: " . $equip["codi"] . "</li>" .
                "<li>Cicle: " . $equip["cicle"] . "</li>" .
                "<li>Curs: " . $equip["curs"] . "</li>" .
                "<li>Membres: " . implode(", ", $equip["membres"]) . "</li></ul>";
        } else {
            // Mostrar mensaje de no encontrado
            $resposta = "No s'ha trobat l'equip amb codi: $codi";
        }

        return new Response("<html><body>$resposta</body></html>");
    
    
    }}