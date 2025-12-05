<?php
require_once 'db.php';

function listarDispositivos(){
    $pdo = conectarBD();
    return $pdo->query("SELECT * FROM dispositivos ORDER BY id")->fetchAll();
}

function criarDispositivo($nome){
    $pdo = conectarBD();

    // Insere um novo dispositivo com o nome informado
    $sql = "INSERT INTO dispositivos (nome) VALUES (:nome)";
    $stmt = $pdo->prepare($sql);
    
    return $stmt->execute(['nome' => $nome]);
}
