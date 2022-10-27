<?php

try{
     // dados da conexão com o BD
     define('SERVIDOR','localhost');
     define('USUARIO','root');
     define('SENHA','');
     define('BASEDADOS','db_escola');

     $con = new PDO("mysql:host=".SERVIDOR.";dbname=".BASEDADOS.";charset=utf8", USUARIO, SENHA);
     // set the PDO error mode to exception
     $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    //  echo "Conectado com sucesso";


}catch(PDOException $erro){
   $retorno = array ("retorno"=>"erro","mensagem"=>$e->getMessage());
   $json = json_encode($retorno,JSON_UNESCAPED_UNICODE);
   echo $json;
   exit;

}
