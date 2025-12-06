<?php
require "conexao.php";

$nome = $_POST['nome'];
$sobrenome = $_POST['sobrenome'];
$email = $_POST['email'];
$senha = $_POST['senha'];
$cidade = $_POST['cidade'];
$estado = $_POST['estado'];

$sql = "INSERT INTO TBPESSOA 
        (PESNOME, PESSOBRENOME, PESEMAIL, PESPASSWORD, PESCIDADE, PESESTADO)
        VALUES ($1, $2, $3, $4, $5, $6)";

$params = array($nome, $sobrenome, $email, $senha, $cidade, $estado);

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
