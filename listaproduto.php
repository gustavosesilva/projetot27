<?php
include("conectadb.php");
$sql="SELECT*FROM produtos";
$resultado = mysqli_query($link, $sql);

$ativo="s";
if($_SERVER['REQUEST_METHOD']=='POST'){
    $ativo = $_POST['ativos'];
    if($ativo=='s'){
        $sql="SELECT*FROM produtos WHERE pro_ativo='s'";
        $resultado = mysqli_query($link, $sql);
    }
    else{
        $sql = "SELECT * FROM produtos WHERE pro_ativo = 's'";
        $resultado = mysqli_query($link, $sql);
    }
}

?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="estilo.css">
    <title>LISTA PRODUTOS</title>
</head>
<body>
    <a href="homesistema.html"><input type="button" name="voltahomesistema" value="HOME SISTEMA"></a>
    <form action="listaproduto.php" method="post">
    <input type="radio" name="ativo" value="s" required onclick="submit()"<?=$ativo=='s'?"checked":""?>>ATIVO<br>
        <input type ="radio" name="ativo" value="n" required onclick="submit()"<?=$ativo=='s'?"checked":""?>>INATIVO<br>
        </form>

    <div class="container">
        <table border="1">
            <tr>
                <th>ID</th>
                <th>NOME</th>
                <th>DESCRIÇÃO</th>
                <th>QUANTIDADE</th>
                <th>PREÇO</th>
                <th>ALTERAR</th>
                <th>ATIVO</th>

            </tr>
            <?php
                while($tbl=mysqli_fetch_array($resultado)){
                    ?>
                    <tr>
                        <td><?= $tbl[0]?></td>
                        <td><?= $tbl[1]?></td>
                        <td><?= $tbl[2]?></td>
                        <td><?= $tbl[3]?></td>                        
                        <td>R$ <?= str_replace('.',',',$tbl[4])?></td>
                        <td><a href= "alterausuario.php?id=<?= $tbl[0]?>"><input type="button" value="ALTERA"></a></td>
                        <td><?= $check = ($tbl[5]=="s")?"SIM":"NÃO"?></td>
                </tr>
                <?php    

                }
            ?>

        </table>
    </div>
</body>
</html>