<?php
require_once __DIR__ . '/db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $feedback = $_POST['feedback'] ?? null;

    foreach ($_POST['resposta'] as $id_pergunta => $resposta) {
        $stmt = $pdo->prepare("INSERT INTO avaliacoes (id_pergunta, resposta, feedback) VALUES (?, ?, ?)");
        $stmt->execute([$id_pergunta, $resposta, $feedback]);
    }

    // Redireciona para a página de agradecimento
    header("Location: ../public/obrigado.php");
    exit;
}
?>
