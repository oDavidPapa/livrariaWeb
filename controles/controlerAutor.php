<?php

require_once '../classes/Autor.php';
require_once '../dao/AutorDAO.php';
require_once '../dao/Conexao.php';


// if(isset($_REQUEST['opcao']) && isset($_REQUEST['nome']) && isset($_REQUEST['email']) && isset($_REQUEST['dataNascimento'])){

$opcao = (int) $_REQUEST['opcao'];


if ($opcao == 1) {

    $nome = $_REQUEST['nome'];
    $email = $_REQUEST['email'];
    $dataNascimento = $_REQUEST['dataNascimento'];

    $autor = new Autor($nome, $email, $dataNascimento);
    $autorDAO = new AutorDAO();

    $autorDAO->incluirAutor($autor);

    header("Location:../controles/controlerAutor.php?opcao=2");
}if ($opcao == 2) {

    $autorDAO = new AutorDAO();

    $autores = array();
    $autores = $autorDAO->getAutores();

    session_start();
    $_SESSION['autores'] = $autores;

    header("Location:../exibirAutores.php");
}if ($opcao == 3) {

    $id = $_REQUEST["id"];
    $autorDAO = new AutorDAO();

    $autor = $autorDAO->getAutor($id);
    session_start();
    $_SESSION['autor'] = $autor;

    header("Location:../formAutorAtualizar.php");
} if ($opcao == 4) {

    $id = $_REQUEST["id"];
    $autorDAO = new AutorDAO();
    $autorDAO->excluirAutor($id);

    header("Location:../controles/controlerAutor.php?opcao=2");
} if ($opcao == 5) {

    $nome = $_REQUEST['nome'];
    $email = $_REQUEST['email'];
    $dataNascimento = $_REQUEST['dataNascimento'];
    $id = $_REQUEST['id'];

    $autor = new Autor($nome, $email, $dataNascimento);
    $autor->setId($id); // PRECISA DISSO PARA O MÉTODO ATUALIZAR AUTOR SABER QUAL o $ID A SER TROCADO!  

    $autorDAO = new AutorDAO();
    $autorDAO->atualizarAutor($autor);

    header("Location:../controles/controlerAutor.php?opcao=2");
} if ($opcao == 6) {
    $pagina = $_REQUEST['pagina'];
    $autorDAO = new AutorDAO();
    $lista = $autorDAO->getAutoresPaginacao($pagina);
    $numeroPaginas = $autorDAO->getPagina();

    session_start();

    $_SESSION['autores'] = $lista;
    header("Location:../exibirAutoresPaginacao.php?paginas=".$numeroPaginas);
    
} if ($opcao == 7) {
    header("Location:../controles/controlerAutor.php?opcao=6&pagina=2");
}
?>