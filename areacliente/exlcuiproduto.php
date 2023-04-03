<?php
include ("../conectadb.php");

 session_start();
 if($_SERVER['REQUEST_METHOD']=='POST'){
    $id = $_POST["id"];
    $sql = "DELETE FROM itens_carrinho WHERE carrinho_id = $id";
    mysqli_query($link, $sql);
    echo"<script>window.alert('PRODUTO DELETADO COM SUCESSO');</script>";
    echo"<script.window.location.href='carrinho.php';</script>";
 }

 $id = $_GET['id'];
 $sql = "SELECT pro_nome FROM itens_carrinho INNER JOIN produtos ON fk_pro_id = pro_id WHERE carrinho_id = $id";
 $resultado = mysqli_query($link, $sql);
 $nome = $tbl[0];

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
</body>
</html>