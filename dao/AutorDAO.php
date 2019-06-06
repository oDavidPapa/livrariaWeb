<?php

require_once '../classes/Autor.php';
require_once 'Conexao.php';

class AutorDAO {

    private $con;
    public $paginas;

    public function AutorDAO() {

        $conexao = new Conexao();
        $this->con = $conexao->getConexao();
        $this->paginas = 10;
    }

    public function getAutoresPaginacao($pagina) {
        $init = ($pagina - 1) * $this->paginas;

        $result = $this->con->query("SELECT * FROM autores limit $init, $this->paginas");
        
        $lista = array();
        var_dump($result);
        while ($row = $result->fetch(PDO::FETCH_OBJ)) {
            $lista[] = $row;
        }
        return $lista;
    }

    public function incluirAutor(Autor $pAutor) {
        $sql = $this->con->prepare("insert into autores (nome, email, dt_nasc) values (:pNome, :pEmail, :pDataNascimento)");

        $sql->bindValue(':pNome', $pAutor->getNome());
        $sql->bindValue(':pEmail', $pAutor->getEmail());
        $sql->bindValue(':pDataNascimento', $this->converterDataMysql($pAutor->getDataNascimento()));

        $sql->execute();
    }

    public function getPagina() {
        $resultTotal = $this->con->query("SELECT COUNT(*) as total FROM autores")->fetch(PDO::FETCH_OBJ);
        $numeroPaginas = ceil($resultTotal->total / $this->paginas);
        
        return $numeroPaginas;
    }

    function converterDataMysql($data) {
        return date('Y-m-d', $data);
    }

    public function getAutores() {
        $autores = array();
        $rs = $this->con->query("SELECT * FROM autores");

        while ($autor = $rs->fetch(PDO::FETCH_OBJ)) {
            $autores[] = $autor;
        }
        return $autores;
    }

    public function excluirAutor($idAutor) {
        $sql = $this->con->prepare("delete from autores where autor_id = :id");

        $sql->bindValue(':id', $idAutor);
        $sql->execute();
    }

    public function getAutor($idAutor) {
        $sql = $this->con->prepare("Select * from autores where autor_id = :id");

        $sql->bindValue(':id', $idAutor);
        $sql->execute();

        return $sql->fetch(PDO::FETCH_OBJ);
    }

    public function atualizarAutor(Autor $autor) {
        $sql = $this->con->prepare("update autores set nome= :nome, email= :email, dt_nasc= :dataNascimento where autor_id = :id");

        $sql->bindValue(':nome', $autor->getNome());
        $sql->bindValue(':email', $autor->getEmail());
        $sql->bindValue(':dataNascimento', $this->converterDataMysql($autor->getDataNascimento()));
        $sql->bindValue(':id', $autor->getId());
        $sql->execute();
    }
    
    public function incluirVariosAutores(){
        for($i = 1; $i <=100; $i++){
            $sql = $this->con->prepare("INSERT INTO autores (nome, email, dt_nasc) VALUES (:nome, :email, :data)");
            
            $sql->bindValue(':nome' , 'fulano'.$i);
            $sql->bindValue(':email', 'fulano'.$i.'@gmail.com');
            $sql->bindValue('data', '2010-12-31');
            
            $sql->execute();
        }
    }

}

?>