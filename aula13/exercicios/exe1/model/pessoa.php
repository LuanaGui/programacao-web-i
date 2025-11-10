<?php
namespace model;

require_once 'endereco.php';
require_once 'contato.php';

class Pessoa {
    private string $nome;
    private string $sobrenome;
    private string $dataNascimento;
    private string $cpfCnpj;
    private int $tipo;
    private Contato $telefone;
    private Endereco $endereco;

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

    public function getNomeCompleto(): string {
        return $this->nome . " " . $this->sobrenome;
    }

    public function getIdade(): int {
        $nasc = new \DateTime($this->dataNascimento);
        $hoje = new \DateTime();
        return $hoje->diff($nasc)->y;
    }

    public function inicializaClasse(): void {
        echo "Classe Pessoa inicializada!<br>";
    }
}
?>