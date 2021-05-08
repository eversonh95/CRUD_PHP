<?php
session_start();

//importa a conexão com o banco de dados
include_once('conexaoBD.php');


//Aqui a receberemos os dados do usuario do front-end via parametros e as colocaremos nas variaveis 
$nome = $_POST["nome"];
$sobrenome = $_POST["sobrenome"];
$idade = $_POST["idade"];
$sexo = $_POST["sexo"];
$email = $_POST["email"];
$senha = $_POST["senha"];

//A variavel $sqlinsert recebe os valores das variaveis e joga dentro dela
//exista uma coluna ID mas ela não precisar sem inserida pois ela se auto incrementa no banco de dados (id é a chave primaria)
//A tabela usada é a tabela usuarios
$sqlinsert = "INSERT INTO usuarios (nome, sobrenome, idade, sexo, email, senha) VALUES ('$nome', '$sobrenome', '$idade', '$sexo', '$email', '$senha')";

//A variavel resultado recebe  conexão do banco de dados e envia os comando pro banco de dados
$resultado = mysqli_query($conectarbd, $sqlinsert);

//Este é um comando  verifica se o cadastro foi bem sucessedido
if(mysqli_insert_id($conectarbd)):
    echo "Cadastro realizado com sucesso";
    header("Location: login.html");
else:
    echo "Erro ao realizar cadastro.";
    header("Location: login.html");
endif;

?>