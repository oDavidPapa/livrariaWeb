<?php include_once 'cabecalho.php'; ?>

<?php
//header('Content-Type: text/html; charset=ISO-8859-1');

session_start();
$livro = $_SESSION['livro'];
$isbn = $livro->isbn;
$titulo = $livro->titulo;
$edicao = $livro->edicao_num;
$anoPublicacao = $livro->ano_publicacao;
$descricao = $livro->descricao;


?>



<div class="borda">
    <center> <strong>Informações do Livro:</strong>
        <br>
        <br>
        <form action = "controles/controlerLivro.php">
            ISBN: <input type="text" name = "isbn" value="<?php echo $isbn ?>" size = "36"/><br><br>
            Título: <input type="text"  name = "titulo" value="<?php echo $titulo ?>" size = "36"/><br><br>
            Edição: <input type="text"  name = "edicao" value="<?php echo $edicao ?>" size = "6"/>
            | Ano Publicação: <input type="text"  name = "anoPublicacao" value="<?php echo $anoPublicacao ?>" size = "7"/><br><br>
            Descrição: <input type="text"  name = "descricao" value="<?php echo $descricao ?>" size = "32"/><br><br>
            Alterar: <input type="radio" name="opcao" value="5"> | Excluir: <input type="radio" name="opcao" value="4"<br><br>
           <br>
            <center> <button>Executar</button></center>
        </form>

</div>


</body>
</html>

