<?php
// Função para calcular área do triângulo
function calcularAreaTriangulo($base, $altura) {
    return ($base * $altura) / 2;
}

// Inicializa a variável
$resultado = "";

// Verifica se o formulário foi enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") { 
    $base = $_POST['base'];
    $altura = $_POST['altura'];
    $area = calcularAreaTriangulo($base, $altura);
    $resultado = "A área do triângulo de base {$base} metros e altura {$altura} metros é {$area} metros quadrados.";
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>RESULTADO</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h3>RESULTADO</h3>
    <p><?php echo $resultado; ?></p>
    <a class="botao-voltar" href="index.html">Voltar</a>
</body>
</html>
