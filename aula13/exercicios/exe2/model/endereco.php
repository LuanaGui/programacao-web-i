<?php
namespace model;

class Endereco {
    private string $rua;
    private string $cidade;

    public function __construct(string $rua = "", string $cidade = "") {
        $this->rua = $rua;
        $this->cidade = $cidade;
    }

    public function getRua(): string {
        return $this->rua;
    }

    public function setRua(string $rua): void {
        $this->rua = $rua;
    }

    public function getCidade(): string {
        return $this->cidade;
    }

    public function setCidade(string $cidade): void {
        $this->cidade = $cidade;
    }
}
?>
