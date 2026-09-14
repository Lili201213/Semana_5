<?php

require_once __DIR__ . '/../../vendor/autoload.php';

use App\Calculadora;

$calculadora = new Calculadora();

?>

<!DOCTYPE html>
<html lang="es">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Mi Calculadora</title>

    <style>

        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        body {
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;

            font-family: Arial, sans-serif;

            background:
                radial-gradient(circle at 20% 20%, #49347a, transparent 35%),
                radial-gradient(circle at 80% 80%, #174a5c, transparent 35%),
                #0c0d16;

            padding: 20px;
        }

        .calculadora {
            width: 360px;
            padding: 22px;

            background: rgba(25, 25, 38, 0.95);

            border: 1px solid rgba(255, 255, 255, 0.08);

            border-radius: 30px;

            box-shadow:
                0 25px 70px rgba(0, 0, 0, 0.55);

            backdrop-filter: blur(15px);
        }

        .titulo {
            color: #aaa8b8;
            text-align: center;
            font-size: 13px;
            letter-spacing: 2px;
            text-transform: uppercase;
            margin-bottom: 15px;
        }

        .pantalla {
            min-height: 125px;

            display: flex;
            flex-direction: column;
            justify-content: flex-end;
            align-items: flex-end;

            padding: 20px;

            margin-bottom: 18px;

            background: #11111b;

            border-radius: 20px;

            border: 1px solid rgba(255, 255, 255, 0.06);

            overflow: hidden;
        }

        .operacion {
            width: 100%;

            min-height: 28px;

            color: #858392;

            font-size: 17px;

            text-align: right;

            word-wrap: break-word;
        }

        .resultado {
            width: 100%;

            margin-top: 8px;

            color: white;

            font-size: 42px;

            font-weight: bold;

            text-align: right;

            white-space: nowrap;

            overflow-x: auto;
        }

        .botones {
            display: grid;

            grid-template-columns: repeat(4, 1fr);

            gap: 11px;
        }

        button {
            height: 65px;

            border: none;

            border-radius: 18px;

            font-size: 21px;

            font-weight: bold;

            color: white;

            background: #292938;

            cursor: pointer;

            transition: all 0.15s ease;

            box-shadow:
                inset 0 -3px rgba(0, 0, 0, 0.18);
        }

        button:hover {
            transform: translateY(-2px);
            background: #353548;
        }

        button:active {
            transform: scale(0.94);
        }

        .numero {
            background: #242432;
        }

        .operador {
            background: #47366e;
        }

        .operador:hover {
            background: #594485;
        }

        .especial {
            background: #343442;
            color: #c8c5d2;
        }

        .igual {
            grid-column: span 2;

            background: linear-gradient(
                135deg,
                #c95edc,
                #7856d9
            );
        }

        .igual:hover {
            background: linear-gradient(
                135deg,
                #d96be9,
                #8968e8
            );
        }

        .cero {
            grid-column: span 2;
        }

        .pie {
            margin-top: 18px;

            text-align: center;

            color: #696775;

            font-size: 11px;
        }

        @media (max-width: 400px) {

            .calculadora {
                width: 100%;
                max-width: 360px;
            }

            button {
                height: 60px;
            }

        }

    </style>

</head>


<body>

    <div class="calculadora">

        <div class="titulo">
            Mi Calculadora
        </div>


        <div class="pantalla">

            <div class="operacion" id="operacion">
                0
            </div>

            <div class="resultado" id="resultado">
                0
            </div>

        </div>


        <div class="botones">

            <!-- Fila 1 -->

            <button
                type="button"
                class="especial"
                onclick="limpiar()">
                AC
            </button>

            <button
                type="button"
                class="especial"
                onclick="borrar()">
                ⌫
            </button>

            <button
                type="button"
                class="especial"
                onclick="porcentaje()">
                %
            </button>

            <button
                type="button"
                class="operador"
                onclick="seleccionarOperacion('/')">
                ÷
            </button>


            <!-- Fila 2 -->

            <button
                type="button"
                class="numero"
                onclick="agregarNumero('7')">
                7
            </button>

            <button
                type="button"
                class="numero"
                onclick="agregarNumero('8')">
                8
            </button>

            <button
                type="button"
                class="numero"
                onclick="agregarNumero('9')">
                9
            </button>

            <button
                type="button"
                class="operador"
                onclick="seleccionarOperacion('*')">
                ×
            </button>


            <!-- Fila 3 -->

            <button
                type="button"
                class="numero"
                onclick="agregarNumero('4')">
                4
            </button>

            <button
                type="button"
                class="numero"
                onclick="agregarNumero('5')">
                5
            </button>

            <button
                type="button"
                class="numero"
                onclick="agregarNumero('6')">
                6
            </button>

            <button
                type="button"
                class="operador"
                onclick="seleccionarOperacion('-')">
                −
            </button>


            <!-- Fila 4 -->

            <button
                type="button"
                class="numero"
                onclick="agregarNumero('1')">
                1
            </button>

            <button
                type="button"
                class="numero"
                onclick="agregarNumero('2')">
                2
            </button>

            <button
                type="button"
                class="numero"
                onclick="agregarNumero('3')">
                3
            </button>

            <button
                type="button"
                class="operador"
                onclick="seleccionarOperacion('+')">
                +
            </button>


            <!-- Fila 5 -->

            <button
                type="button"
                class="numero cero"
                onclick="agregarNumero('0')">
                0
            </button>

            <button
                type="button"
                class="numero"
                onclick="agregarNumero('.')">
                .
            </button>

            <button
                type="button"
                class="igual"
                onclick="calcular()">
                =
            </button>

        </div>


        <div class="pie">
            PHP · POO · PSR-4 · Autoloading
        </div>

    </div>


<script>

let numeroActual = "";
let numeroAnterior = "";
let operador = "";
let resultadoMostrado = false;


const pantallaResultado =
    document.getElementById("resultado");

const pantallaOperacion =
    document.getElementById("operacion");


function agregarNumero(numero) {

    if (resultadoMostrado) {

        numeroActual = "";
        resultadoMostrado = false;

    }


    if (numero === "." && numeroActual.includes(".")) {
        return;
    }


    if (numero === "." && numeroActual === "") {
        numeroActual = "0";
    }


    numeroActual += numero;

    actualizarPantalla();

}


function seleccionarOperacion(nuevaOperacion) {

    if (numeroActual === "" && numeroAnterior === "") {
        return;
    }


    if (numeroAnterior !== "" && numeroActual !== "") {

        calcular();

    }


    numeroAnterior = numeroActual;

    numeroActual = "";

    operador = nuevaOperacion;

    resultadoMostrado = false;

    actualizarPantalla();

}


function calcular() {

    if (
        numeroAnterior === "" ||
        numeroActual === "" ||
        operador === ""
    ) {
        return;
    }


    let a = parseFloat(numeroAnterior);
    let b = parseFloat(numeroActual);

    let resultado;


    switch (operador) {

        case "+":
            resultado = a + b;
            break;

        case "-":
            resultado = a - b;
            break;

        case "*":
            resultado = a * b;
            break;

        case "/":

            if (b === 0) {

                pantallaResultado.textContent =
                    "Error";

                pantallaOperacion.textContent =
                    "No se puede dividir entre 0";

                numeroActual = "";
                numeroAnterior = "";
                operador = "";

                return;
            }

            resultado = a / b;
            break;
    }


    resultado = Number(
        resultado.toFixed(10)
    );


    pantallaOperacion.textContent =
        numeroAnterior + " " +
        operador + " " +
        numeroActual;


    pantallaResultado.textContent =
        resultado;


    numeroActual = resultado.toString();

    numeroAnterior = "";

    operador = "";

    resultadoMostrado = true;

}


function limpiar() {

    numeroActual = "";
    numeroAnterior = "";
    operador = "";

    resultadoMostrado = false;

    pantallaOperacion.textContent = "0";
    pantallaResultado.textContent = "0";

}


function borrar() {

    if (resultadoMostrado) {
        limpiar();
        return;
    }

    numeroActual =
        numeroActual.slice(0, -1);

    actualizarPantalla();

}


function porcentaje() {

    if (numeroActual === "") {
        return;
    }

    numeroActual =
        (parseFloat(numeroActual) / 100).toString();

    actualizarPantalla();

}


function actualizarPantalla() {

    pantallaResultado.textContent =
        numeroActual || "0";


    if (numeroAnterior !== "" && operador !== "") {

        pantallaOperacion.textContent =
            numeroAnterior + " " +
            operador;

    } else {

        pantallaOperacion.textContent =
            "0";

    }

}
   

</script>

</body>

</html>