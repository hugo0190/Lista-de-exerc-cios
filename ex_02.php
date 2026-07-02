<?php

function inverterTexto($texto)
{
    $textoInvertido = strrev($texto);
    return $textoInvertido;
}

$texto = "Tecnologia";

echo "Texto original: " . $texto . "<br>";
echo "Texto invertido: " . inverterTexto($texto) . "<br>";
echo "Quantidade de caracteres: " . strlen($texto);