<?php
include("conectadb.php");
$sql="SELECT*FROM produtos WHERE pro_ativo = 's'";
$resultado = mysqli_query($link, $sql);
#atribui s para variavel ativo
$ativo="s";
#aguarde ação do POST na pagina


?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="newestilo.css">
    <title>LOJA DO PROJETO</title>
</head>
<body>
    
    <form action="loja.php" method="post">
        <!-- Botões que validam se o pdorido é listado domente3 ativos ou inativos-->
        <!-- onclick="submit()" é um javascript que já faz um submit na pagina usando o navegador como rescurso-->
        <!-- <//?=$ativo== Valida se o radio foi acionado (checked) e mantém a escolha se não ele traz em branco-->
   
        </form>

    <div class="container">
        <table border="1">
            <tr>
                <th>ID</th>
                <th>NOME</th>
                <th>DESCRIÇÃO</th>
                <th>QUANTIDADE</th>
                <th>PREÇO</th>
                <th>ADICIONAR AO CARRINHO</th>
            </tr>
            <?php
            #preenchimento da tabela com os dados do banco
                while($tbl=mysqli_fetch_array($resultado)){
                    ?>
                    <tr>
                        <td><?= $tbl[0]?></td>
                        <td><?= $tbl[1]?></td>
                        <td><?= $tbl[2]?></td>
                        <td><input type="number" name="quantidade" id="quantidade"></td>
                        <!--linha abaixo converte formarto da $tbl[3] usando 2 casas após a vírgula e aplicando , ao lugar do ponto -->                       
                        <td>R$ <?= number_format($tbl[4],2,',','.')?></td>
                        <td><img src="img/<?=$tbl[7]?>"width="100"></div></td>
                        <td><a href="addcarrinho.php?id=<?=$tbl[0]&& $quantidade?>"><input type="button" value=" ADICIONAR AO CARRINHHO"></a></td>
                        <!-- tbl[5] verifica se é s que esta vindo do banco de dados, se sim; Escreva SIM  semão escreva NÂO -->
                        <td><?= $check = ($tbl[5]=="s")?"SIM":"NÃO"?></td>
                </tr>
                <?php    

                }
            ?>

        </table>
    </div>
</body>
</html>