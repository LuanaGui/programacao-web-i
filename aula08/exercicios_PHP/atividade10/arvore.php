<?php
$pastas = array(
    "bsn" => array(
        "3a Fase" => array(
            "desenvWeb",
            "bancoDados 1",
            "engSoft 1"
        ),
        "4a Fase" => array(
            "Intro Web",
            "bancoDados 2",
            "engSoft 2"
        )
    )
);

function exibirArvore($array, $nivel = 0) {
    foreach ($array as $chave => $valor) {
        echo str_repeat("-", $nivel) . " " . (is_array($valor) ? $chave : $valor) . "<br>";
        if (is_array($valor)) {
            exibirArvore($valor, $nivel + 1);
        }
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>ÁRVORE</title>
</head>
<body>
    <h3>Estrutura de Pastas</h3>
    <?php exibirArvore($pastas); ?>
</body>
</html>
