<?php
// Valor do carro
$preco_vista = 22500.00;
$parcelas = 60;
$valor_parcela = 489.65;

// Calcula o total pago no financiamento
$total_financiamento = $parcelas * $valor_parcela;

// Calcula os juros pagos
$juros = $total_financiamento - $preco_vista;
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FINANCIAMENTO DO CARRO</title>
    <link href="style.css" rel="stylesheet">
</head>
<body>
    <h2>FINANCIAMENTO DO CARRO</h2>

    <div class="resultado">
        <p>Preço à vista do carro: R$ <?php echo number_format($preco_vista, 2, ',', '.'); ?></p>
        <p>Total pago no financiamento: R$ <?php echo number_format($total_financiamento, 2, ',', '.'); ?></p>
        <p class="juros">Valor gasto só com juros: R$ <?php echo number_format($juros, 2, ',', '.'); ?></p>
    </div>

    <a href="index.html" class="botao">VOLTAR</a>
</body>
</html>
