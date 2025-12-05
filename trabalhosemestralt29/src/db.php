<?php
$config = include __DIR__ . '/../config.php';
$dbConfig = $config['db'];

// Define variáveis de conexão
$host = $dbConfig['host'];
$port = $dbConfig['port'];
$dbname = $dbConfig['dbname'];
$user = $dbConfig['user'];
$password = $dbConfig['password'];

try {
    // Cria a conexão PDO com PostgreSQL
    $pdo = new PDO("pgsql:host=$host;port=$port;dbname=$dbname", $user, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Erro na conexão com o banco de dados: " . $e->getMessage());
}
?>
