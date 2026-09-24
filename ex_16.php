<?php

function quantidadeMaiusculas($texto) {
    $resultado = preg_match_all('/[A-Z]/', $texto);
    return $resultado;
}

function quantidadeMinusculas($texto) {
    $resultado = preg_match_all('/[a-z]/', $texto);
    return $resultado;
}

function quantidadeNumeros($texto) {
    $resultado = preg_match_all('/[0-9]/', $texto);
    return $resultado;
}

function quantidadeCaracteresEspeciais($texto) {
    $resultado = preg_match_all('/[^A-Za-z0-9]/', $texto);
    return $resultado;
}

function nivelDaSenha($senha) {

    $pontos = 0;

    if (strlen($senha) >= 8) {
        $pontos++;
    }

    if (quantidadeMaiusculas($senha) >= 1) {
        $pontos++;
    }

    if (quantidadeMinusculas($senha) >= 1) {
        $pontos++;
    }

    if (quantidadeNumeros($senha) >= 1) {
        $pontos++;
    }

    if (quantidadeCaracteresEspeciais($senha) >= 1) {
        $pontos++;
    }

    switch ($pontos) {
        case 0:
        case 1:
        case 2:
            return 'Fraca';

        case 3:
            return 'Média';

        case 4:
            return 'Forte';

        default:
            return 'Muito Forte';
    }
}

function verificarSenha($senha) {

    $informacoes = [
        'quantidade_maiusculas' => quantidadeMaiusculas($senha),
        'quantidade_minusculas' => quantidadeMinusculas($senha),
        'quantidade_numeros' => quantidadeNumeros($senha),
        'quantidade_especiais' => quantidadeCaracteresEspeciais($senha),
        'quantidade_caracteres' => strlen($senha),
        'classificacao' => nivelDaSenha($senha)
    ];

    return $informacoes;
}


$senhaA = verificarSenha('hzin');
$senhaB = verificarSenha('hugodela');
$senhaC = verificarSenha('deus1234');

echo "<pre>";

echo "SENHA 1:\n";
print_r($senhaA);

echo "\nSENHA 2:\n";
print_r($senhaB);

echo "\nSENHA 3:\n";
print_r($senhaC);

echo "</pre>";