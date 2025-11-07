<?php
class Time {
    private $nome;
    private $anoFundacao;
    private $jogadores = array();

    public function __construct($nome, $anoFundacao) {
        $this->nome = $nome;
        $this->anoFundacao = $anoFundacao;
    }

    public function adicionarJogador($jogador) {
        array_push($this->jogadores, $jogador);
    }

    public function getJogadores() {
        return $this->jogadores;
    }

    public function getNome() {
        return $this->nome;
    }

    public function getAnoFundacao() {
        return $this->anoFundacao;
    }

    public function listaJogadores() {
        foreach ($this->jogadores as $jogador) {
            echo "Nome: " . $jogador->getNome() . "<br>";
            echo "Posição: " . $jogador->getPosicao() . "<br>";
            echo "Data de Nascimento: " . $jogador->getDataNascimento() . "<br><br>";
        }
    }
}
?>
