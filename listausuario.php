<?php
//abre conexão com o banco de dados.
include("conectadb.php");
//passa a instrução para o banco de dados. 
//função da instrução? LISTAR TODOS OS CONTEÚDOS DA TABELA usuarios
$sql = "SELECT * FROM usuarios WHERE usu_ativo='s'";
$resultado = mysqli_query($link, $sql);
$ativo='s';

if($_SERVER['REQUEST_METHOD']=='POST'){
    $ativo=$_POST['ativo'];
    if($ativo=='s'){
        $sql="SELECT * FROM usuarios WHERE usu_ativo='s'";
        $resultado=mysqli_query($link,$sql);
    }
    else{
        $sql="SELECT*FROM usuarios WHERE usu_ativo='n'";
        $resultado=mysqli_query($link,$sql);
    }
}

?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LISTA USUARIOS</title>
    <link rel="stylesheet" href="newestilo.css">

</head>

<body>
    <a href="homesistema.html"><input type="button" id="menuhome" value="HOME SISTEMA"></a>
    <form action="listausuario.php" method="post">
        <input type="radio" name="ativo" value="s" required onclick="submit()"<?=$ativo=='s'?"checked":""?>>ATIVO<br>
        <input type ="radio" name="ativo" value="n" required onclick="submit()"<?=$ativo=='n'?"checked":""?>>INATIVO
    </form>
        

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
                        <td><?= $tbl[1]?></td><!-- TRAZ SOMENTE A COLUNA NOME PARA A APRESENTAR NA TABELA -->
                        <!-- AO CLICAR NO BOTÃO ELE JÁ TRARÁ O ID DO USUARIO PARA A PAGINA DO ALTERAR-->
                        <td><a href= "alterausuario.php?id=<?= $tbl[0]?>"><input type="button" value="ALTERA"></a></td>
                        <!-- AO CLICAR NO BOTÃO ELE JÁ TRARÁ O ID DO USUARIO PARA A PAGINA DO EXCLUIR-->
                        <!--<td><a href= "excluiusuario.php?id=<//? $tbl[0]?>"><input type="button" value="EXCLUA"></a></td>-->
                        <td><?= $check = ($tbl[3]=="s")?"SIM":"NÃO"?></td>
                    </tr>
                    <?php
                }
            ?>
        </table>
    </div>

</body>

</html>