<?php
class Vinho {
    private $nome;
    private $tipo;
    private $preco;
    private $data;

    public function __construct($nome, $tipo, $preco, $data) {
        $this->nome = $nome;
        $this->tipo = $tipo;
        $this->preco = $preco;
        $this->data = $data;
    }

    public function getNome() {
        return $this->nome;
    }

    public function getTipo() {
        return $this->tipo;
    }

    public function getPreco() {
        return $this->preco;
    }

    public function getdata() {
        return $this->data;
    }

    public function texto() {
        return "Nome: {$this->nome}, Tipo: {$this->tipo}, Preço: R$ {$this->preco}, data: {$this->data}";
    }

    public function desconto($preco) {
        return $preco < 25;
    }
}
?>
