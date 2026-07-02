<?php

function analisarNumero($numero)
{
    
    $parImpar = ($numero % 2 == 0) ? "Par" : "Ímpar";

   
    $primo = "Sim";

    if ($numero < 2) {
        $primo = "Não";
    } else {
        for ($i = 2; $i <= sqrt($numero); $i++) {
            if ($numero % $i == 0) {
                $primo = "Não";
                break;
            }
        }
    }

    $soma = 0;

    for ($i = 1; $i < $numero; $i++) {
        if ($numero % $i == 0) {
            $soma += $i;
        }
    }

    $perfeito = ($soma == $numero) ? "Sim" : "Não";

    return [
        "parImpar" => $parImpar,
        "primo" => $primo,
        "perfeito" => $perfeito
    ];
}

$numero = 28;

$resultado = analisarNumero($numero);

echo "Número: $numero <br>";
echo "Par ou Ímpar: " . $resultado["parImpar"] . "<br>";
echo "Primo: " . $resultado["primo"] . "<br>";
echo "Perfeito: " . $resultado["perfeito"];