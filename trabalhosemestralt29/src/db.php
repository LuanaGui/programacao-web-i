<?php
// Inclui as credenciais do banco
$config = include __DIR__ . '/../config.php';

// Acessa as informações do array
$dbConfig = $config['db'];

$host = $dbConfig['host'];
$port = $dbConfig['port'];
$dbname = $dbConfig['dbname'];
$user = $dbConfig['user'];
$password = $dbConfig['password'];

try {
    // Cria a conexão PDO com PostgreSQL
    $pdo = new PDO("pgsql:host=$host;port=$port;dbname=$dbname", $user, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    //echo "Conexão com o banco de dados realizada com sucesso!";
} catch (PDOException $e) {
    //echo "Erro na conexão com o banco de dados: " . $e->getMessage();
}
?>
