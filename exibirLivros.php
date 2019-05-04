
<?php include_once './cabecalho.php'; ?>


<center>
    <table width = "70%">
        <tr align ="left">
            <th>#</th>
            <th> ISBN </th>
            <th> Título</th>
            <th> Edição </th>
            <th> Ano Public.</th>
            <th> Descrição</th>
        </tr>
<?php

session_start();
$livros = $_SESSION['livros'];
$contador = 0;
foreach ($livros as $livro) {

    $contador += 1;
    $isbn = $livro->isbn;
    $titulo = $livro->titulo;
    $edicao = $livro->edicao_num;
    $anoPublicacao = $livro->ano_publicacao;
    $descricao = $livro->descricao;
    ?>
            <tr>
                <td><?php echo $contador ?></td>
                <td><?php echo $isbn ?></td>
                <td><?php echo $titulo ?></td>
                <td><?php echo $edicao ?></td>
                <td><?php echo $anoPublicacao ?></td>
                <td><?php echo $descricao ?></td>
                <td><?php echo "<a href='controles/controlerLivro.php?opcao=3&isbn=" . $isbn . "'> Alterar </a>&nbsp;";
                          echo "<a href='controles/controlerLivro.php?opcao=4&isbn=" . $isbn . "'> Excluir </a>";
        ?></td>
            </tr>
    <?php
}
?>

    </table>
</center>

</body>
</html>

