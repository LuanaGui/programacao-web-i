<?php
$valor_vista = 8654.00;

$parcelas_opcoes = [24, 36, 48, 60];
$taxa_inicial = 1.5; // em %

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FINANCIAMENTO</title>
</head>
<body>
    <h2>FINANCIAMENTO DA MOTO</h2>

    <div class="resultado">
        <p>Valor à vista da moto: R$ <?php echo number_format($valor_vista, 2, ',', '.'); ?></p>
        <hr>

        <?php
        foreach ($parcelas_opcoes as $indice => $parcelas) {
            $taxa = $taxa_inicial + (0.5 * $indice); // aumenta 0,5% a cada nível
            $juros = $valor_vista * ($taxa / 100) * $parcelas;
            $montante = $valor_vista + $juros;
            $valor_parcela = $montante / $parcelas;

            echo "<p><strong>$parcelas vezes</strong> — Taxa: $taxa%<br>";
            echo "Valor total: R$ " . number_format($montante, 2, ',', '.') . "<br>";
            echo "Valor de cada parcela: R$ " . number_format($valor_parcela, 2, ',', '.') . "</p><hr>";
        }
        ?>
    </div>

    <a href="index.html" class="botao">VOLTAR</a>
</body>
</html>
