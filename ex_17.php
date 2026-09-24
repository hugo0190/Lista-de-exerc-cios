<?php

function quantidadePalavras($texto) {
    $texto = trim($texto);

    if ($texto == '') {
        return 0;
    }

    $lista = preg_split('/\s+/', $texto);

    return count($lista);
}

function quantidadeFrases($texto) {
    $lista = preg_split('/[.!?]+/', $texto, -1, PREG_SPLIT_NO_EMPTY);

    return count($lista);
}

function separarPalavras($texto) {
    $texto = preg_replace('/[^\p{L}\s]/u', '', $texto);
    $texto = trim($texto);

    if ($texto == '') {
        return [];
    }

    return preg_split('/\s+/', $texto);
}

function encontrarMaiorPalavra($lista) {
    $maior = $lista[0];

    foreach ($lista as $palavra) {
        if (strlen($palavra) > strlen($maior)) {
            $maior = $palavra;
        }
    }

    return $maior;
}

function encontrarMenorPalavra($lista) {
    $menor = $lista[0];

    foreach ($lista as $palavra) {
        if (strlen($palavra) < strlen($menor)) {
            $menor = $palavra;
        }
    }

    return $menor;
}

function palavrasMaisUsadas($lista, $quantidade = 5) {
    $listaMinuscula = [];

    foreach ($lista as $palavra) {
        $listaMinuscula[] = strtolower($palavra);
    }

    $frequencia = array_count_values($listaMinuscula);

    arsort($frequencia);

    return array_slice($frequencia, 0, $quantidade, true);
}

function corrigirEspacos($texto) {
    $texto = trim($texto);

    return preg_replace('/\s+/', ' ', $texto);
}

function analisarTexto($texto) {

    $palavras = separarPalavras($texto);

    $minusculas = [];

    foreach ($palavras as $palavra) {
        $minusculas[] = strtolower($palavra);
    }

    $frequencia = array_count_values($minusculas);

    $repeticoes = 0;

    foreach ($frequencia as $quantidade) {
        if ($quantidade > 1) {
            $repeticoes++;
        }
    }

    return [
        'total_caracteres' => strlen($texto),
        'total_palavras' => quantidadePalavras($texto),
        'total_frases' => quantidadeFrases($texto),
        'maior_palavra' => encontrarMaiorPalavra($palavras),
        'menor_palavra' => encontrarMenorPalavra($palavras),
        'palavras_repetidas' => $repeticoes,
        'mais_frequentes' => palavrasMaisUsadas($palavras),
        'espacos_corrigidos' => corrigirEspacos($texto),
        'texto_formatado' => ucwords(strtolower($texto))
    ];
}


$texto = "deus é fiel";

$resultado = analisarTexto($texto);

echo "<pre>";
print_r($resultado);
echo "</pre>";