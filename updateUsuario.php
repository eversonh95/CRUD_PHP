<?php
session_start();

//Conceta o banco de dados
include_once('conexaoBD.php');

//Variaveis que recebem os parametros
$id = $_POST["id"];
$nome = $_POST["nome"];
$sobrenome = $_POST["sobrenome"];
$idade = $_POST["idade"];
$sexo = $_POST["sexo"];
$email = $_POST["email"];
$senha = $_POST["senha"];

//$sqlupate é variavel que recebe os comandos SQL
$sqlupdate = "UPDATE usuarios SET nome = '$nome', sobrenome = '$sobrenome', idade = '$idade', sexo = '$sexo', email = '$email', senha = '$senha' WHERE id = '$id'";

//Conversão dos comandos SQL
$resultado = mysqli_query($conectarbd, $sqlupdate);

//Comando que verifica se o comando funcionou ou não
if(mysqli_affected_rows($conectarbd)):
    $_SESSION['update'] = "<p style='color: green';>Cadastro ATUALIZADO com sucesso!!!</p>";
    header("Location: readUsuario.php");//Se funcionar redireciona a pagina
else:
    $_SESSION['eupdate'] = "<p style='color: red';>ERRO ao atualizar cadastro!!!</p>";
    header("Location: readUsuario.php");//Se NÃO funcionar redireciona a pagina
endif;

?>