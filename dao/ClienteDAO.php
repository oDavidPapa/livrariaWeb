<?php

require_once '../classes/Cliente.php';
require_once 'Conexao.php';

class ClienteDAO {

    private $con;

    public function ClienteDAO() {
        $conexao = new Conexao();
        $this->con = $conexao->getConexao();
    }

    function converterDataMysql($data) {
        return date('Y-m-d', $data);
    }

    public function incluirCliente(Cliente $cliente) {
        $sql = $this->con->prepare("INSERT INTO clientes "
                . "(cpf, nome, logradouro, cidade, estado, cep, data_nascimento, email, senha, rg) "
                . "VALUES "
                . "(:cpf, :nome, :logradouro, :cidade, :estado, :cep, :data_nascimento, :email, :senha, :rg)");

        $sql->bindValue(':cpf', $cliente->getCpf());
        $sql->bindValue(':nome', $cliente->getNome());
        $sql->bindValue(':logradouro', $cliente->getLogradouro());
        $sql->bindValue(':cidade', $cliente->getCidade());
        $sql->bindValue(':estado', $cliente->getEstado());
        $sql->bindValue(':cep', $cliente->getCep());
        $sql->bindValue(':data_nascimento', $this->converterDataMysql($cliente->getDataNascimento()));
        $sql->bindValue(':email', $cliente->getEmail());
        $sql->bindValue(':senha', $cliente->getSenha());
        $sql->bindValue(':rg', $cliente->getRg());

        $sql->execute();
    }

    public function getClientes() {
        $clientes = array();
        $rs = $this->con->query("SELECT * FROM clientes");

        while ($cliente = $rs->fetch(PDO::FETCH_OBJ)) {
            $clientes[] = $cliente;
        }
        return $clientes;
    }

    public function excluirCliente($cpf) {
        $sql = $this->con->prepare("DELETE FROM clientes WHERE cpf = :cpf");
        $sql->bindValue(':cpf', $cpf);

        $sql->execute();
    }

    public function getCliente($cpf) {
        $sql = $this->con->prepare("SELECT * FROM clientes WHERE cpf = :cpf");
        $sql->bindValue(':cpf', $cpf);

        $sql->execute();
        return $sql->fetch(PDO::FETCH_OBJ);
    }

    public function atualizarCliente(Cliente $cliente) {

        $sql = $this->con->prepare("UPDATE clientes SET "
                . "cpf = :cpf, "
                . "nome = :nome, "
                . "logradouro = :logradouro, "
                . "cidade = :cidade, "
                . "estado = :estado, "
                . "cep = :cep, "
                . "data_nascimento = :data_nascimento, "
                . "email = :email, "
                . "senha = :senha, "
                . "rg = :rg");

        $sql->bindValue(':cpf', $cliente->getCpf());
        $sql->bindValue(':nome', $cliente->getNome());
        $sql->bindValue(':logradouro', $cliente->getLogradouro());
        $sql->bindValue(':cidade', $cliente->getCidade());
        $sql->bindValue(':estado', $cliente->getEstado());
        $sql->bindValue(':cep', $cliente->getCep());
        $sql->bindValue(':data_nascimento', $this->converterDataMysql($cliente->getDataNascimento()));
        $sql->bindValue(':email', $cliente->getEmail());
        $sql->bindValue(':senha', $cliente->getSenha());
        $sql->bindValue(':rg', $cliente->getRg());
       // var_dump($sql);
        $sql->execute();
    }

}

?>