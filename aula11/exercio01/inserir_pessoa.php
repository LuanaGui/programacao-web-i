<?php
$connectionString = "host=localhost port=5432 dbname=local user=postgres password=teste123";
$connection = pg_connect($connectionString);

if (!$connection) {
    die("Falha na conexão com o banco de dados.");
}

$aPessoas = [
    ['João', 'Da Silva', 'joao.silva@gmail.com', 'teste123', 'São Paulo', 'SP'],
    ['Maria', 'Oliveira', 'maria.oliveira@gmail.com', 'senha456', 'Curitiba', 'PR'],
    ['Carlos', 'Souza', 'carlos.souza@gmail.com', 'abc123', 'Belo Horizonte', 'MG'],
    ['Ana', 'Pereira', 'ana.pereira@gmail.com', 'segredo', 'Florianópolis', 'SC'],
    ['Pedro', 'Costa', 'pedro.costa@gmail.com', 'senha789', 'Rio de Janeiro', 'RJ']
];

foreach ($aPessoas as $pessoa) {
    pg_query_params($connection, "
        INSERT INTO TBPESSOA (pesnome, pessobrenome, pesemail, pespassword, pescidade, pesestado)
        VALUES ($1, $2, $3, $4, $5, $6)
    ", $pessoa);
}

echo "5 registros inseridos com sucesso!";
pg_close($connection);
?>
