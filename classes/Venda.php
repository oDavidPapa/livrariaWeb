<?php

class Venda {

    private $idVenda;
    private $cpf;
    private $valorTotal;
    private $data;

    function Venda($cpf, $valorTotal) {
        $this->cpf = $cpf;
        $this->valorTotal = $valorTotal;
        $this->data = time();
    }

    function getIdVenda() {
        return $this->idVenda;
    }

    function getCpf() {
        return $this->cpf;
    }

    function getValorTotal() {
        return $this->valorTotal;
    }

    function getData() {
        return $this->data;
    }

    function setIdVenda($idVenda) {
        $this->idVenda = $idVenda;
    }

    function setCpf($cpf) {
        $this->cpf = $cpf;
    }

    function setValorTotal($valorTotal) {
        $this->valorTotal = $valorTotal;
    }

    function setData($data) {
        $this->data = $data;
    }

}

?>
