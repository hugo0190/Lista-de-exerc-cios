<?php

function analisarProdutos($produtos, $produtoPesquisa)
{
    $maisCaro = "";
    $maisBarato = "";
    $maiorPreco = 0;
    $menorPreco = PHP_INT_MAX;
    $soma = 0;

    foreach ($produtos as $nome => $preco) {
        $soma += $preco;

        if ($preco > $maiorPreco) {
            $maiorPreco = $preco;
            $maisCaro = $nome;
        }

        if ($preco < $menorPreco) {
            $menorPreco = $preco;
            $maisBarato = $nome;
        }
    }

    $media = $soma / count($produtos);

    if (array_key_exists($produtoPesquisa, $produtos)) {
        $pesquisa = "Produto encontrado: " . $produtoPesquisa . " - R$ " . number_format($produtos[$produtoPesquisa], 2, ",", ".");
    } else {
        $pesquisa = "Produto não encontrado.";
    }

    return [
        "maisCaro" => $maisCaro,
        "maisBarato" => $maisBarato,
        "media" => $media,
        "pesquisa" => $pesquisa
    ];
}

$produtos = [
    "Arroz" => 25.90,
    "Feijão" => 8.50,
    "Macarrão" => 6.90,
    "Óleo" => 9.80
];

$produtoPesquisa = "Feijão";

$resultado = analisarProdutos($produtos, $produtoPesquisa);

echo "Produto mais caro: " . $resultado["maisCaro"] . "<br>";
echo "Produto mais barato: " . $resultado["maisBarato"] . "<br>";
echo "Média dos preços: R$ " . number_format($resultado["media"], 2, ",", ".") . "<br>";
echo $resultado["pesquisa"];