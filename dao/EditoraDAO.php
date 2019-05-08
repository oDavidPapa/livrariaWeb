<?php

require_once 'Conexao.php';

class EditoraDAO {

    private $con;

    public function EditoraDAO() {

        $conexao = new Conexao();
        $this->con = $conexao->getConexao();
    }

    public function getEditoras() {
        $editoras = array();
        $rs = $this->con->query("SELECT * FROM editora");

        while ($editora = $rs->fetch(PDO::FETCH_OBJ)) {
            $editoras[] = $editora;
        }

        return $editoras;
    }

}

?>
