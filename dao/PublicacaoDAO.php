<?php

require_once '../classes/Publicacao.php';
require_once 'Conexao.php';

class PublicacaoDAO {

    private $con;

    public function PublicacaDAO() {

        $conexao = new Conexao();
        $this->con = $conexao->getConexao();
    }

    private function getEditora($idEditora) {

        $sql = $this->con->prepare("SELECT editora_nome FROM editora WHERE editora_id = :idEditora");
        $sql->bindValue(':idEditora', $idEditora);

        $sql->execute();

        $editora = $sql->fetch(PDO::FETCH_OBJ);
        return $editora->editora_nome;
    }

    private function getAutor($idAutor) {

        $sql = $this->con->prepare("SELECT nome FROM autores WHERE autor_id = :idAutor");
        $sql->bindValue(':idAutor', $idAutor);

        $sql->execute();

        $autor = $sql->fetch(PDO::FETCH_OBJ);
        return $autor->nome;
    }

    public function getTitulo($isbn) {
        $sql = $this->con->prepare("SELECT titulo FROM livros WHERE isbn = :isbn");
        $sql->bindValue('isbn', $isbn);

        $sql->execute();
        $livro = $sql->fetch(PDO::FETCH_OBJ);
        return $livro->titulo;
    }

    public function getPublicacoes() {
        $rs = $this->con->query("SELECT * FROM publicacao");

        $publicacoes = array();
        while ($row = $rs->fetch(PDO::FETCH_OBJ)) {

            $publicacao = new Publicacao();
            $publicacao->setIdPublicacao($row->publicacao_id);
            $publicacao->setIsbn($row->isbn);
            $publicacao->setTitulo($this->getTitulo($row->isbn));
            $publicacao->setAutor($this->getAutor($row->autor_id));
            $publicacao->setEditora($this->getEditora($row->ediotra_id));
            $publicacao->setPreco($row->preco);
            $publicacoes[] = $publicacao;
        }

        return $publicacoes;
    }

    public function getPublicacao($idPublicacao) {

        $sql = $this->con->prepare("SELECT * FROM publicacao WHERE publicacao_id = :idPublicacao");

        $sql->bindValue(':idPublicacao', $idPublicacao);
        $sql->execute();

        $row = $sql->fetch(PDO::FETCH_OBJ);

        $publicacao = new Publicacao();
        $publicacao->setIdPublicacao($row->publicacao_id);
        $publicacao->setIsbn($row->isbn);
        $publicacao->setTitulo($this->getTitulo($row->isbn));
        $publicacao->setAutor($this->getAutor($row->autor_id));
        $publicacao->setEditora($this->getEditora($row->ediotra_id));
        $publicacao->setPreco($row->preco);

        return $publicacao;
    }

}

?>
