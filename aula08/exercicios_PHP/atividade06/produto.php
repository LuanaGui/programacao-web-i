<?php
$dinheiro = 50;

//Calculo dos valores
$produtos = [
    'Maça' => $_POST['preco_maca'] * $_POST['quantidade_maca'],
    'Melancia' => $_POST['preco_melancia'] * $_POST['quantidade_melancia'],
    'Laranja' => $_POST['preco_laranja'] * $_POST['quantidade_laranja'],
    'Repolho' => $_POST['preco_repolho'] * $_POST['quantidade_repolho'],
    'Cenoura' => $_POST['preco_cenoura'] * $_POST['quantidade_cenoura'],
    'Batata' => $_POST['preco_batata'] * $_POST['quantidade_batata'],
];

$total = array_sum($produtos);
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>COMPRAS DA FEIRA</title>
    <link href="style.css" rel="stylesheet">
</head>
<body>
    <h2>COMPRAS DA FEIRA</h2>
    <div class="resultado">
        <?php
        foreach ($produtos as $produto => $valor) {
        echo "<p>$produto: R$ " . number_format($valor, 2, ',', '.') . "</p>";
    }

    echo "<hr>";
    echo "<h3>Valor total da compra: R$ " . number_format($total, 2, ',', '.') . "</h3>";

    if ($total > $dinheiro) {
        $falta = $total - $dinheiro;
        echo "<p class='vermelho'>Faltaram R$ " . number_format($falta, 2, ',', '.') . " para Joãozinho pagar a conta!</p>";
    } elseif ($total < $dinheiro) {
        $sobra = $dinheiro - $total;
        echo "<p class='azul'>Joãozinho ainda pode gastar R$ " . number_format($sobra, 2, ',', '.') . " da feira.</p>";
    } else {
        echo "<p class='verde'>Joãozinho usou exatamente os R$ " . number_format($dinheiro, 2, ',', '.') . " — saldo esgotado!</p>";
    }
    ?>
    </div>

    <a href="index.html" class="botao">Voltar</a>

</body>
</html>