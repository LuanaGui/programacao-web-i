<?php
namespace model;

class Pessoa {
    private string $nome;
    private string $sobrenome;
    private string $dataNascimento;
    private string $cpfCnpj;
    private int $tipo;
    private $telefone;
    private $endereco;

    public function __construct($nome, $sobrenome, $dataNascimento, $cpfCnpj, $tipo) {
        $this->nome = $nome;
        $this->sobrenome = $sobrenome;
        $this->dataNascimento = $dataNascimento;
        $this->cpfCnpj = $cpfCnpj;
        $this->tipo = $tipo;
    }

    // Retorna o nome completo da pessoa
    public function getNomeCompleto(): string {
        return $this->nome . ' ' . $this->sobrenome;
    }

    // Calcula a idade da pessoa com base na data de nascimento
    public function getIdade(): int {
        $nascimento = new \DateTime($this->dataNascimento);
        $hoje = new \DateTime();
        $idade = $hoje->diff($nascimento)->y;
        return $idade;
    }

    // Inicializa a classe
    public function inicializaClasse(): void {
    echo "Classe Pessoa inicializada com sucesso!<br>";
    }
}
?>

