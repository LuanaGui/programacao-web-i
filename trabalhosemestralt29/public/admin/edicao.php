<?php
session_start();
require_once __DIR__ . '/../../src/db.php';
require_once __DIR__ . '/../../src/funcoes.php';

// Redireciona se não estiver logado
if (!isset($_SESSION['admin_id'])) {
    header("Location: ../login.php");
    exit;
}

// Verifica se recebeu o ID da pergunta
if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
    header("Location: painel.php");
    exit;
}

$id_pergunta = intval($_GET['id']);
$mensagem = '';

// Buscar a pergunta no banco
$stmt = $pdo->prepare("SELECT * FROM perguntas WHERE id_pergunta = :id");
$stmt->execute(['id' => $id_pergunta]);
$pergunta = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$pergunta) {
    header("Location: painel.php"); // Se não encontrar, volta para o painel
    exit;
}

// Atualizar a pergunta
if (isset($_POST['atualizar'])) {
    $texto = limpar($_POST['texto_pergunta']);
    if ($texto) {
        $stmt = $pdo->prepare("UPDATE perguntas SET texto_pergunta = :texto WHERE id_pergunta = :id");
        $stmt->execute(['texto' => $texto, 'id' => $id_pergunta]);
        header("Location: painel.php?mensagem=3"); // mensagem de sucesso
        exit;
    } else {
        $mensagem = "O campo não pode ficar vazio!";
    }
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/painelad.css">
    <title>Editar Pergunta</title>
</head>
<body>
<div class="container painel-container">
    <h1 class="titulo">Editar Pergunta</h1>

    <!-- Mensagem -->
    <?php if($mensagem): ?>
        <p class="descricao-login"><?= htmlspecialchars($mensagem) ?></p>
    <?php endif; ?>

    <!-- Edição de Perguntas -->
    <form action="" method="post">
        <input type="text" name="texto_pergunta" value="<?= htmlspecialchars($pergunta['texto_pergunta']) ?>" required>
        <button type="submit" name="atualizar" class="btn-enviar">Atualizar Pergunta</button>
        <a href="painel.php" class="btn-cancelar">Cancelar</a>
    </form>
</div>
</body>
</html>
