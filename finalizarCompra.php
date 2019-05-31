<?php
   $valorTotal = $_REQUEST['total'];
    echo "VALOR DO PRODUTO: $valorTotal";
   
?>

<form action="boleto/meuBoleto.php">
    Nome : <input type="text" name="nome"><br>
    CPF: <input type="text" name="cpf"><br>
    Endereço: <input type="text" name="endereco"><br>
    Cidade: <input type="text" name="cidade"><br>
    Estado: <input type="text" name="estado"><br>
    CEP: <input type="text" name="cep"><br>
    <input type="hidden" name="valorTotal" value="<?php $valorTotal ?>">
    <input type="submit" value="GERAR">
    
</form>