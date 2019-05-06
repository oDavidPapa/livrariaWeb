
<?php include_once 'cabecalho.php'; ?>
<br>
<br>
<div class="form">
    <center> <strong>Informe os dados do Livro:</strong>

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
<br>
<br>

</body>
</html>


