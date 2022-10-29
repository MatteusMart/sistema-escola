<?php
    // iniciando a sessao da pagina
    session_start();
    // limpando as variaveis da sessao
    session_unset();
    // destroi a sessao
    session_destroy();

    header("location:../");

?>