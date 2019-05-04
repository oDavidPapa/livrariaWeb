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

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Page Title</title>
        <link rel="stylesheet" type="text/css" media="screen" href="css/estilo.css">
    </head>
    <body>

        <div class="borda">
            <center> <strong>Informe os dados do Autor:</strong>
                <br>
                <br>
                <form action = "controles/controlerLivro.php">
                    ISBN: <input type="text" name = "isbn" value="<?php echo $isbn ?>" size = "36"/><br><br>
                    Título: <input type="text"  name = "titulo" value="<?php echo $titulo ?>" size = "36"/><br><br>
                    Edição: <input type="text"  name = "edicao" value="<?php echo $edicao ?>" size = "6"/>
                    | Ano Publicação: <input type="text"  name = "anoPublicacao" value="<?php echo $anoPublicacao ?>" size = "7"/><br><br>
                    Descrição: <input type="text"  name = "descricao" value="<?php echo $descricao ?>" size = "32"/><br><br>
                    <input type="hidden" name ="opcao" value="5">
                    <center> <button>Cadastrar</button></center>
                </form>

        </div>


    </body>
</html>

