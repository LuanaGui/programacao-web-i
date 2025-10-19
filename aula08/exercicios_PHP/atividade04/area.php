<?php
// Função para calcular a área do retângulo
function calcularAreaRetangulo($base, $altura) {
    return $base * $altura;
}

// Inicializa a variável
$resultado = "";

// Verifica se o formulário foi enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $base = $_POST['base'];
    $altura = $_POST['altura'];
    $area = calcularAreaRetangulo($base, $altura);
    $resultado = "A área do retângulo de base {$base} metros e altura {$altura} metros é {$area} metros quadrados.";

//Verifica se a área é MAIOR que 10
if ($area > 10) {
        $resultado = "<h1 class='maior'>A área do retângulo de base {$base} metros e altura {$altura} metros é {$area} metros quadrados.</h1>";
    } else {
        $resultado = "<h3 class='menor'>A área do retângulo de base {$base} metros e altura {$altura} metros é {$area} metros quadrados.</h3>";
    }
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
