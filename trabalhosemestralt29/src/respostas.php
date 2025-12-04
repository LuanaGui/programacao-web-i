<?php
require_once __DIR__ . '/db.php';
require_once __DIR__ . '/funcoes.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $setor_id = $_POST['setor_id'] ?? null;
    $dispositivo_id = $_POST['dispositivo_id'] ?? null;

    if (!$setor_id || !$dispositivo_id) {
        die("Erro: setor ou dispositivo não informado!");
    }
    
    // Se envio via AJAX (uma pergunta por vez)
    if (isset($_POST['id_pergunta']) && isset($_POST['valor'])) {
        $id_pergunta = limpar($_POST['id_pergunta']);
        $valor = limpar($_POST['valor']);

        $sql = "INSERT INTO avaliacoes (id_setor, id_pergunta, id_dispositivo, resposta)
                 VALUES (?, ?, ?, ?)";

        $stmt = $pdo->prepare($sql);
        $stmt->execute([$setor_id, $id_pergunta, $dispositivo_id, $valor]);
        exit;
    }


    // Se envio completo via formulário tradicional
    if (isset($_POST['resposta'])) {
        $feedback = limpar($_POST['feedback'] ?? null);

       foreach ($_POST['resposta'] as $id_pergunta => $resposta) {
            // Verifica se a pergunta existe e está ativa
             $stmt = $pdo->prepare("SELECT COUNT(*) FROM perguntas WHERE id_pergunta = :id AND status = TRUE");
            $stmt->execute(['id' => $id_pergunta]);
            if ($stmt->fetchColumn() == 0) continue; // pula se não existe

            // Insere a avaliação
            $stmt = $pdo->prepare("INSERT INTO avaliacoes 
                (id_setor, id_pergunta, id_dispositivo, resposta, feedback)
                VALUES (:setor, :pergunta, :dispositivo, :resposta, :feedback)");
            $stmt->execute([
                'setor' => $_POST['setor_id'],
                'pergunta' => $id_pergunta,
                'dispositivo' => $_POST['dispositivo_id'],
                'resposta' => $resposta,
                'feedback' => $_POST['feedback'] ?? null
            ]);
        }


        header("Location: ../public/obrigado.php");
        exit;
    }
}
?>
