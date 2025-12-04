<?php
session_start();
require_once __DIR__ . '/../../src/db.php';      // conexão com banco
require_once __DIR__ . '/../../src/funcoes.php'; // função limpar()

$erro = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $usuario = limpar($_POST['usuario'] ?? '');
    $senha = $_POST['senha'] ?? '';

    if ($usuario && $senha) {
        // Busca o usuário no banco
        $sql = "SELECT * FROM admin WHERE usuario = :usuario";
        $stmt = $pdo->prepare($sql);
        $stmt->execute(['usuario' => $usuario]);
        $admin = $stmt->fetch(PDO::FETCH_ASSOC);

        // Verifica senha
        if ($admin && password_verify($senha, $admin['senha'])) {
            $_SESSION['admin_id'] = $admin['id_admin'];
            $_SESSION['admin_usuario'] = $admin['usuario'];
            header("Location: painel.php"); // página administrativa
            exit;
        } else {
            $erro = "Usuário ou senha incorretos!";
        }
    } else {
        $erro = "Preencha todos os campos!";
    }
}
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Login - Admin</title>
    <link rel="stylesheet" href="../css/login.css">
</head>
<body>
    <div class="container container-login">
        <h1 class="titulo">LOGIN ADMINISTRATIVO</h1>
        <p id="alerta-login" class="descricao-login"></p>

        <?php if ($erro): ?>
            <p class="erro"><?= htmlspecialchars($erro) ?></p>
        <?php endif; ?>

        <form action="" method="post">
            <input type="text" name="usuario" placeholder="Usuário">
            <input type="password" name="senha" placeholder="Senha">
            <button type="submit" class="btn-enviar">Entrar</button>
        </form>
    </div>
</body>
<script>
const form = document.querySelector('form');
const alerta = document.getElementById('alerta-login');
const inputs = form.querySelectorAll('input');

form.addEventListener('submit', function(e) {
    const usuario = form.usuario.value.trim();
    const senha = form.senha.value.trim();

    if (!usuario || !senha) {
        e.preventDefault(); // impede envio do formulário
        alerta.textContent = "Por favor, preencha usuário e senha!";
        alerta.style.display = "block";

        alerta.style.animation = 'none';
        setTimeout(() => { alerta.style.animation = 'shake 0.3s ease'; }, 10);

        // faz o alerta desaparecer após 1.5s
        setTimeout(() => {
            alerta.style.display = 'none';
            alerta.textContent = '';
        }, 1500);
    }
});

inputs.forEach(input => {
    input.addEventListener('focus', () => {
        alerta.style.display = 'none';
        alerta.textContent = '';
    });
});
</script>
</html>
