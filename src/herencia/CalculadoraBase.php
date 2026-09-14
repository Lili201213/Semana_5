<?php

namespace App\Herencia;

class CalculadoraBase
{
    protected function validarDivision($a, $b)
    {
        if ($b == 0) {
            throw new \Exception("No se puede dividir entre cero");
        }
    }
}