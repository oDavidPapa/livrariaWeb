<?php
header('Content-Type: text/html; charset=ISO-8859-1');

function formatarData($data) {
    return date('d/m/Y', $data);
}

session_start();
$autor = $_SESSION['autor'];
$nome = $autor->nome;
$email = $autor->email;
$dataNascimento = formatarData(strtotime($autor->dt_nasc));
$id = $autor->autor_id;

include_once './cabecalho.php';
?>
<div class="borda">
    <center> <strong>Informe os dados do Autor:</strong>
        <br>
        <br>
        <form action = "controles/controlerAutor.php">
            Nome: <input type="text" name = "nome" value="<?php echo $nome ?>" size = "36"/><br><br>
            E-mail: <input type="text"  name = "email" value="<?php echo $email ?>"size = "27"/><br><br>
            Data de Nascimento: <input type="text"  name = "dataNascimento" value="<?php echo $dataNascimento ?>" size = "15"/><br><br>
            <input type="hidden" name ="opcao" value="5">     
            <input type="hidden" name ="id" value="<?php echo $id ?>">      
            <center> <button>Cadastrar</button></center>
        </form>
</div>


</body>
</html>

