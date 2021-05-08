<?php
//importa o banco de dados
include('conexaoBD.php');

//Variaveis que serão recebidos do html ou do front end
//essas variaveis fazem um filtro no SQL e conectam com o BD além de receber o email e a senha via parametros
$email = mysqli_escape_string($conectarbd,$_POST['email']);
$senha = mysqli_escape_string($conectarbd,$_POST['senha']);

//Verifica se os campos de email (login) e senha estão vazios
if(empty($email) or empty($senha)):
    echo "Campos precisam ser preenchidos";
else:
    //Esse comando compara o email (login) com o banco de dados
    //Esse comando vai verificar se email inserido pelo usuario é igual a uns dos emails do banco de dados
    $sqlselect = "SELECT email FROM usuarios WHERE email = '$email'";
    
    //Essse comando conecta com banco de dados e envia os resultados para variavel $resultado
    $resultado = mysqli_query($conectarbd,$sqlselect);

    //Se os numeros de linhas iguais $resultado for maior que zero
    if(mysqli_num_rows($resultado) > 0):

        //Esse comando verifica se o E-mail e a senha existem no banco de dados para logar
        $sqlselect = "SELECT * FROM usuarios WHERE email = '$email' AND senha = '$senha'";
        $sqlselect = mysqli_query($conectarbd,$sqlselect);
        
        //Verfica se a uma correspondecia de duas linhas de senha e email
        if(mysqli_num_rows($sqlselect) == 1):
            

            //Se tiver sucesso no login ira redirecionar para pagina a seguir
            echo "<script>window.alert('Login realizado com sucesso.')</script>";
            header('Location: home.html'); //Redireciona para pagina inicial
        else:
            echo "<script>window.alert('Erro no login.')</script>";
            header('Location: login.html');
        endif;
    endif;
endif;

?>