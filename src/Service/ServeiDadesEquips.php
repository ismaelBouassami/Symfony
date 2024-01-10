<?php
// src/Service/ServeiDadesEquips.php

namespace App\Service;

class ServeiDadesEquips
{
    private $equips;

    public function __construct()
    {
        // Inicializa el array de equipos
        $this->equips = [
            ["codi" => "1", "nom" => "Equip Roig", "cicle" => "DAW", "curs" => "22/23", "membres" => ["Elena", "Vicent", "Joan", "Maria"]],
            ["codi" => "2", "nom" => "Equip Verd", "cicle" => "DAW", "curs" => "22/23", "membres" => ["Pau", "Laia", "Pol", "Marta"]],
            ["codi" => "3", "nom" => "Equip Blau", "cicle" => "DAW", "curs" => "22/23", "membres" => ["Sergi", "Clara", "Xavi", "Júlia"]],
            // Agrega más equipos según sea necesario
        ];
    }

    public function obtenirEquips()
    {
        // Retorna el array de equipos
        return $this->equips;
    }
}
