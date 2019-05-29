<?php

include_once '../dao/Conexao.php';
include_once '../dao/PublicacaoDAO.php';

$opcao = (int) $_REQUEST['opcao'];


if ($opcao == 2) {
    $publicacaoDAO = new PublicacaoDAO();
    //echo "TESTE";
    $publicacoes = $publicacaoDAO->getPublicacoes();

    session_start();
    $_SESSION['publicacoes'] = $publicacoes;
    header("Location:../exibirPublicacoes.php");

}
?>