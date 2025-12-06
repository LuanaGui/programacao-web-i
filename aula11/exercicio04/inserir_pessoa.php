<?php
require "conexao.php";
require "funcoes_validacao.php";

$dados = sanitizar_dados_pessoa($_POST);

$erros = [];

if (!validar_nome($dados["nome"])) {
    $erros[] = "Nome inválido (mínimo 2 caracteres).";
}

if (!validar_email($dados["email"])) {
    $erros[] = "E-mail inválido.";
}

if (!validar_senha($dados["senha"])) {
    $erros[] = "A senha deve ter pelo menos 4 caracteres.";
}

if (!validar_estado($dados["estado"])) {
    $erros[] = "Estado inválido.";
}

if (!empty($erros)) {
    echo "<h3>Erros encontrados:</h3><ul>";
    foreach ($erros as $e) {
        echo "<li>$e</li>";
    }
    echo "</ul><a href='index.html'>Voltar</a>";
    exit;
}

$sql = "INSERT INTO TBPESSOA 
        (PESNOME, PESSOBRENOME, PESEMAIL, PESPASSWORD, PESCIDADE, PESESTADO)
        VALUES ($1, $2, $3, $4, $5, $6)";

$params = [
    $dados["nome"],
    $dados["sobrenome"],
    $dados["email"],
    $dados["senha"],
    $dados["cidade"],
    $dados["estado"]
];

$result = pg_query_params($conexao, $sql, $params);
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Resultado</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<div class="msg-box">
    <?php if ($result) { ?>
        <p class="msg-sucesso">Cadastro realizado com sucesso!</p>

        <a href="index.html">Cadastrar outra pessoa</a>
        <a href="listar_pessoa.php">Ver lista de pessoas</a>

    <?php } else { ?>
        <p class="msg-sucesso" style="color: red;">Erro ao cadastrar.</p>
        <a href="index.html">Tentar novamente</a>
    <?php } ?>
</div>

</body>
</html>
