<?php

require_once '../classes/Livro.php';
require_once 'Conexao.php';

class LivroDAO {

    private $con;

    public function LivroDAO() {

        $conexao = new Conexao();
        $this->con = $conexao->getConexao();
    }

    public function incluirLivro(Livro $livro) {
        $sql = $this->con->prepare("insert into livros (isbn, titulo, edicao_num, ano_publicacao, descricao) values (:isbn, :titulo, :edicao, :anoPublicacao, :descricao)");

        $sql->bindValue(':isbn', $livro->getIsbn());
        $sql->bindValue(':titulo', $livro->getTitulo());
        $sql->bindValue(':edicao', $livro->getEdicao());
        $sql->bindValue(':anoPublicacao', $livro->getAnoPublicacao());
        $sql->bindValue(':descricao', $livro->getDescricao());

        $sql->execute();
    }

    public function getLivros() {
        $livros = array();
        $rs = $this->con->query("SELECT * FROM livros");

        while ($livro = $rs->fetch(PDO::FETCH_OBJ)) {
            $livros[] = $livro;
        }

        return $livros;
    }

    public function excluirLivro($isbn) {
        $sql = $this->con->prepare("delete from livros where isbn = :isbn");

        $sql->bindValue(':isbn', $isbn);
        $sql->execute();
    }

    public function getLivro($isbn) {
        $sql = $this->con->prepare("SELECT * FROM livros WHERE isbn = :isbn");
        $sql->bindValue('isbn', $isbn);

        $sql->execute();

        return $sql->fetch(PDO::FETCH_OBJ);
    }

    public function atualizarLivro(Livro $livro) {
        $sql = $this->con->prepare("UPDATE livros SET "
                . "isbn = :isbn, "
                . "titulo = :titulo, "
                . "edicao_num = :edicao, "
                . "ano_publicacao = :anoPublicacao, "
                . "descricao = :descricao "
                . "WHERE isbn = :isbn");
        
        
        $sql->bindValue(':isbn', $livro->getIsbn());
        $sql->bindValue(':titulo', $livro->getTitulo());
        $sql->bindValue(':edicao', $livro->getEdicao());
        $sql->bindValue(':anoPublicacao', $livro->getAnoPublicacao());
        $sql->bindValue(':descricao', $livro->getDescricao());
        $sql->execute();
    }

}

?>