<?php

function calcularDesconto($valor)
{
    if ($valor > 1000) {
        $desconto = 30;
    } elseif ($valor > 500) {
        $desconto = 20;
    } elseif ($valor > 100) {
        $desconto = 10;
    } else {
        $desconto = 0;
    }

    $valorDesconto = $valor * ($desconto / 100);
    $valorFinal = $valor - $valorDesconto;

    return [
        "valorOriginal" => $valor,
        "desconto" => $desconto,
        "valorFinal" => $valorFinal
    ];
}

$valorCompra = 1200;

$resultado = calcularDesconto($valorCompra);

echo "Valor da compra: R$ " . number_format($resultado["valorOriginal"], 2, ",", ".") . "<br>";
echo "Desconto aplicado: " . $resultado["desconto"] . "%<br>";
echo "Valor final: R$ " . number_format($resultado["valorFinal"], 2, ",", ".");