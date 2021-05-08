<?php
//Da acesso a variaveis globais
session_start();

//Inclui os comandos do banco de dados
include_once('conexaoBD.php');

//Variavel que ira buscar o ID do usuario pelo usuario
$id = $_POST["id"];

//Comando SQL que ira excluir o usuario do banco de dados
$sqldelete = "DELETE FROM usuarios WHERE id = '$id'";

//Converte a conexão do BD e os camandos na variavel $query
$query = mysqli_query($conectarbd, $sqldelete);

//Esse comando verfica se o comando afetou alguma linha banco de dados
if(mysqli_affected_rows($conectarbd)):
    //Essa é uma variavel global que pode ser inserida em outros arquivos
    $_SESSION['delete'] = "<p style='color: green';>Cadastro EXCLUIDO com sucesso!!!</p>";
    //Redireciona para readUsuario.php
    header("Location: readUsuario.php");
else:
    $_SESSION['edelete'] = "<p style='color: red';>ERRO ao excluir cadastro!!!</p>";
    header("Location: readUsuario.php");
endif;
?>