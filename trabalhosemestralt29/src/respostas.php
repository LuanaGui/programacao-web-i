<?php
require_once __DIR__ . '/db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Se for envio automático (AJAX): id_pergunta + valor
    if (isset($_POST['id_pergunta']) && isset($_POST['valor'])) {
        $id_pergunta = $_POST['id_pergunta'];
        $resposta = $_POST['valor'];

        $stmt = $pdo->prepare("INSERT INTO avaliacoes (id_pergunta, resposta) VALUES (?, ?)");
        $stmt->execute([$id_pergunta, $resposta]);
        exit; // encerra aqui (sem redirecionar)
    }

    // Se for envio completo do formulário (caso tradicional)
    if (isset($_POST['resposta'])) {
        $feedback = $_POST['feedback'] ?? null;

        foreach ($_POST['resposta'] as $id_pergunta => $resposta) {
            $stmt = $pdo->prepare("INSERT INTO avaliacoes (id_pergunta, resposta, feedback) VALUES (?, ?, ?)");
            $stmt->execute([$id_pergunta, $resposta, $feedback]);
        }

        header("Location: ../public/obrigado.php");
        exit;
    }
}
?>
