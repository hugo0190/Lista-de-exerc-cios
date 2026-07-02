<?php

function formatarTexto($texto)
{
    return [
        "maiusculas" => strtoupper($texto),
        "minusculas" => strtolower($texto),
        "primeiraLetra" => ucwords(strtolower($texto)),
        "caracteres" => strlen($texto)
    ];
}

$texto = "Programação em PHP";

$resultado = formatarTexto($texto);

echo "Texto original: " . $texto . "<br>";
echo "Em maiúsculas: " . $resultado["maiusculas"] . "<br>";
echo "Em minúsculas: " . $resultado["minusculas"] . "<br>";
echo "Primeira letra de cada palavra: " . $resultado["primeiraLetra"] . "<br>";
echo "Quantidade de caracteres: " . $resultado["caracteres"];