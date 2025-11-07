<?php
require_once 'usuario.php';
require_once 'session.php';

session_start();

//Usuário Teste
$usuarioRegistrado = new Usuario("Maria Silva", "maria", "1234");

// "Sair" -> encerra a sessão
if (isset($_POST['logout'])) {
    session_destroy();
    echo "<p>Sessão encerrada!</p>";
    exit;
}

//formulário de login
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $login = $_POST['login'] ?? '';
    $senha = $_POST['senha'] ?? '';

    if ($login === $usuarioRegistrado->userLogin && $senha === $usuarioRegistrado->userPass) {
        $sessao = new Session($usuarioRegistrado);
        $sessao->iniciaSessao();
        echo "<h3>Bem-vinda, " . $_SESSION['userName'] . "!</h3>";
        echo "<form method='post'><button type='submit' name='logout'>Sair</button></form>";
        exit;
    } else {
        echo "<p style='color:red;'>Login ou senha incorretos.</p>";
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Login simples</title>
</head>
<body>
    <h2>Login de Teste</h2>
    <form method="post">
        <label>Usuário:</label>
        <input type="text" name="login" required><br><br>

        <label>Senha:</label>
        <input type="password" name="senha" required><br><br>

        <button type="submit">Entrar</button>
    </form>
</body>
</html>
