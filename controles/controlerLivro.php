<?php

require_once '../classes/Livro.php';
require_once '../dao/LivroDAO.php';
require_once '../dao/Conexao.php';

$opcao = (int) $_REQUEST['opcao'];

if ($opcao == 1) {

    $isbn = $_REQUEST['isbn'];
    $titulo = $_REQUEST['titulo'];
    $edicao = $_REQUEST['edicao'];
    $anoPublicacao = $_REQUEST['anoPublicacao'];
    $descricao = $_REQUEST['descricao'];

    $livro = new Livro($isbn, $titulo, $edicao, $anoPublicacao, $descricao);

    $livroDAO = new LivroDAO();
    $livroDAO->incluirLivro($livro);

    header("Location:../controles/controlerLivro.php?opcao=2");
    
} if ($opcao == 2) {

    $livroDAO = new LivroDAO();

    $livros = array();
    $livros = $livroDAO->getLivros();

    session_start();
    $_SESSION['livros'] = $livros;
    
     header("Location:../exibirLivros.php");
     
} if ($opcao == 3) {
    
    
} if ($opcao == 4) {
    $isbn = $_REQUEST['isbn'];
    
    $livroDAO = new LivroDAO();
    $livroDAO->excluirLivro($isbn);
    
    header("Location:../controles/controlerLivro.php?opcao=2");
}
?>