<?php

function calcularImc($peso, $altura){
    return round($peso / ($altura * $altura), 2);
}

function validarEmail($email){
    return filter_var($email, FILTER_VALIDATE_EMAIL);
}

function gerarSenha($tam){
    return substr(str_shuffle("abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890"), 0, $tam);
}

function contarVogais($texto){
    preg_match_all('/[aeiouAEIOU]/', $texto, $v);
    return count($v[0]);
}

function inverterTexto($texto){
    return strrev($texto);
}

function calcularIdade($ano){
    return date("Y") - $ano;
}

function converterMoeda($valor, $cotacao){
    return round($valor / $cotacao, 2);
}

function formatarTelefone($tel){
    return preg_replace("/(\d{2})(\d{5})(\d{4})/", "($1) $2-$3", $tel);
}

function saudacao(){
    return date("H") < 12 ? "Bom dia!" : (date("H") < 18 ? "Boa tarde!" : "Boa noite!");
}

function validarSenha($senha){
    return strlen($senha) >= 8;
}

?>