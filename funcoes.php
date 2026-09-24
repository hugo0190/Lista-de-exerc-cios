<?php

function imc($peso, $altura) {
    $resultado = $peso / ($altura * $altura);
    return $resultado;
}

function emailValido($email) {
    return filter_var($email, FILTER_VALIDATE_EMAIL);
}

function criarSenha($tamanho = 8) {
    $base = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789!@#$%';
    $novaSenha = '';

    for ($i = 0; $i < $tamanho; $i++) {
        $posicao = random_int(0, strlen($base) - 1);
        $novaSenha .= $base[$posicao];
    }

    return $novaSenha;
}

function quantidadeVogais($texto) {
    $vogais = 'aeiou';
    $contador = 0;

    $texto = strtolower($texto);

    for ($i = 0; $i < strlen($texto); $i++) {
        if (strpos($vogais, $texto[$i]) !== false) {
            $contador++;
        }
    }

    return $contador;
}

function textoInvertido($texto) {
    $resultado = '';

    for ($i = strlen($texto) - 1; $i >= 0; $i--) {
        $resultado .= $texto[$i];
    }

    return $resultado;
}

function idadeAtual($nascimento) {
    $dataNascimento = new DateTime($nascimento);
    $dataAtual = new DateTime();

    $diferenca = $dataNascimento->diff($dataAtual);

    return $diferenca->y;
}

function converterValor($valor, $taxa) {
    $resultado = $valor * $taxa;
    return $resultado;
}

function telefoneFormatado($telefone) {
    $numero = preg_replace('/[^0-9]/', '', $telefone);

    if (strlen($numero) === 11) {
        return '(' . substr($numero, 0, 2) . ') ' .
               substr($numero, 2, 5) . '-' .
               substr($numero, 7, 4);
    }

    if (strlen($numero) === 10) {
        return '(' . substr($numero, 0, 2) . ') ' .
               substr($numero, 2, 4) . '-' .
               substr($numero, 6, 4);
    }

    return $telefone;
}

function saudacaoAtual() {
    $hora = (int) date('H');

    switch (true) {
        case $hora < 12:
            return 'Bom dia';

        case $hora < 18:
            return 'Boa tarde';

        default:
            return 'Boa noite';
    }
}

function senhaSegura($senha) {
    $possuiMaiuscula = preg_match('/[A-Z]/', $senha);
    $possuiMinuscula = preg_match('/[a-z]/', $senha);
    $possuiNumero = preg_match('/[0-9]/', $senha);
    $possuiEspecial = preg_match('/[^A-Za-z0-9]/', $senha);

    if (strlen($senha) < 8) {
        return false;
    }

    return $possuiMaiuscula &&
           $possuiMinuscula &&
           $possuiNumero &&
           $possuiEspecial;
}