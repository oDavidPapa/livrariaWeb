
<?php include_once 'cabecalho.php'; ?>

<?php

function formatarData($data) {
    return date('d/m/Y', $data);
}

session_start();
$cliente = $_SESSION['cliente'];

$cpf = $cliente->cpf;
$nome = $cliente->nome;
$logradouro = $cliente->logradouro;
$cidade = $cliente->cidade;
$estado = $cliente->estado;
$email = $cliente->email;
$rg = $cliente->rg;
$dataNascimento = formatarData(strtotime($cliente->data_nascimento));
$senha = $cliente->senha;
$cep = $cliente->cep;
?>
<div class="form">
    <center> <strong>Informe os dados do Cliente:</strong>
        <br>
        <br>
        <form action = "controles/controlerCliente.php">
            CPF: <input type="text" name = "cpf" value="<?php echo $cpf ?>" size = "37"/><br><br>
            Nome: <input type="text"  name = "nome" value="<?php echo $nome ?>" size = "36"/><br><br>
            Logradouro: <input type="text"  name = "logradouro" value="<?php echo $logradouro ?>" size = "31"/><br><br>
            Cidade: <input type="text"  name = "cidade" value="<?php echo $cidade ?>" size = "16"/>
            | Estado: <input type="text"  name = "estado" value="<?php echo $estado ?>" size = "6"/><br><br>
            CEP: <input type="text"  name = "cep" value="<?php echo $cep ?>" size = "38"/><br><br>
            Data de Nasc.: <input type="text"  name = "dataNascimento" value="<?php echo $dataNascimento ?>" size = "9"/>
            | RG: <input type="text"  name = "rg" value="<?php echo $rg ?>" size = "10"/><br><br>
            E-mail: <input type="text"  name = "email" value="<?php echo $email ?>" size = "34"/><br><br>
            Senha: <input type="password"  name = "senha" value="<?php echo $senha ?>" size = "34"/><br><br>
            <input type="hidden" name ="opcao" value="5">          
            <center> <button>Cadastrar</button></center>
        </form>
</div>


</body>
</html>
