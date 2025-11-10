<?php
namespace model;

class Contato {
    private string $telefone;

    public function __construct(string $telefone = "") {
        $this->telefone = $telefone;
    }

    public function getTelefone(): string {
        return $this->telefone;
    }

    public function setTelefone(string $telefone): void {
        $this->telefone = $telefone;
    }
}
?>
