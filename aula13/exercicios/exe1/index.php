<?php
require_once 'model/endereco.php';
require_once 'model/contato.php';
require_once 'model/pessoa.php';

use model\Endereco;
use model\Contato;
use model\Pessoa;

//Cria e preenche endereço
$endereco = new Endereco();
$endereco->setLogradouro("Pamplona, 89");
$endereco->setBairro("Jardim Alexandre");
$endereco->setCidade("Rio do Sul");
$endereco->setEstado("SC");
$endereco->setCep("89164-198");

//Cria e preenche contato
$contato = new Contato();
$contato->setTipo(1);
$contato->setNome("Celular");
$contato->setValor("(47) 99999-9999");

//Cria e preenche pessoa
$pessoa = new Pessoa();
$pessoa->setNome("Luana");
$pessoa->setSobrenome("Guilherme");
$pessoa->setDataNascimento("2005-05-02");
$pessoa->setCpfCnpj("123.456.789-00");
$pessoa->setTipo(1);
$pessoa->setTelefone($contato);
$pessoa->setEndereco($endereco);

//Exibe os dados da pessoa
$pessoa->inicializaClasse();
echo "Nome Completo: " . $pessoa->getNomeCompleto() . "<br>";
echo "Idade: " . $pessoa->getIdade() . " anos<br>";

echo "<strong>Contato:</strong> " . $pessoa->getTelefone()->getNome() . ": " . $pessoa->getTelefone()->getValor() . "<br>";
echo "<strong>Endereço:</strong> " . $pessoa->getEndereco()->getLogradouro() . ", " . 
     $pessoa->getEndereco()->getBairro() . " - " . 
     $pessoa->getEndereco()->getCidade() . "/" . 
     $pessoa->getEndereco()->getEstado() . " - CEP: " . 
     $pessoa->getEndereco()->getCep() . "<br>";
echo "CEP: " . $pessoa->getEndereco()->getCep();
?>