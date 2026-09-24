<?php

require_once 'funcoes.php';

$imc = calcularImc(70, 1.75);
$email = validarEmail('teste@email.com');
$senha = gerarSenhaAleatoria(10);
$vogais = contarVogais('Hugo');
$invertido = inverterTexto('PHP');
$idade = calcularIdade('1995-05-10');
$valorConvertido = converterMoeda(100, 5.20);
$telefone = formatarTelefone('11987654321');
$saudacao = gerarSaudacao();
$senha1 = validarSenhaForte('Abc123!@');
$senha2 = validarSenhaForte('12345');

echo "===== TESTE DAS FUNÇÕES =====\n\n";

echo "1. IMC: " . number_format($imc, 2) . "\n";

echo "2. Validação de e-mail: ";
echo $email ? "E-mail correto\n" : "E-mail inválido\n";

echo "3. Senha aleatória: " . $senha . "\n";

echo "4. Quantidade de vogais: " . $vogais . "\n";

echo "5. Palavra invertida: " . $invertido . "\n";

echo "6. Idade: " . $idade . " anos\n";

echo "7. Conversão de moeda: R$ " . number_format($valorConvertido, 2, ',', '.') . "\n";

echo "8. Telefone: " . $telefone . "\n";

echo "9. Saudação: " . $saudacao . "\n";

echo "10. Senha 'Abc123!@': ";
echo $senha1 ? "Forte\n" : "Fraca\n";

echo "11. Senha '12345': ";
echo $senha2 ? "Forte\n" : "Fraca\n";