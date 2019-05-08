<?php

include_once '../dao/Conexao.php';
include_once '../dao/PublicacaoDAO.php';

$opcao = $_REQUEST['opcao'];


if ($opcao == 2) {
    $publicacaoDAO = new PublicacaoDAO();

    $lista = $publicacaoDAO->getPublicacoes();

    session_start();
    $_SESSION['publicacoes'] = $lista;
    header("Location:../exibirPublicacoes.php");

}