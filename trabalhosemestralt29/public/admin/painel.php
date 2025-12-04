<?php
session_start();
require_once __DIR__ . '/../../src/db.php';
require_once __DIR__ . '/../../src/funcoes.php';

// Redireciona se não estiver logado
if (!isset($_SESSION['admin_id'])) {
    header("Location: ../login.php");
    exit;
}

// Mensagem de status
$mensagem = '';

// Cadastrar nova pergunta
if (isset($_POST['cadastrar'])) {
    $texto = limpar($_POST['nova_pergunta']);
    if ($texto) {
        $stmt = $pdo->prepare("INSERT INTO perguntas (texto_pergunta) VALUES (:texto)");
        $stmt->execute(['texto' => $texto]);
        header("Location: painel.php?mensagem=1");
        exit;
    }
}

// Remover pergunta
if (isset($_GET['remover'])) {
    $id = intval($_GET['remover']);
    $stmt = $pdo->prepare("DELETE FROM perguntas WHERE id_pergunta = :id");
    $stmt->execute(['id' => $id]);
    header("Location: painel.php?mensagem=2");
    exit;
}

// Exibir mensagens de acordo com a ção utilizada
if (isset($_GET['mensagem'])) {
    switch ($_GET['mensagem']) {
        case 1: $mensagem = "Pergunta cadastrada com sucesso!"; break;
        case 2: $mensagem = "Pergunta removida com sucesso!"; break;
    }
}

// Buscar todas as perguntas
$perguntas = $pdo->query("SELECT * FROM perguntas ORDER BY id_pergunta DESC")->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/painelad.css">
    <title>Painel Administrativo</title>
</head>
<body>
<div class="container painel-container">
    <h1 class="titulo">PAINEL ADMINISTRATIVO</h1>

    <!-- Cadastro de pergunta -->
    <form action="" method="post">
        <input type="text" name="nova_pergunta" placeholder="Digite a nova pergunta" required>
        <button type="submit" name="cadastrar" class="btn-enviar">Cadastrar Pergunta</button>
    </form>

    <?php if($mensagem): ?>
    <div class="mensagem-status" id="mensagemStatus"><?= htmlspecialchars($mensagem) ?></div>
    <?php endif; ?>


    <!--Exibe Perguntas Cadastradas-->
    <h2>Perguntas Cadastradas</h2>
    <ul class="lista-perguntas">
    <?php foreach($perguntas as $p): ?>
    <li>
        <span class="texto-pergunta"><?= htmlspecialchars($p['texto_pergunta']) ?></span>
        <div class="botoes-pergunta">
            <a href="edicao.php?id=<?= $p['id_pergunta'] ?>" class="btn-editar">Editar</a>
            <a href="?remover=<?= $p['id_pergunta'] ?>" onclick="return confirm('Deseja realmente remover?')" class="btn-remover">Remover</a>
        </div>
    </li>
        <?php endforeach; ?>
    </ul>
</div>
</body>
</html>
