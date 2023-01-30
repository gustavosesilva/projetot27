<?php
include("conectadb.php");
$sql = "SELECT * FROM usuarios";
$resultado = mysqli_query($link, $sql);

?>


<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LISTA USUARIOS</title>
    <link rel="stylesheet" href="estilo.css">

</head>

<body>
    <a href="homesistema.html"><input type="button" id="menuhome" value="HOME SISTEMA"></a>
    <div class="container">
        <table border="1">
            <tr>
                <th>HOME</th>
                <th>ALTERAR DADOS</th>
                <th>EXCLUIR USUARIOS</th>
            </tr>
            <?php
                while($tbl = mysqli_fetch_array($resultado)){
                    ?>
                    <tr>
                        <td><?= $tbl[1]?></td>
                        <td><a href= "alterarusuario.php?id=<? $tbl[0]?>"><input type="button" value="ALTERA"></a></td>
                        <td><a href= "excluirusuario.php?id=<? $tbl[0]?>"><input type="button" value="EXCLUA"></a></td>
                    </tr>
                    <?php
                }
            ?>
        </table>
    </div>

</body>

</html>