<?php

class Livro {

    private $isbn;
    private $titulo;
    private $edicao;
    private $anoPublicacao;
    private $descricao;

    public function Livro($pIsbn, $pTitulo, $pEdicao, $pAnoPublicacao, $pDescricao) {
        $this->isbn = $pIsbn;
        $this->titulo = $pTitulo;
        $this->edicao = $pEdicao;
        $this->anoPublicacao = $pAnoPublicacao;
        $this->descricao = $pDescricao;
    }

    public function getIsbn() {
        return $this->isbn;
    }

    public function setIsbn($pIsbn) {
        $this->isbn = $pIsbn;
    }

    public function getTitulo() {
        return $this->titulo;
    }

    public function setTitulo($pTitulo) {
        $this->titulo = $pTitulo;
    }

    public function getEdicao() {
        return $this->edicao;
    }

    public function setEdicao($pEdicao) {
        $this->edicao = $pEdicao;
    }

    public function getAnoPublicacao() {
        return $this->anoPublicacao;
    }

    public function setAnoPublicacao($pAnoPublicacao) {
        $this->anoPublicacao = $pAnoPublicacao;
    }

    public function getDescricao() {
        return $this->descricao;
    }

    public function setDescricao($pDescricao) {
        $this->descricao = $pDescricao;
    }

}

?>