<?php
include("conectadb.php");

if($_SERVER['REQUEST_METHOD']=='POST'){
    $nome = $_POST["nome"];
    $descricao = $_POST["descricao"];
    $quantidade = $_POST["quantidade"];
    $preco = $_POST["preco"];
    $foto1 = $_POST["file1"];
    #$foto2 = $_POST["file2"];

    if($foto == "") $img="semfoto.png";

#Verifica se o produto está cadastrado 
$sql="SELECT COUNT(pro_id) FROM produtos WHERE pro_nome = '$nome'";
$resultado = mysqli_query($link, $sql);

while ($tbl = mysqli_fetch_array($resultado)){
    $cont = $tbl[0];
    if($cont ==1){
        $sql="INSERT INTO produtos(pro_nome, pro_descricao, pro_quantidade, pro_preco, pro_ativ, imagem1) VALUES('$nome', '$descricao', '$quantidade', '$preco','s', '$foto1')";
        mysqli_query($link,$sql);
        echo($cont);
        #header("Location: listaproduto.php");
        exit();   
    }
    else{
        echo"<script>Window.alert('PRODUTO JÁ CADASTRADO!');</scrpit>";
    }
}




}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="newestilo.css">
    <title>CADASTRAR PRODUTOS</title>
</head>
<body>
        <a href="homesistema.html"><input type="button" id="menuhome" value="HOME SISTEMA"></a>
        <div>
            <form action="cadastraproduto.php" method="post">
                <label>NOME</label>
                <input type="text" name="nome">
                <br></br>
                <label>DESCRIÇÃO</label>
                <input type="text" name="descricao">
                <br></br>
                <label>QUANTIDADE</label>
                <input type="number" name="quantidade">
                <br></br>
                <label>PRECO</label>
                <input type="decimal" name="preco">
                <br></br>

                <!-- BLOCO DE CÓDIGO NOVO -->

                <label>IMAGEM</label>
                <input type="file" name="foto1" id="img1" onchange="foto1()">
                <img src="img/semfoto.png" width="100px" id="foto1a">

                <!-- <label>IMAGEM I</label>
                <input type="file" name="file1" id="img1" onchange="foot1()">
                <img src="img/semimg.gif" width="50px" id="foto1a"> -->

                <input type="submit" value="CADASTRAR">

            </form>
            <script>
                function foto(){
                    document.getElementById("foto1a").src = "img/" (document.getElementById("img'").value).slice(12);
                }
            </script>
        </div>
</body>
</html>
