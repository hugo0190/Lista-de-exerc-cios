<?php

function adicionarSubtotal($lista) {
    for ($i = 0; $i < count($lista); $i++) {
        $lista[$i]['subtotal'] =
            $lista[$i]['quantidade'] * $lista[$i]['valor_unitario'];
    }

    return $lista;
}

function somarProdutos($lista) {
    $soma = 0;

    foreach ($lista as $item) {
        $soma += $item['subtotal'];
    }

    return $soma;
}

function obterDesconto($valor) {
    if ($valor > 1000) {
        return $valor * 0.15;
    } elseif ($valor > 500) {
        return $valor * 0.10;
    }

    return 0;
}

function obterFrete($valor) {
    if ($valor > 800) {
        return 0;
    } elseif ($valor > 300) {
        return 20;
    }

    return 35;
}

function encontrarProdutoMaisCaro($lista) {
    $produto = $lista[0];

    foreach ($lista as $item) {
        if ($item['valor_unitario'] > $produto['valor_unitario']) {
            $produto = $item;
        }
    }

    return $produto['nome'];
}

function encontrarMaiorSubtotal($lista) {
    $produto = $lista[0];

    foreach ($lista as $item) {
        if ($item['subtotal'] > $produto['subtotal']) {
            $produto = $item;
        }
    }

    return $produto['nome'];
}

function finalizarCompra($lista) {

    $lista = adicionarSubtotal($lista);

    $valorTotal = somarProdutos($lista);
    $valorDesconto = obterDesconto($valorTotal);

    $valorAposDesconto = $valorTotal - $valorDesconto;
    $valorFrete = obterFrete($valorAposDesconto);

    $quantidadeItens = 0;
    $valoresProdutos = [];

    foreach ($lista as $item) {
        $quantidadeItens += $item['quantidade'];
        $valoresProdutos[$item['nome']] = $item['subtotal'];
    }

    return [
        'produtos_diferentes' => count($lista),
        'quantidade_itens' => $quantidadeItens,
        'produto_mais_caro' => encontrarProdutoMaisCaro($lista),
        'maior_subtotal' => encontrarMaiorSubtotal($lista),
        'subtotais' => $valoresProdutos,
        'desconto' => $valorDesconto,
        'frete' => $valorFrete,
        'total_pagar' => $valorAposDesconto + $valorFrete
    ];
}


$compras = [
    [
        'nome' => 'Notebook',
        'quantidade' => 1,
        'valor_unitario' => 3200.00
    ],
    [
        'nome' => 'Mouse',
        'quantidade' => 2,
        'valor_unitario' => 50.00
    ],
    [
        'nome' => 'Teclado',
        'quantidade' => 1,
        'valor_unitario' => 150.00
    ]
];

$resultado = finalizarCompra($compras);

echo "<pre>";
print_r($resultado);
echo "</pre>";