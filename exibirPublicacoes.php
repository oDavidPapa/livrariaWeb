<?php
include_once './cabecalho.php';
require_once './classes/Publicacao.php';
session_start();


$publicacoes = $_SESSION['publicacoes'];

echo "<div align='right'> <a href='controles/controlerCarrinho.php?opcao=3'><img src='imagens/meu-carrinho.png'></a></div>";


foreach ($publicacoes as $publicacao) {
    ?>  
    <table border='0' widh='50%' cellspacing='5'>
        <tr>
            <td rowspan="5" align="center">
                <img src="imagens/book_<?php echo $publicacao->getIsbn(); ?>.jpg" width="200" height="200" border="0">
            </td>
        </tr>
        <tr aling="left">
            <td><?php echo $publicacao->getTitulo() ?></td>
        </tr>
        <tr>
            <td><?php echo $publicacao->getAutor() ?></td>
        </tr>
        <tr>
            <td><?php echo $publicacao->getEditora() ?></td>
        </tr>
        <tr>
            <td><?php echo $publicacao->getPreco() ?></td>
        </tr>
        <tr>
            <td><?php echo "<a href='./controles/controlerCarrinho.php?opcao=1&id=".$publicacao->getIdPublicacao()."'><img src='imagens/botao_comprar2.png'></a></td>";?>
        </tr>
        

    </table>

    <?php
}

?>