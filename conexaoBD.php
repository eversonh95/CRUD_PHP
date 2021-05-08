<?php
//esse é o arquivo de conexão com o banco de dados
//deve ser sempre importado na hora de receber dados no banco de dados

$servidor = "localhost"; //esse é o servidor local
$usuario = "root"; //nome do login do php MyAdmin
$senha = "";//Não tem senha
$dbname = "cadastros_crud";//nome do banco de dados

//Criar conexão com o banco de dados
//OBS: Usar sempre que for conectar com o Banco de dados
//$conectarbd é variavel que esta armazenada a conexão
$conectarbd = mysqli_connect($servidor,$usuario,$senha,$dbname);

//Esse comando serve para ver se o banco de dados esta com erro.
if($conectarbd -> connect_errno):
    echo "erro com banco de dados Mysql: " . $conectarbd -> connect_errno;
    exit();
endif;

?>