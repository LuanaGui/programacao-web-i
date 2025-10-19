<?php
function soma($a, $b, $c) {
    return $a + $b + $c;
}

$valor1 = $_POST['valor1'] ?? 0;
$valor2 = $_POST['valor2'] ?? 0;
$valor3 = $_POST['valor3'] ?? 0;

$resultado = soma($valor1, $valor2, $valor3);

$cor ='';
if ($valor1 > 10){
    $cor = 'blue';
} elseif ($valor2 < $valor3){
    $cor = 'green';
} elseif ($valor3 < $valor1 && $valor3 < $valor2){
    $cor = 'red';
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
    <h3 style="color: <?php echo $cor; ?>;">
        RESULTADO DA SOMA: <?php echo $resultado; ?>
    </h3>
    <a class="botao-voltar" href="index.html">Voltar</a>
</body>
</html>
