
<?php include_once 'cabecalho.php'; ?>
<br>
<br>
<div class="form">

    <center> <strong>Informe os dados do Cliente:</strong>
        <br>
        <br>
        <form action = "controles/controlerCliente.php">
            CPF: <input type="text" name = "cpf" size = "37"/><br><br>
            Nome: <input type="text"  name = "nome" size = "36"/><br><br>
            Logradouro: <input type="text"  name = "logradouro" size = "31"/><br><br>
            Cidade: <input type="text"  name = "cidade" size = "16"/>
            | Estado: <input type="text"  name = "estado" size = "6"/><br><br>
            CEP: <input type="text"  name = "cep" size = "38"/><br><br>
            Data de Nasc.: <input type="text"  name = "dataNascimento" size = "9"/>
            | RG: <input type="text"  name = "rg" size = "10"/><br><br>
            E-mail: <input type="text"  name = "email" size = "34"/><br><br>
            Senha: <input type="password"  name = "senha" size = "34"/><br><br>

            <input type="hidden" name ="opcao" value="1">          
             <input type="submit" value=" Cadastrar ">
        </form>
</div>
<br>
<br>


</body>
</html>
