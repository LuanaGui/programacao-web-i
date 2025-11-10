<?php
require_once 'model/pessoa.php';

use model\Pessoa;

$pessoa = new Pessoa("Luana", "Guilherme", "2005-05-02", "12345678900", 1);

$pessoa->inicializaClasse();
echo "Nome completo: " . $pessoa->getNomeCompleto() . "<br>";
echo "Idade: " . $pessoa->getIdade() . " anos";
?>
