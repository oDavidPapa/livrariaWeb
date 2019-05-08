<?php

class Publicacao {

    private $idPublicacao;
    private $isbn;
    private $titulo;
    private $autor;
    private $editora;
    private $preco;

    function Publicacao() {
        
    }

    function getIdPublicacao() {
        return $this->idPublicacao;
    }

    function getIsbn() {
        return $this->isbn;
    }

    function getTitulo() {
        return $this->titulo;
    }

    function getAutor() {
        return $this->autor;
    }

    function getEditora() {
        return $this->editora;
    }

    function getPreco() {
        return $this->preco;
    }

    function setIdPublicacao($idPublicacao) {
        $this->idPublicacao = $idPublicacao;
    }

    function setIsbn($isbn) {
        $this->isbn = $isbn;
    }

    function setTitulo($titulo) {
        $this->titulo = $titulo;
    }

    function setAutor($autor) {
        $this->autor = $autor;
    }

    function setEditora($editora) {
        $this->editora = $editora;
    }

    function setPreco($preco) {
        $this->preco = $preco;
    }

}
?>

