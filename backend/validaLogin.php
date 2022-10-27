<?php

try{
    include 'include/conexao.php';

    $email = $_POST['email'];
    $senha = $_POST['senha'];

    $sql = "SELECT email,senha FROM tb_usuarios WHERE email ='$email' AND BINARY senha = '$senha'";

    $comando = $con->prepare($sql);
    $comando->execute();

    $dados = $comando->fetchAll(PDO::FETCH_ASSOC);

    if($dados != null){
        session_start();
        $_SESSION['email']=$email;

        $retorno = array ("retorno"=>"ok","mensagem"=>"login efetuado com sucesso!");
    }else{
        $retorno = array("retorno"=>"erro","mensagem"=>"dados invalidos");
    }
}catch(PDOException $erro){
    
}