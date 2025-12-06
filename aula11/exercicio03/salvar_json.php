<?php

echo "<link rel='stylesheet' href='style.css'>";

$arquivo = "pessoas.json";

// Se o arquivo não existir, cria com um array vazio
if (!file_exists($arquivo)) {
    file_put_contents($arquivo, json_encode([]));
}

$conteudo = file_get_contents($arquivo);
$pessoas = json_decode($conteudo, true);

// Verifica limite de 10 pessoas
if (count($pessoas) >= 10) {
    die("Limite de 10 pessoas atingido. Não é possível salvar mais registros.");
}

$novaPessoa = [
    "nome" => $_POST['nome'],
    "sobrenome" => $_POST['sobrenome'],
    "email" => $_POST['email'],
    "senha" => $_POST['senha'],
    "cidade" => $_POST['cidade'],
    "estado" => $_POST['estado']
];


$pessoas[] = $novaPessoa;


$json = json_encode($pessoas, JSON_PRETTY_PRINT);


file_put_contents($arquivo, $json);


echo "<h3>Pessoa salva no arquivo JSON com sucesso!</h3>";
echo "<a href='index.html'>Cadastrar outra pessoa</a>";
?>
