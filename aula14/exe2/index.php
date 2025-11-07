<?php
require_once 'jogador.php';
require_once 'time.php';

//Time
$time = new time("Flamengo", 2025);

//Jogadores
$jogador1 = new Jogador("Gabriel", "Atacante", "1995-05-10");
$jogador2 = new Jogador("Bruno", "Meio-campo", "1993-08-22");
$jogador3 = new Jogador("Rafael", "Defensor", "1990-11-15");


//Coloca jogadores no time
$time->adicionarJogador($jogador1);
$time->adicionarJogador($jogador2); 
$time->adicionarJogador($jogador3);

//Exibe informações do time e jogadores
echo "<h2>Time: " .$time->getNome() . "</h2>";
echo "<p>Ano de Fundação: " . $time->getAnoFundacao() . "<br><br>";


echo "<h3>Jogadores:</h3>";

$time->listaJogadores();

?>