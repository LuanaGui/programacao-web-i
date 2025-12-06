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

if ($result) {
    echo "Registro inserido com sucesso!";
} else {
    echo "Erro ao inserir registro.";
}
?>
