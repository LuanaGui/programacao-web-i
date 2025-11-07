<?php
class Computador {
    private $estado; // Armazena o estado atual: "Ligado" ou "Desligado"

    public function __construct() {
        $this->estado = "Desligado"; // Estado inicial padrão
    }

    public function ligar() {
        $this->estado = "Ligado";
        echo "Computador Ligado.<br>";
    }

    public function desligar() {
        $this->estado = "Desligado";
        echo "Computador Desligado.<br>";
    }

    public function status() {
        echo "Status atual: " . $this->estado . "<br>";
    }
}
?>
