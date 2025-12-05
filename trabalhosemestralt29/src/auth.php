<?php
require_once 'db.php';
require_once 'funcoes.php';

function login($login, $senha){
    $pdo = conectarBD();

    $sql = "SELECT * FROM usuarios_admin WHERE login = :login";
    $stmt = $pdo->prepare($sql);
    $stmt->execute(['login' => $login]);

    if($stmt->rowCount() == 1){
        $user = $stmt->fetch();

        if(password_verify($senha, $user['senha'])){
            session_start();
            $_SESSION['admin'] = $user['id'];
            return true;
        }
    }
    // Caso o login não exista ou a senha esteja incorreta, retorna false
    return false;
}

function verificarLogin(){
    session_start();
    if(!isset($_SESSION['admin'])){
        header("Location: ../tela_login/index.html");
        exit;
    }
}
