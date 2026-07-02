<?php

function ordenarNomes($nomes)
{
    $lista = explode(",", $nomes);

    foreach ($lista as &$nome) {
        $nome = trim($nome);
    }

    sort($lista);

    return $lista;
}

$nomes = "Carlos, Ana, João, Beatriz, Marcos";

$resultado = ordenarNomes($nomes);

echo "Lista organizada:<br>";

foreach ($resultado as $nome) {
    echo $nome . "<br>";
}