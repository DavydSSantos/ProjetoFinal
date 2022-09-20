<?php

    session_start();

    $_SESSION['login'] = 0;

    header("Content-type: text/html; charset=utf-8");

    include 'Include/LoginMySQL.php';

    $CNPJ  = $_POST['CNPJ'];
    $Senha = $_POST['Senha'];

    if($Email == "admin@admin" && $Senha == "Admin123")
    {
        
        $_SESSION["login"] = 3;
        $DBPass = "1";
        Echo "<script Language = 'Javascript'> alert('Ó MEU DEUS, O CHEGOU ADMIN, CORRAM!'); window.location = 'Index.php'; </script>";

    }

    try
    {

        $Conexao = new PDO($DSN, $DBUser, $DBPass, array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
        $Conexao->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $Select = $Conexao->prepare("SELECT senha, id, email FROM empresas WHERE cnpj = '$CNPJ'");
        $Select->execute();
        $Resultado = $Select->fetch();

        if(crypt($Senha, $Resultado['senha']) === $Resultado['senha']) 
        {
            $_SESSION['login'] = 2;
            $_SESSION['id'] = $Resultado['id'];
            $_SESSION["cnpj"] = $CNPJ;
            $_SESSION['email'] = $Resultado['email'];
            
            Header('Location: Index.php');
            
        } 
        else 
        {
            Echo "<script Language = 'Javascript'> alert('CNPJ ou Senha incorreta'); window.location = 'LoginEmpresa.php'; </script>";
        }

    }
    catch(PDOException $e)
    {

        Echo "Falhou".$e->getMessage();
        
    }

?>