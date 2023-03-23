<?php
include("../conectadb.php");

#Busca a variavel de sessão dp usuário
session_start();

if($_SERVER['REQUEST_METHOD']=='POST'){
    $idproduto = $_POST['idproduto'];
    $nomeproduto = $_POS['nomeproduto'];
    $descricao = $_POST['descricao'];
    $quantidade = $_POST['quantidade'];
    $totalparcial = ($preco * $quantidade);

    #variavel criada para identificação do carrinho
    $numerocarrinho = MD5($_SESSION('idcliente').date('y').date('m').date('d'));
}

?>