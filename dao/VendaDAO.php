<?php

require_once '../classes/Venda.php';
require_once 'Conexao.php';
require_once '../classes/Publicacao.php';

class VendaDAO {

    private $con;

    public function VendaDAO() {

        $conexao = new Conexao();
        $this->con = $conexao->getConexao();
    }

    public function incluirVenda($venda, $carrinho) {
        $sql = $this->con->prepare("INSERT INTO vendas (cpf_cliente, dataVenda, valorTotal) "
                . "VALUES :cpf, :data, :val");

        $sql->bindValue(':cpf', $venda->getCpf());
        $sql->bindValue(':data', $this->converterDataMysql($venda->getData()));
        $sql->bindValue(':val', $venda->getValorTotal());

        $sql->execute();

        $id = $this->getIdVenda();
        $this->incluirItens($id, $carrinho);
    }

    private function incluirItens($idVenda, $carrinho) {
        $cont = 1;
        foreach ($carrinho as $publicacao) {
            $sql = $this->con->prepare("INSERT INTO itens (id_item, id_publicacao, quantidade, valorTotal, id_venda) "
                    . "VALUES (:idItem, :idPublicacao, :quantidade, :valorTotal, :idVenda)");

            $sql->bindValue(':idItem', $cont);
            $sql->bindValue(':idPublicacao', $publicacao->getIdPublicacao());
            $sql->bindValue(':quantidade', 1);
            $sql->bindValue(':valorTotal', $publicacao->getPreco());
            $sql->bindValue(':idVenda', $idVenda);

            $sql->execute();
            $cont++;
        }
    }

    private function getIdVenda() {
        $sql = $this->con->query("SELECT MAX(id_venda) AS maior FROM vendas");
        $sql->execute();

        $row = $sql->fetch(PDO::FETCH_OBJ);

        return $row->maior;
    }

    private function converterDataMysql($data) {
        return date('Y-m-d', $data);
    }

}

?>