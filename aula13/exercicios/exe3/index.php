<?php
require_once 'model/pessoa.php';
require_once 'model/contato.php';
require_once 'model/endereco.php';

use model\Pessoa;
use model\Contato;
use model\Endereco;

// Contatos
$contatoPai = new Contato("4799999999", "edson@email.com");
$contatoMae = new Contato("4798888888", "elizete@email.com");
$contatoIrma = new Contato("4797777777", "rafaela@email.com");

// Endereços
$enderecoPai = new Endereco("Rua das Flores", "123", "Centro", "Rio do Sul", "SC", "89160-000");
$enderecoMae = clone $enderecoPai;
$enderecoIrma = clone $enderecoPai;

// Pessoas
$pai = new Pessoa();
$pai->setNome("Edson");
$pai->setSobrenome("Guilherme");
$pai->setDataNascimento("1975-03-20");
$pai->setCpfCnpj("12345678900");
$pai->setTipo(1);
$pai->setTelefone($contatoPai);
$pai->setEndereco($enderecoPai);

$mae = new Pessoa();
$mae->setNome("Elizete");
$mae->setSobrenome("Kruger");
$mae->setDataNascimento("1978-07-15");
$mae->setCpfCnpj("98765432100");
$mae->setTipo(1);
$mae->setTelefone($contatoMae);
$mae->setEndereco($enderecoMae);

$irma = new Pessoa();
$irma->setNome("Rafaela");
$irma->setSobrenome("Guilherme");
$irma->setDataNascimento("2008-02-12");
$irma->setCpfCnpj("11223344556");
$irma->setTipo(1);
$irma->setTelefone($contatoIrma);
$irma->setEndereco($enderecoIrma);

// Array
$pessoas = [
    "pai" => $pai,
    "mae" => $mae,
    "irma" => $irma
];

// Criar pasta "dados" se não existir
if (!is_dir("dados")) {
    mkdir("dados");
}

// Salvar cada pessoa em um arquivo JSON
foreach ($pessoas as $nome => $pessoa) {
    $json = $pessoa->toJson();
    file_put_contents("dados/{$nome}.json", $json);
    echo ucfirst($nome) . ".json criado com sucesso!<br>";
}
?>
