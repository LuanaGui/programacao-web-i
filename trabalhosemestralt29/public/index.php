<?php
require_once __DIR__ . '/../src/db.php';

// Busca perguntas ativas
$stmt = $pdo->query("SELECT * FROM perguntas WHERE status = TRUE ORDER BY id_pergunta");
$perguntas = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Avaliação de Qualidade - Trattoria Bella Itália</title>
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <link rel="stylesheet" href="css/style.css">
    <script defer src="js/script.js"></script>
</head>
<body>
    <div class="container">
        <h1 class="titulo">Avaliação de Qualidade</h1>
        <p class="descricao">Avalie nossa experiência e ajude-nos a melhorar!</p>

        <form id="form-avaliacao" action="../src/respostas.php" method="post" novalidate>
            <?php foreach($perguntas as $index => $p): ?>
                <div class="pergunta <?= $index === 0 ? 'ativa' : '' ?>" data-index="<?= $index ?>">
                    <span class="texto-pergunta"><?= htmlspecialchars($p['texto_pergunta']) ?></span>

                    <div class="escala">
                        <?php for ($i = 0; $i <= 10; $i++): ?>
                            <input 
                                type="radio" 
                                id="p<?= $p['id_pergunta'] ?>_<?= $i ?>" 
                                name="resposta[<?= $p['id_pergunta'] ?>]" 
                                value="<?= $i ?>" 
                                required
                            >
                            <!-- adicionamos data-value para colorir via CSS -->
                            <label for="p<?= $p['id_pergunta'] ?>_<?= $i ?>" data-value="<?= $i ?>"><?= $i ?></label>
                        <?php endfor; ?>
                    </div>
                </div>
            <?php endforeach; ?>

            <div class="pergunta aberta" data-index="<?= count($perguntas) ?>">
                <span class="texto-pergunta">Deixe um feedback adicional (opcional):</span>
                <textarea name="feedback" placeholder="Escreva aqui..."></textarea>
                <button type="submit" class="btn-enviar">Enviar Avaliação</button>
            </div>
        </form>

        <p class="anonimo">
            Sua avaliação é <strong>anônima</strong>. Nenhuma informação pessoal é solicitada.
        </p>
    </div>
</body>
</html>
