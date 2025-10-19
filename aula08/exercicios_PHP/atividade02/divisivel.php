<?php
//Função para verificar se o número é divisível por 2
function DivisilvelPor2($numero) {
    if ($numero % 2 == 0) {
        return "Valor divisível por 2";
    } else {
        return "Valor não é divisível por 2";
    }
}

//Verificar o valor enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $numero = $_POST['numero'];
    echo "<p>" . DivisilvelPor2($numero) . "</p>";
}

//Inicializa a variável
$resultado = "";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $numero = $_POST['numero'];
    $resultado = DivisilvelPor2($numero);
} else {
    $resultado = "Nenhum número foi enviado.";
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>RESULTADO</title>
     <link rel="stylesheet" href="style.css">
</head>
<body>
    <a class="botao-voltar" href="index.html">Voltar</a>
</body>
</html>