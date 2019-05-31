<?php

include_once '../dao/PublicacaoDAO.php';
include_once '../classes/Publicacao.php';

$opcao = $_REQUEST['opcao'];



if ($opcao == 1) {
    $publicacaoDAO = new PublicacaoDAO();
    $idPublicacao = $_REQUEST['id'];


    $publicacao = $publicacaoDAO->getPublicacao($idPublicacao);

    session_start();

    if (!isset($_SESSION['carrinho'])) {
        $carrinho = array();
    } else {

        $carrinho = $_SESSION['carrinho'];
    }

    $carrinho[] = $publicacao;
    $_SESSION['carrinho'] = $carrinho;
    header("Location:../exibirCarrinho.php");
}
if ($opcao == 2) {
    session_start();
    $indice = $_REQUEST['index'];
    $carrinho = $_SESSION['carrinho'];

    unset($carrinho[$indice]);
    sort($carrinho);

    $_SESSION['carrinho'] = $carrinho;
    header("Location:controlerCarrinho.php?opcao=3");
}
if ($opcao == 3) {
    session_start();

    if (!isset($_SESSION['carrinho']) || sizeof($_SESSION['carrinho']) == 0) {
        header("Location:../exibirCarrinho.php?status=1");
    } else {
        header("Location:../exibirCarrinho.php");
    }
}
?>
