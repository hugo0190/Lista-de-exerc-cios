<?php

function analisarTexto($texto)
{
    $palavras = str_word_count($texto);
    $caracteres = strlen($texto);

    $vogais = preg_match_all("/[aeiouAEIOU]/", $texto);

    $consoantes = preg_match_all("/[bcdfghjklmnpqrstvwxyzBCDFGHJKLMNPQRSTVWXYZ]/", $texto);

    return [
        "palavras" => $palavras,
        "caracteres" => $caracteres,
        "vogais" => $vogais,
        "consoantes" => $consoantes
    ];
}

$texto = "Programar em PHP é muito difícil";

$resultado = analisarTexto($texto);

echo "Texto: " . $texto . "<br><br>";
echo "Quantidade de palavras: " . $resultado["palavras"] . "<br>";
echo "Quantidade de caracteres: " . $resultado["caracteres"] . "<br>";
echo "Quantidade de vogais: " . $resultado["vogais"] . "<br>";
echo "Quantidade de consoantes: " . $resultado["consoantes"];