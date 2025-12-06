<?php
$host = "localhost";
$port = "5432";
$dbname = "exercicio1";
$user = "postgres";
$password = "teste123";

$conexao = pg_connect("host=$host port=$port dbname=$dbname user=$user password=$password");

if (!$conexao) {
    die("Erro ao conectar ao banco.");
}
?>
