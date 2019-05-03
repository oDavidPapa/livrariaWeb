<?php
    
    require_once '../classes/Autor.php';
    require_once 'Conexao.php';

    class AutorDAO{
        private $con;

        public function AutorDAO(){

            $conexao = new Conexao();
            $this->con = $conexao->getConexao();
        }

        public function incluirAutor(Autor $pAutor){
            $sql = $this->con->prepare("insert into autores (nome, email, dt_nasc) values (:pNome, :pEmail, :pDataNascimento)");

            $sql->bindValue(':pNome', $pAutor->getNome());
            $sql->bindValue(':pEmail', $pAutor->getEmail());
            $sql->bindValue(':pDataNascimento', $this->converterDataMysql($pAutor->getDataNascimento()));

            $sql->execute();
            

        }

        function converterDataMysql($data){
            return date('Y-m-d', $data);
        }

        
        public function getAutores(){
            $autores = array();
            $rs = $this->con->query("SELECT * FROM autores");
            
            while($autor = $rs->fetch(PDO::FETCH_OBJ)){
                $autores[] = $autor;
               
            }
            return $autores;
        }

        public function excluirAutor($idAutor){
            $sql = $this->con->prepare("delete from autores where autor_id = :id");

            $sql->bindValue(':id', $idAutor);
            $sql->execute();
        }

        public function getAutor($idAutor){
            $sql = $this->con->prepare("Select * from autores where autor_id = :id");

            $sql->bindValue(':id', $idAutor);
            $sql->execute();
            
            return $sql->fetch(PDO::FETCH_OBJ);

        }

        public function atualizarAutor(Autor $autor){
            $sql = $this->con->prepare("update autores set nome= :nome, email= :email, dt_nasc= :dataNascimento where autor_id = :id");

            $sql->bindValue(':nome', $autor->getNome());
            $sql->bindValue(':email', $autor->getEmail());
            $sql->bindValue(':dataNascimento', $this->converterDataMysql($autor->getDataNascimento()));
            $sql->bindValue(':id', $autor->getId());
            $sql->execute();
        }

    }
?>