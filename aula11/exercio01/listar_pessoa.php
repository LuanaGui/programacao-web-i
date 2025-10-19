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
?>

<?php
        //Exibe cada registro em uma linha da tabela
         while ($row = pg_fetch_assoc($result)) {
            echo "<tr>";
            echo "<td>" . htmlspecialchars($row['pesnome']) . "</td>";
            echo "<td>" . htmlspecialchars($row['pessobrenome']) . "</td>";
            echo "<td>" . htmlspecialchars($row['pesemail']) . "</td>";
            echo "<td>" . htmlspecialchars($row['pescidade']) . "</td>";
            echo "<td>" . htmlspecialchars($row['pesestado']) . "</td>";
            echo "</tr>";
        }

        // Fecha a conexão
        pg_close($connection);
?>4



