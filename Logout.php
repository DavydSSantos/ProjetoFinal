<?php 

    include 'Include/Cabecalho.php';
 
    session_start();    

    $_SESSION['login'] = 0;
    $_SESSION['id'] = null;
    $_SESSION["email"] = null;
    $_SESSION["cnpj"] = null;

    header('Location: index.php');

    include 'Include/Rodape.php';

?>