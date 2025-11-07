<?php
require_once __DIR__ . '/../src/db.php';

// Busca perguntas ativas no banco
$stmt = $pdo->query("SELECT * FROM perguntas WHERE status = TRUE ORDER BY id_pergunta");
$perguntas = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Avaliação de Qualidade - Trattoria Bella Itália</title>
    <link rel="stylesheet" href="public/css/style.css">
</head>
<body>
    <div class="container">
        <h1>Avaliação de Qualidade</h1>
        <p>Por favor, avalie nossos serviços abaixo:</p>

        <form action="../src/respostas.php" method="post">
            <?php foreach($perguntas as $p): ?>
                <div class="pergunta">
                    <label><?= htmlspecialchars($p['texto_pergunta']) ?></label>
                    <div class="escala">
                        <?php for ($i = 0; $i <= 10; $i++): ?>
                            <input type="radio" name="resposta[<?= $p['id_pergunta'] ?>]" value="<?= $i ?>" required>
                            <label><?= $i ?></label>
                        <?php endfor; ?>
                    </div>
                </div>
            <?php endforeach; ?>

            <div class="pergunta aberta">
                <label>Feedback adicional (opcional):</label>
                <textarea name="feedback" placeholder="Deixe seu comentário aqui..."></textarea>
            </div>

            <button type="submit">Enviar Avaliação</button>
        </form>

        <p class="anonimo">
            Sua avaliação espontânea é anônima, nenhuma informação pessoal é solicitada ou armazenada.
        </p>
    </div>
</body>
</html>
