<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="index.css"><!--Importa o CSS-->
    <title>Lista de Usuarios</title>
    <header><!--Cabeçalho-->
        CRUD
    </header>
</head>
<body>
    <div>
        <h2>Lista de Usuarios</h2>
        <button><a href='home.html'>Voltar</a></button>
        <button><a href='excluirUsuario.html'>Excluir</a></button>
        <button><a href='alterardados.html'>Atualizar Cadastro</a>
        <button><a href='cadastro.html'>Cadastrar Usuario</a></button><hr><br>
    </div>
</body>
</html>

<?php
//Inicia uma sessão
session_start();

//Se a variavel global $_SESSION['delete'] for usada ira definir o comando de sucesso ou erro no caso excluir usuario
if(isset($_SESSION['delete'])):
    echo "<p style='color: green';>Cadastro EXCLUIDO com sucesso!!!</p>";
    unset($_SESSION['delete']);
elseif(isset($_SESSION['edelete'])):
    echo "<p style='color: red';>ERRO ao excluir cadastro!!!</p>";
    unset($_SESSION['edelete']);
endif;

//Verifica se as variaveis globais $_SESSION['update'] ou ['eupdate'] existe e realizam o comando 
if(isset($_SESSION['update'])):
    echo "<p style='color: green';>Cadastro ATUALIZADO com sucesso!!!</p>";
    unset($_SESSION['update']);
elseif(isset($_SESSION['eupdate'])):
    echo "<p style='color: red';>ERRO ao atualizar cadastro!!!</p>";
    unset($_SESSION['eupdate']);
endif;

//inclui os comandos do arquivo conexãoBD
include('conexaoBD.php');

//Essa variavel recebe os comandos SQL
$sqlselect = "SELECT * FROM usuarios";

//Esse comando faz a conexão com o BD pega os comandos sql que estão na variavel no BD e são convertidos pelo "mysqli_query
//e são jogados na variavel $consulta
$consulta = mysqli_query($conectarbd,$sqlselect);


//Esse comando cria uma especie de vetor/array que le os dados do banco de dados a partir de parametros
while($mostrarbd = mysqli_fetch_array($consulta)):
    //No caso a varavel $mostrarbd receber as linhas da variavel $consulta e pega por parametros como ['nome'] ou ['idade']
    //Que no caso são os nomes que estão no banco de dados
    $id = $mostrarbd['id'];
    $nome = $mostrarbd['nome'];
    $sobrenome = $mostrarbd['sobrenome'];
    $idade = $mostrarbd['idade'];
    $sexo = $mostrarbd['sexo'];
    $email = $mostrarbd['email'];

    //Esse comando mostra na tela os dados
    echo "ID: $id<br> Nome: $nome<br> Sobrenome:$sobrenome<br> Idade: $idade<br> Sexo: $sexo<br> E-mail: $email<hr>"; 
     
 //Fim do while   
endwhile;
  
?>