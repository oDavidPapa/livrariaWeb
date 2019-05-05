<?php

include_once '../dao/Conexao.php';
include_once '../classes/Cliente.php';
include_once '../dao/ClienteDAO.php';

$opcao = $_REQUEST['opcao'];

if ($opcao == 1) {

    $cpf = $_REQUEST['cpf'];
    $nome = $_REQUEST['nome'];
    $logradouro = $_REQUEST['logradouro'];
    $cidade = $_REQUEST['cidade'];
    $estado = $_REQUEST['estado'];
    $cep = $_REQUEST['cep'];
    $dataNascimento = $_REQUEST['dataNascimento'];
    $email = $_REQUEST['email'];
    $senha = $_REQUEST['senha'];
    $rg = $_REQUEST['rg'];

    $cliente = new Cliente($cpf, $nome, $logradouro, $cidade, $estado, $cep, $dataNascimento, $email, $senha, $rg);
    $clienteDAO = new ClienteDAO();
    $clienteDAO->incluirCliente($cliente);

    header("Location:../controles/controlerCliente.php?opcao=2");
}if ($opcao == 2) {
    $clienteDAO = new ClienteDAO();

    $clientes = array();
    $clientes = $clienteDAO->getClientes();

    session_start();
    $_SESSION['clientes'] = $clientes;
    header("Location:../exibirClientes.php");
}if ($opcao == 3) {
    
    $cpf = $_REQUEST["cpf"];
    
    $clienteDAO = new ClienteDAO();

    $cliente = $clienteDAO->getCliente($cpf);
    session_start();
   
    $_SESSION['cliente'] = $cliente;

    header("Location:../formClienteAtualizar.php");
}
?>
