<?php

require 'autoloader.php';

use OpenBoleto\Banco\BancoDoBrasil;
use OpenBoleto\Agente;

session_start();
$cliente = $_SESSION['clienteLogado'];
$valorTotal = $_SESSION['total'];
$carrinho = $_SESSION['carrinho'];

## DADOS PARA O BOLETO
$nome = $cliente->nome;
$cpf = $cliente->cpf;
$endereco = $cliente->logradouro;
$cep = $cliente->cep;
$cidade = $cliente->cidade;
$estado = $cliente->estado;

//$sacado = new Agente('Fernando Maia', '023.434.234-34', 'ABC 302 Bloco N', '72000-000', 'Brasília', 'DF');
$sacado = new Agente($nome, $cpf, $endereco, $cep, $cidade, $estado);
$cedente = new Agente('Empresa Da UFES', '02.123.123/0001-11', 'CLS 403 Lj 23', '29500-000', 'Alegre', 'ES');

$boleto = new BancoDoBrasil(array(
    // Parâmetros obrigatórios
    'dataVencimento' => new DateTime('+5 days'),
    'valor' => $valorTotal,
    'sequencial' => 1234567,
    'sacado' => $sacado,
    'cedente' => $cedente,
    'agencia' => 1724, // Até 4 dígitos
    'carteira' => 18,
    'conta' => 10403005, // Até 8 dígitos
    'convenio' => 1234, // 4, 6 ou 7 dígitos
    // Caso queira um número sequencial de 17 dígitos, a cobrança deverá:
    // - Ser sem registro (Carteiras 16 ou 17)
    // - Convênio com 6 dígitos
    // Para isso, defina a carteira como 21 (mesmo sabendo que ela é 16 ou 17, isso é uma regra do banco)
    // Parâmetros recomendáveis
    //'logoPath' => 'http://empresa.com.br/logo.jpg', // Logo da sua empresa
    'contaDv' => 2,
    'agenciaDv' => 1,
    'descricaoDemonstrativo' => array(// Até 5
        'Compra de materiais cosméticos',
        'Compra de alicate',
    ),
    'instrucoes' => array(// Até 8
        'Após o dia 30/11 cobrar 2% de mora e 1% de juros ao dia.',
        'Não receber após o vencimento.',
    ),
        // Parâmetros opcionais
        //'resourcePath' => '../resources',
        //'moeda' => BancoDoBrasil::MOEDA_REAL,
        //'dataDocumento' => new DateTime(),
        //'dataProcessamento' => new DateTime(),
        //'contraApresentacao' => true,
        //'pagamentoMinimo' => 23.00,
        //'aceite' => 'N',
        //'especieDoc' => 'ABC',
        //'numeroDocumento' => '123.456.789',
        //'usoBanco' => 'Uso banco',
        //'layout' => 'layout.phtml',
        //'logoPath' => 'http://boletophp.com.br/img/opensource-55x48-t.png',
        //'sacadorAvalista' => new Agente('Antônio da Silva', '02.123.123/0001-11'),
        //'descontosAbatimentos' => 123.12,
        //'moraMulta' => 123.12,
        //'outrasDeducoes' => 123.12,
        //'outrosAcrescimos' => 123.12,
        //'valorCobrado' => 123.12,
        //'valorUnitario' => 123.12,
        //'quantidade' => 1,
        ));

echo $boleto->getOutput();
