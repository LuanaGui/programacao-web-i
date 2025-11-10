<?php
require_once 'model/pessoa.php';
require_once 'model/contato.php';
require_once 'model/endereco.php';

use model\Pessoa;
use model\Contato;
use model\Endereco;

$pai = new Pessoa();
$pai->setNome("João");
$pai->setSobrenome("Guilherme");
$pai->setDataNascimento("1975-03-20");
$pai->setCpfCnpj("12345678900");
$pai->setTipo(1);

$mae = new Pessoa();
$mae->setNome("Maria");
$mae->setSobrenome("Guilherme");
$mae->setDataNascimento("1978-07-15");
$mae->setCpfCnpj("98765432100");
$mae->setTipo(1);

$irma = new Pessoa();
$irma->setNome("Ana");
$irma->setSobrenome("Guilherme");
$irma->setDataNascimento("2008-02-12");
$irma->setCpfCnpj("11223344556");
$irma->setTipo(1);

// Array
$familia = [$pai, $mae, $irma];

$conteudo = "";
foreach ($familia as $pessoa) {
    $conteudo .= "Nome completo: " . $pessoa->getNomeCompleto() . "\n";
    $conteudo .= "Idade: " . $pessoa->getIdade() . " anos\n";
    $conteudo .= "CPF/CNPJ: " . $pessoa->getCpfCnpj() . "\n";
    $conteudo .= "--------------------------\n";
}

file_put_contents("familia.txt", $conteudo);

echo "<h3>Arquivo familia.txt criado com sucesso!</h3>";
echo nl2br($conteudo);
?>
