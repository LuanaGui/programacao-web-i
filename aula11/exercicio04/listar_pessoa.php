<?php
require "conexao.php";

$busca = isset($_GET['busca']) ? $_GET['busca'] : '';

if ($busca != '') {
    $sql = "SELECT * FROM tbpessoa 
            WHERE pesnome ILIKE $1
            ORDER BY pescodigo";
    $result = pg_query_params($conexao, $sql, array('%'.$busca.'%'));
} else {
    $sql = "SELECT * FROM tbpessoa ORDER BY pescodigo";
    $result = pg_query($conexao, $sql);
}

$pessoas = pg_fetch_all($result);

include "listar.html";
?>
