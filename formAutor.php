<?php include_once 'cabecalho.php'; ?>
<br>
<br>

<div class="form">
    <center> <strong>Informe os dados do Autor:</strong>
        <br>
        <br>
        <form action = "controles/controlerAutor.php">
            Nome: <input type="text" name = "nome" size = "36"/><br><br>
            E-mail: <input type="text"  name = "email" size = "27"/><br><br>
            Data de Nascimento: <input type="text"  name = "dataNascimento" size = "15"/><br><br>
            <input type="hidden" name ="opcao" value="1">          
             <input type="submit" value=" Cadastrar ">
        </form>
</div>
<br>
<br>

</body>
</html>


