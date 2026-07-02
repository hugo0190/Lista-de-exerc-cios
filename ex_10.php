<?php

function calcularMedia($notas)
{
    $maiorNota = max($notas);
    $menorNota = min($notas);
    $media = array_sum($notas) / count($notas);

    if ($media >= 7) {
        $situacao = "Aprovado";
    } elseif ($media >= 5) {
        $situacao = "Recuperação";
    } else {
        $situacao = "Reprovado";
    }

    return [
        "maiorNota" => $maiorNota,
        "menorNota" => $menorNota,
        "media" => $media,
        "situacao" => $situacao
    ];
}

$notas = [8.5, 7.0, 6.5, 9.0];

$resultado = calcularMedia($notas);

echo "Notas: " . implode(", ", $notas) . "<br>";
echo "Maior nota: " . $resultado["maiorNota"] . "<br>";
echo "Menor nota: " . $resultado["menorNota"] . "<br>";
echo "Média: " . number_format($resultado["media"], 2, ",", ".") . "<br>";
echo "Situação: " . $resultado["situacao"];