<?php

        include 'include/conexao.php';

    try{
        // var que recebe o que foi digitado
        $pesquisar = $_POST['pesquisar'];

        $sql = "SELECT * FROM tb_usuario WHERE nome LIKE '%$pesquisar%' OR
        cpf LIKE '%$pesquisar%'";

        $comando = $con->prepare($sql);

        $comando->execute();

        $retorno = $comando->fetchAll(PDO::FETCH_ASSOC);


    }catch(PDOException $erro){
        $retorno = array("retorno"=>"erro","mensagem"=>$erro->getMessage());

    }

    $json = json_encode($retorno,JSON_UNESCAPED_UNICODE);

    echo $json;

    $con = null;
?>