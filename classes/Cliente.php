<?php

class Cliente {

    private $cpf;
    private $nome;
    private $logradouro;
    private $cidade;
    private $estado;
    private $cep;
    private $dataNascimento;
    private $email;
    private $senha;
    private $rg;

    public function Cliente($cpf, $nome, $logradouro, $cidade, $estado, $cep, $dataNascimento, $email, $senha, $rg) {
        $this->cpf = $cpf;
        $this->nome = $nome;
        $this->logradouro = $logradouro;
        $this->cidade = $cidade;
        $this->estado = $estado;
        $this->cep = $cep;
        $this->dataNascimento = strtotime($dataNascimento);
        $this->email = $email;
        $this->senha = $senha;
        $this->rg = $rg;
    }
    
    function getCpf() {
        return $this->cpf;
    }

    function getNome() {
        return $this->nome;
    }

    function getLogradouro() {
        return $this->logradouro;
    }

    function getCidade() {
        return $this->cidade;
    }

    function getEstado() {
        return $this->estado;
    }

    function getCep() {
        return $this->cep;
    }

    function getDataNascimento() {
        return $this->dataNascimento;
    }

    function getEmail() {
        return $this->email;
    }

    function getSenha() {
        return $this->senha;
    }

    function getRg() {
        return $this->rg;
    }

    function setCpf($cpf) {
        $this->cpf = $cpf;
    }

    function setNome($nome) {
        $this->nome = $nome;
    }

    function setLogradouro($logradouro) {
        $this->logradouro = $logradouro;
    }

    function setCidade($cidade) {
        $this->cidade = $cidade;
    }

    function setEstado($estado) {
        $this->estado = $estado;
    }

    function setCep($cep) {
        $this->cep = $cep;
    }

    function setDataNascimento($dataNascimento) {
       $this->dataNascimento = strtotime($dataNascimento);
    }

    function setEmail($email) {
        $this->email = $email;
    }

    function setSenha($senha) {
        $this->senha = $senha;
    }

    function setRg($rg) {
        $this->rg = $rg;
    }



}

?>
