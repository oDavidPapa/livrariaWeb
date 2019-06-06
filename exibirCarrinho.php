<?php
include_once './cabecalho.php';
require_once './classes/Publicacao.php';
?>

<html>
    <body>
        <?php
        if (isset($_REQUEST['status']) && $_REQUEST['status'] == 1) {
            echo "<h1 align='center'><font color= 'red'> Carrinho de Compras Vazio! </font></h1> <br>";
            echo "<p align = 'center'><a href='controles/controlerPublicacao.php?opcao=2'><img src='imagens/botao_comprar.png'</a></p>";
        } else {
            ?>
        <center>
            <h1>Carrinho de Compra</h1>
            <table width="800" heigth="800">
                <tr aling="center">
                    <th>Item #</th>
                    <th>Código</th>
                    <th>Título</th>
                    <th>Editora</th>
                    <th>Valor</th>
                    <th>Remover</th>
                </tr>

                <?php
                session_start();
                $carrinho = $_SESSION['carrinho'];
                $cont = 1;
                $valorTotal = 0;
                foreach ($carrinho as $publicacao) {
                    ?>
                    <tr align='center'>
                        <td><?php echo $cont ?></td>
                        <td><?php echo $publicacao->getIdPublicacao(); ?></td>
                        <td><?php echo $publicacao->getTitulo(); ?></td>
                        <td><?php echo $publicacao->getEditora(); ?></td>
                        <td><?php echo $publicacao->getPreco(); ?></td>
                        <td><a href="controles/controlerCarrinho.php?opcao=2&index=<?php echo $cont - 1 ?>"><img src="imagens/rem3.jpg"</td></a></tr>

                    <?php
                    $valorTotal += $publicacao->getPreco();
                    $cont ++;
                }
                echo" <br>
            <tr align='right'>
                <td colspan='6'><font color='red'><h3>Valor Total: $valorTotal </td></h3>
            </tr>";

                echo "</table>";
                
               echo "<br>";
            echo "<a href='controles/controlerCarrinho.php?opcao=4&total=".$valorTotal."'><img src='imagens/finalizarCompra.png'</a> <a href='controles/controlerPublicacao.php?opcao=2'><img src='imagens/botao_continuar_comprando.png'</a>";
            }
            ?>

            
    </center>
</body>
</html>
