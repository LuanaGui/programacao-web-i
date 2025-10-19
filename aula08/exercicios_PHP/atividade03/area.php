 <?php
    // Função para calcular área do quadrado
    function calcularAreaQuadrado($lado) {
        return $lado * $lado;
    }

    // Verifica se o formulário foi enviado
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $lado = $_POST['lado'];
        $area = calcularAreaQuadrado($lado);
        echo "<p>A área do quadrado de lado {$lado} metros é {$area} metros quadrados.</p>";
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