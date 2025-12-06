<?php
// Altere os dados conforme o seu PostgreSQL
$host = "localhost";
$port = "5432";
$dbname = "lab2";
$user = "postgres";
$password = "teste123";

$conexao = pg_connect("host=$host port=$port dbname=$dbname user=$user password=$password");

if (!$conexao) {
    die("Erro ao conectar ao banco.");
}
?>
