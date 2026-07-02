    <?php

function criptografarMensagem($texto)
{
    $deslocamento = 3;
    $resultado = "";

    for ($i = 0; $i < strlen($texto); $i++) {
        $resultado .= chr(ord($texto[$i]) + $deslocamento);
    }

    return $resultado;
}

function descriptografarMensagem($texto)
{
    $deslocamento = 3;
    $resultado = "";

    for ($i = 0; $i < strlen($texto); $i++) {
        $resultado .= chr(ord($texto[$i]) - $deslocamento);
    }

    return $resultado;
}

$mensagem = "Ola Mundo";

$mensagemCriptografada = criptografarMensagem($mensagem);
$mensagemDescriptografada = descriptografarMensagem($mensagemCriptografada);

echo "Mensagem original: " . $mensagem . "<br>";
echo "Mensagem criptografada: " . $mensagemCriptografada . "<br>";
echo "Mensagem descriptografada: " . $mensagemDescriptografada;