<?php
namespace model;

class Endereco {
    private string $rua;
    private string $numero;
    private string $bairro;
    private string $cidade;
    private string $estado;
    private string $cep;

    public function __construct(
        string $rua = '',
        string $numero = '',
        string $bairro = '',
        string $cidade = '',
        string $estado = '',
        string $cep = ''
    ) {
        $this->rua = $rua;
        $this->numero = $numero;
        $this->bairro = $bairro;
        $this->cidade = $cidade;
        $this->estado = $estado;
        $this->cep = $cep;
    }

    public function getRua(): string { return $this->rua; }
    public function setRua(string $rua): void { $this->rua = $rua; }

    public function getNumero(): string { return $this->numero; }
    public function setNumero(string $numero): void { $this->numero = $numero; }

    public function getBairro(): string { return $this->bairro; }
    public function setBairro(string $bairro): void { $this->bairro = $bairro; }

    public function getCidade(): string { return $this->cidade; }
    public function setCidade(string $cidade): void { $this->cidade = $cidade; }

    public function getEstado(): string { return $this->estado; }
    public function setEstado(string $estado): void { $this->estado = $estado; }

    public function getCep(): string { return $this->cep; }
    public function setCep(string $cep): void { $this->cep = $cep; }

    //Método para converter para JSON
    public function toJson() {
    return json_encode(get_object_vars($this), JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
    }
}
?>
