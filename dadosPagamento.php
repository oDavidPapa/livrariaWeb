<?php
    
?>
<form action="./controles/controlerVendas.php">
    <p>Forma de Pagamento:</p>
    Cartão: <input type="radio" name="pagamento" value="cartao"><br>
    Boleto: <input type="radio" name="pagamento" value="boleto">
    <input type="hidden" name="opcao" value="1"><br><br>
    <input type="submit" value="Escolher">
</form>