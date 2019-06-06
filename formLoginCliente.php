<?php

if (isset($_REQUEST['status']) && $_REQUEST['status'] == 1) {
    echo  "<p align = 'center'> Email ou Senha Incorretos!</p>";
    ?>
    <center>
        <br>
        <form action="controles/controlerCliente.php">
            E-mail: <input type="text" name="email"><br><br>
            Senha: <input type="password" name="senha"><br>
            <input type="hidden" value="6" name="opcao"><br>
            <input type="submit" value="Entrar">
        </form>
    </center>
    <?php

} else {
    ?> 
    <center>
        <br>
        <form action="controles/controlerCliente.php">
            E-mail: <input type="text" name="email"><br><br>
            Senha: <input type="password" name="senha"><br>
            <input type="hidden" value="6" name="opcao"><br>
            <input type="submit" value="Entrar">
        </form>
    </center>
    <?php

}
?>

