<?php
if($_SERVER["REQUEST_METHOD"] == "POST"){
    $nome = $_POST['nome'];
    $senha = $_POST['senha'];
    include("conectadb.php");

    #VERIFICA USUARIO EXISTENTE
    $sql = "SELECT COUNT(usu_id) FROM usuarios WHERE usu_nome = '$nome' AND usu_senha = '$senha'";
    $resultado = mysqli_query($link,$sql);
    while($tbl = mysqli_fetch_array($resultado)){
        $cont = $tbl[0];
    }
    if($cont==1){
        echo"<script>window.alert('USUARIO JÁ CADASTRADO! ');</script>";
    }
    else{
        $sql = "INSERT INTO usuarios (usu_nome, usu_senha) VALEU ('$nome', '$senha')";
        mysqli($link, $sql);
        header("Locarion: listausuarios.php");
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href= "./estillos.css">
    <title>CADASTRO DE USUARIOS</title>
</head>
<body>
    <a href="homesistema.html"><input type= "button" id= "menuhome" value ="HOME SISTEMA"></a>
    <div>
        <!-- script para mostrar senha -->
    <script>
        function mostrarsenha(){
            var tipo = document.getElementById("senha");
            if(tipo.type == "password"){
                tipo.type = "text";
            }
            else{
                tipo.type = "password";
            }
        } 
    </script>

    <form action="cadastrausuario.php" method="POST">
        <h1>CADASTRO DE USUARIO</h1>
        <input type="text" name="nome" placeholder="NOME">
        <p></P>
        <input type="password" id="senha" name="senha" placeholder="SENHA">
        <img id="olinho" onclick="mostrarsenha()" src="assets/eye.svg">
        <p></p>
        <input type="submit" name="cadastrar" id="cadastrar" placeholder="CADASTRAR">
    </form>
    </div>
    
</body>
</html>