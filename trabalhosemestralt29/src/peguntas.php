<?php
require_once 'db.php';
require_once 'funcoes.php';

function listarPerguntas() {
    $pdo = conectarBD();
    $sql = "SELECT * FROM perguntas ORDER BY id DESC";
    return $pdo->query($sql)->fetchAll();
}

function criarPergunta($texto) {
    $pdo = conectarBD();
    $sql = "INSERT INTO perguntas (texto) VALUES (:texto)";
    $stmt = $pdo->prepare($sql);
    return $stmt->execute(['texto' => limpar($texto)]);
}

function editarPergunta($id, $texto){
    $pdo = conectarBD();
    $sql = "UPDATE perguntas SET texto = :texto WHERE id = :id";
    $stmt = $pdo->prepare($sql);
    return $stmt->execute(['id' => $id, 'texto' => limpar($texto)]);
}

function removerPergunta($id){
    $pdo = conectarBD();
    $sql = "DELETE FROM perguntas WHERE id = :id";
    $stmt = $pdo->prepare($sql);
    return $stmt->execute(['id' => $id]);
}
