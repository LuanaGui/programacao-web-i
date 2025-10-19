<?php
try {
    $connectionString = "host=localhost port=5432 dbname=local user=postgres password=teste123";
    $connection = pg_connect($connectionString);

    if ($connection) {
        echo "Database conectado...";

        $result = pg_query($connection, "SELECT COUNT(*) AS qtdtabs FROM pg_tables");

        while ($row = pg_fetch_assoc($result)) {
            echo "<br>Result: " . $row['qtdtabs'];
        }
    } else {
        echo "Falha na conexão com o banco de dados.";
    }
} catch (Exception $e) {
    echo "Erro: " . $e->getMessage();
}

$aDadosPessoa = array ('João', 'Da Silva', 'joao.silva@gmail.com', 'teste123', 'São Paulo', 'SP');

$resultInsert = pg_query_params($connection, "INSERT INTO TBPESSOA (pesnome, pessobrenome, pesemail, pespassword, pescidade, pesestado) VALUES ($1, $2, $3, $4, $5, $6)", $aDadosPessoa);

if ($resultInsert) {
    echo "<br>Registro inserido com sucesso!";
} else {
    echo "<br>Erro ao inserir registro: " . pg_last_error($connection);
}
?>
