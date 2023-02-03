<?php
#conexão do banco de dados
include("conectadb.php");

#Coleta de Variáveis dos campos de textos HTML
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_POST['id'];
    $nome = $_POST['nome'];
    $senha = $_POST['senha'];
    #Instrução SQL para atualização de usuario e senha
    $sql = "UPDATE usuarios SET usu_senha = '$senha', usu_nome = '$nome' WHERE usu_id = $id";
    mysqli_query($link, $sql);
    header("Location: listausuario.php");
    echo "<script>alert('USUARIO ALTERADO COM SUCESSO!');</script>";
    exit();
}

#Coletando ID via link(IRL) exemplo alterausuario.php?id=2
$id = $_GET['id'];
$sql = "SELECT * FROM usuarios WHERE usu_id = $id";
$resultado = mysqli_query($link, $sql);
while ($tbl = mysqli_fetch_array($resultado)) {
    $nome = $tbl[1];
    $senha = $tbl[2];
}
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ALTERAR USUARIOS</title>
</head>

<body>
    <div>
        <form action="alterausuario.php" method="post">
            <input type="hidden" value="<?=$id?>" name="id"><!-- cpçeta id ao carregar a pagina de forma oculta-->
            <label> NOME </label>
            <input type="text" name="nome" id="nome" value="<?= $nome ?>"><!-- coleta o nome do usuraio e preenche a txtbox-->
            <label> SENHA </label>
            <input type="password" name="senha" value="<?= $senha ?>"><!-- coleta a senha do usuraio e preenche a txtbox-->
            <p></p>
            <input type="submit" value="SALVAR">

        </form>
    </div>

</body>

</html>