<?php

// header('Content-Type: text/html; charset=ISO-8859-1');

function formatarData($data) {
    return date('d/m/Y', $data);
}

session_start();

$clientes = $_SESSION['clientes'];
include_once 'cabecalho.php';
?>
<center>
    <table width = "70%" padding-top="30%">
        <tr align ="left">
            <th>#</th>
            <th> CPF </th>
            <th> Nome </th>
            <th> Logradouro.</th>
            <th> Cidade</th>
            <th> Estado</th>
            <th> Data Nasc.</th>
            <th> E-mail</th>
            <th> RG</th>
        </tr>
        <?php
        $contador = 0;

        foreach ($clientes as $cliente) {

            $contador += 1;
            $cpf = $cliente->cpf;
            $nome = $cliente->nome;
            $logradouro = $cliente->logradouro;
            $cidade = $cliente->cidade;
            $estado = $cliente->estado;
            $email = $cliente->email;
            $rg = $cliente->rg;
            $dataNascimento = formatarData(strtotime($cliente->data_nascimento));
            ?>
            <tr>
                <td><?php echo $contador ?></td>
                <td><?php echo $cpf ?></td>
                <td><?php echo $nome ?></td>
                <td><?php echo $logradouro ?></td>
                <td><?php echo $cidade ?></td>
                <td><?php echo $estado ?></td>
                <td><?php echo $dataNascimento ?></td>
                <td><?php echo $email ?></td>
                <td><?php echo $rg ?></td>
                <td><?php
                    echo "<a href='controles/controlerCliente.php?opcao=3&cpf=" . $cpf . "'> Alterar </a>&nbsp;";
                    echo "<a href='controles/controlerCliente.php?opcao=4&cpf=" . $cpf . "'> Excluir </a>";
                    ?></td>
            </tr>
            <?php
        }
        ?>

    </table>
</center>

</body>
</html>