<?php
    include 'include/conexao.php';

    try{
        // array para a limpeza dos campos
        $limpa = array ('.','-','(',')',' ');

        $nome = $_POST['nome'];
        $email = $_POST['email'];
        $telefone =str_replace($limpa,'', $_POST['telefone']);
        $cpf =str_replace($limpa,'', $_POST['cpf']);
        $data_nascimento = $_POST['data_nascimento'];
        $tipo = $_POST['tipo'];

        // endereço
        $cep = $_POST['cep'];
        $rua = $_POST['rua'];
        $numero = $_POST['numero'];
        $bairro = $_POST['bairro'];
        $cidade = $_POST['cidade'];
        $estado = $_POST['estado'];
        $complemento = $_POST['complemento'];

        $senha = $data_nascimento;

    //    $senha = implode('-',array_reverse(explode('-',$data_nascimento)));
        $senha = (date('dmY', strtotime($data_nascimento)));

        $senha = sha1($senha);

        $sql = "INSERT INTO tb_usuario(nome,email,cpf,telefone,data_nascimento,senha,id_tipo)VALUES
        ('$nome','$email','$cpf','$telefone','$data_nascimento','$senha',$tipo)";

        $comando = $con->prepare($sql);

        $comando->execute();

        // captura o id da tabela do comando executado acima
        // necessario esse id para insert na tabela de endereço
        $id_usuario = $con->lastInsertId();

        // ----------------endereço---------------
        $sql = "INSERT INTO tb_enderecos(rua,bairro,numero,cep,cidade,estado,complemento,id_usuario)VALUES
        ('$rua','$bairro','$numero','$cep','$cidade','$estado','$complemento',$id_usuario)";

        $comando = $con->prepare($sql);

        $comando->execute();

        $retorno = array("retorno"=>"ok","mensagem"=>"Usuário inserido com sucesso!");

        
        
    }catch(PDOException $erro){
        $retorno = array("retorno"=>"ok","mensagem"=>$erro->getMessage());
    }

    $json = json_encode($retorno,JSON_UNESCAPED_UNICODE);

    echo $json;

    $con = null;
?>