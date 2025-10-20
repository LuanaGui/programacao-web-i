<?php
$valor_vista = 8654.00;

$parcelas_opcoes = [24, 36, 48, 60];
$taxa_inicial = 2.0; // 2% para 24x
$aumento_taxa = 0.3; // aumento 0,3% a cada nível

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>JUROS COMPOSTOS</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h2>FINANCIAMENTO DA MOTO (JUROS COMPOSTOS)</h2>

    <div class="resultado">
        <p>Valor à vista da moto: R$ <?php echo number_format($valor_vista, 2, ',', '.'); ?></p>
        <hr>

        <?php
        foreach ($parcelas_opcoes as $indice => $parcelas) {
            $taxa = $taxa_inicial + ($aumento_taxa * $indice);
            $montante = $valor_vista * pow(1 + $taxa / 100, $parcelas);
            $valor_parcela = $montante / $parcelas;

            echo "<p><strong>$parcelas vezes</strong> — Taxa: $taxa%<br>";
            echo "Valor total (montante): R$ " . number_format($montante, 2, ',', '.') . "<br>";
            echo "Valor de cada parcela: R$ " . number_format($valor_parcela, 2, ',', '.') . "</p><hr>";
        }
        ?>
    </div>

    <a href="index.html" class="botao">VOLTAR</a>
</body>
</html>
