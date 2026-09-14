<?php

namespace App;

use App\Herencia\CalculadoraBase;
use App\Interface\OperacionesInterface;

class Calculadora extends CalculadoraBase implements OperacionesInterface
{
    public function sumar($a, $b)
    {
        return $a + $b;
    }

    public function restar($a, $b)
    {
        return $a - $b;
    }

    public function multiplicar($a, $b)
    {
        return $a * $b;
    }

    public function dividir($a, $b)
    {
        $this->validarDivision($a, $b);

        return $a / $b;
    }
}