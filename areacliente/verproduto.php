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
    $numerocarrinho = MD5($_SESSION['idcliente'].date('d-m-Y H:i:s'));
 
    #verifique se o carrinho existe 
    $sql = "SELECT COUNT(numero_carrinho) FROM itens_carrinho INNER JOIN clientes ON fk_cli_id = cli_id WHERE cli_id = '$idcliente' AND carrinho_finalizado = 'n'";

    $resultado = mysqli_query($link, $sql);
    while($tbl = mysqli_fetch_array($resultado)){
        $cont = $tbl[0];
        if($cont == 0){
            $sql = "INSERT INTO itens_carrinho (fk_pro_id, item_quantidade, fk_cli_id, valor_carrinho, numero_carrinho, carrinho_finalizado) VALUES ('$idproduto', '$quantidade', '$idcliente', '$totalparcial', '$numerocarrinho', 'n')";
            echo"<script>window.alert('PRODUTO ADICIONADO! '); <script>";
            header("location? loja.php");
        }
        else{
            #VERIFICA QUAL É O NUMERO DO CARRIDO DA MELIANTE
            $sql = "SELECT DISTINCT(numero_carrinho) FROM itens_carrinho
            WHERE fk_cli_id = '$idcliente' AND carrinho_finalizado = 'n'";
            $resultado2 = mysqli_query($link, $sql);
            while($tbl2 = mysqli_fetch_array($resultado2)){
                $numerocarrinhocliente = $tbl2[0];
                $sql2 = "INSERT INTO itens_carrinho (fk_pro_id, item_quantidade, fk_cli_id, valor_carrinho, carrinho_finalizado) VALUES('$idproduto', '$quantidade', '$idcliente', '$totalparcial', '$numerocarrinhocliente', 'n')";
                mysqli_query($link, $sql);
                echo"<script>window.alert('PRODUTO ADICIONADO AO CARRINHO $numerocarrinhocliente')</script>";
                header("location? loja.php");
            }
        }
    }
}

$idproduto = $_GET['id'];
$sql = "SELECT * FROM produtos WHERE pro_id = '$idproduto'";
$resultado = mysqli_query($link, $sql);
while($tbl = mysqli_fetch_array($resultado)){
    $nomeproduto = $tbl[1];
    $descricao = $tbl[2];
    $preco = $tbl[4];
    $imagematual = $tbl[5];
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../newestilo.css"> 
    <title>VER PRODUTO</title>
</head>
<body>
    <div>
        <form action="verproduto.php" method="post">
            <input type="hidden" name="idproduto" value="<?=$idproduto?>"required>
            <label>NOME DO PRODUTO</label>
            <input type="text" name="nome", value="<?=$nome?>" required disabled>
            <br>
            <label>DESCRIÇÃO DO PRODUTO</label>
            <input type="text" name="descricao", value="<?=$descricao?>" required disabled>
            <br>
            <label>QUANTIDADE</label>
            <input type="number" name="quantidade" required>
            <br>
            <label>PREÇO</label>
            <input type="decimal" name="preco", value="<?=$preco?>" required disabled>
            <br>
            <img src="data:image/jpeg;base64,<?=$imagematual?>"width="150" height="150">

            <input type="submit" value="ADICIONAR AO CARRINHO">
</div>    
    
</body>
</html>