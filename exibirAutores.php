<?php

// header('Content-Type: text/html; charset=ISO-8859-1');

function formatarData($data) {
    return date('d/m/Y', $data);
}

session_start();
//$autores = array();

$autores = $_SESSION['autores'];
//var_dump($autores);
include_once 'cabecalho.php';
?>
<center>
    <table width = "70%">
        <tr align ="left">
            <th>#</th>
            <th> Nome </th>
            <th> E-mail </th>
            <th> Data Nasc.</th>
            <th> Operação</th>
        </tr>
        <?php
        $contador = 0;

        foreach ($autores as $autor) {

            $contador += 1;
            $id = $autor->autor_id;
            $nome = $autor->nome;
            $email = $autor->email;
            $dataNascimento = formatarData(strtotime($autor->dt_nasc));
            ?>
            <tr>
                <td><?php echo $contador ?></td>
                <td><?php echo $nome ?></td>
                <td><?php echo $email ?></td>
                <td><?php echo $dataNascimento ?></td>
                <td><?php
                    echo "<a href='controles/controlerAutor.php?opcao=3&id=" . $id . "'> Alterar </a>&nbsp;";
                    echo "<a href='controles/controlerAutor.php?opcao=4&id=" . $id . "'> Excluir </a>";
                    ?></td>
            </tr>
            <?php
        }
        ?>

    </table>
</center>

</body>
</html>