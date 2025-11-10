<?php
namespace model;

class Contato {
    private string $telefone;
    private string $email;

    public function __construct(string $telefone = '', string $email = '') {
        $this->telefone = $telefone;
        $this->email = $email;
    }

    public function getTelefone(): string {
        return $this->telefone;
    }

    public function setTelefone(string $telefone): void {
        $this->telefone = $telefone;
    }

    public function getEmail(): string {
        return $this->email;
    }

    public function setEmail(string $email): void {
        $this->email = $email;
    }

    //Método para converter para JSON
    public function toJson() {
    return json_encode(get_object_vars($this), JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
    }
}
?>
