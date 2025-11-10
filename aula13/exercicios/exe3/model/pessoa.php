<?php
namespace model;

require_once 'contato.php';
require_once 'endereco.php';

use model\Contato;
use model\Endereco;

class Pessoa {
    private string $nome;
    private string $sobrenome;
    private string $dataNascimento;
    private string $cpfCnpj;
    private int $tipo; // 1 - Física | 2 - Jurídica
    private Contato $telefone;
    private Endereco $endereco;

    public function __construct() {
        $this->telefone = new Contato();
        $this->endereco = new Endereco();
    }

    public function getNome(): string {
        return $this->nome;
    }

    public function setNome(string $nome): void {
        $this->nome = $nome;
    }

    public function getSobrenome(): string {
        return $this->sobrenome;
    }

    public function setSobrenome(string $sobrenome): void {
        $this->sobrenome = $sobrenome;
    }

    public function getDataNascimento(): string {
        return $this->dataNascimento;
    }

    public function setDataNascimento(string $dataNascimento): void {
        $this->dataNascimento = $dataNascimento;
    }

    public function getCpfCnpj(): string {
        return $this->cpfCnpj;
    }

    public function setCpfCnpj(string $cpfCnpj): void {
        $this->cpfCnpj = $cpfCnpj;
    }

    public function getTipo(): int {
        return $this->tipo;
    }

    public function setTipo(int $tipo): void {
        $this->tipo = $tipo;
    }

    public function getTelefone(): Contato {
        return $this->telefone;
    }

    public function setTelefone(Contato $telefone): void {
        $this->telefone = $telefone;
    }

    public function getEndereco(): Endereco {
        return $this->endereco;
    }

    public function setEndereco(Endereco $endereco): void {
        $this->endereco = $endereco;
    }

    //Método para retornar os dados em JSON
    public function toJson(): string {
        return json_encode(get_object_vars($this), JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
    }
}
?>
