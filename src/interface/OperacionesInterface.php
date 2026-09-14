<?php

namespace App\Interface;

interface OperacionesInterface
{
    public function sumar($a, $b);

    public function restar($a, $b);

    public function multiplicar($a, $b);

    public function dividir($a, $b);
}