<?php
include_once '../classes/Venda.php';
include_once '../dao/VendaDAO.php';

$opcao = $_REQUEST['opcao'];


if ($opcao == 1) {
    session_start();
    
    $cliente = $_SESSION['clienteLogado'];
    $total = $_SESSION['total'];
    $carrinho = $_SESSION['carrinho'];
    
    $venda = new Venda($cliente->cpf, $total);
    
    $vendaDAO = new VendaDAO();
    $vendaDAO->incluirVenda($venda, $carrinho);
    
    $pagamento = $_REQUEST['pagamento'];
    if($pagamento == 'boleto'){
        header("Location: ../boleto/meuBoleto.php");
    } else {
        echo 'AINDA NAO OFERECEMOS PAGAMENTO EM CARTÃO, MALS AE';
    }
}
?>

