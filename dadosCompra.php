<?php
require_once './classes/Publicacao.php';

session_start();
$cliente = $_SESSION['clienteLogado'];
$valorTotal = $_SESSION['total'];
$carrinho = $_SESSION['carrinho'];
$endereco = "$cliente->logradouro, $cliente->cep " . $cliente->cidade . " - " . $cliente->estado;

echo "Nome: $cliente->nome <br>CPF: $cliente->cpf <br> $endereco<br>";
echo "<br>VALOR COMPRA: $valorTotal <br>";

echo "<br>LIVROS COMPRADOS: <br>";
foreach ($carrinho as $publicacao) {
    echo "<br>Livros: " . $publicacao->getTitulo();
}
?>
<br> <br>
<form action="dadosPagamento.php">
    <input type="submit" value="PROXIMO>>">
</form>

