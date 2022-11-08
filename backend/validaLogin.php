<?php

try{
    include 'include/conexao.php';

    $email = $_POST['email'];
    $senha =sha1($_POST['senha']);

    $sql = "SELECT email,senha FROM tb_usuario WHERE email ='$email' AND BINARY senha = '$senha'";

    $comando = $con->prepare($sql);
    $comando->execute();

    $dados = $comando->fetchAll(PDO::FETCH_ASSOC);

    if($dados != null){
        session_start();
        $_SESSION['email']=$email;

        $retorno = array("retorno"=>"ok","mensagem"=>"login efetuado com sucesso!");
    }else{
        $retorno = array("retorno"=>"erro","mensagem"=>"dados invalidos");
    }
}catch(PDOException $erro){
    $retorno = array("retorno"=>"erro","mensagem"=>$erro->getMessage());
}

$json = json_encode($retorno, JSON_UNESCAPED_UNICODE);

echo $json;