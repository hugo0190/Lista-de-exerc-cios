<?php

include "funcoes.php";

echo "IMC: ".calcularImc(70,1.75)."<br>";
echo "E-mail: ".(validarEmail("teste@email.com") ? "Válido" : "Inválido")."<br>";
echo "Senha: ".gerarSenha(8)."<br>";
echo "Vogais: ".contarVogais("Programação")."<br>";
echo "Texto: ".inverterTexto("PHP")."<br>";
echo "Idade: ".calcularIdade(2007)."<br>";
echo "Dólar: ".converterMoeda(100,5.50)."<br>";
echo "Telefone: ".formatarTelefone("47999998888")."<br>";
echo "Saudação: ".saudacao()."<br>";
echo "Senha forte: ".(validarSenha("Senha123") ? "Sim" : "Não");

?>