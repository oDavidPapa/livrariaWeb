<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Page Title</title>
        <link rel="stylesheet" type="text/css" media="screen" href="css/estilo2.css">
    </head>
    <body>

        <div class="borda">
            <center> <strong>Informe os dados do Livro:</strong>
                <br>
                <br>
                <form action = "controles/controlerLivro.php">
                    ISBN: <input type="text" name = "isbn" size = "36"/><br><br>
                    Título: <input type="text"  name = "titulo" size = "36"/><br><br>
                    Edição: <input type="text"  name = "edicao" size = "6"/>
                    | Ano Publicação: <input type="text"  name = "anoPublicacao" size = "7"/><br><br>
                    Descrição: <input type="text"  name = "descricao" size = "32"/><br><br>
                    <input type="hidden" name ="opcao" value="1">          
                    <center> <button>Cadastrar</button></center>
                </form>
        </div>


    </body>
</html>

