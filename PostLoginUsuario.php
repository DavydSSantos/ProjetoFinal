<?php

    session_start();

    $_SESSION['login'] = 0;

    header("Content-type: text/html; charset=utf-8");

    include 'Include/LoginMySQL.php';

    $Senha = $_POST['Senha'];
    $Email = $_POST['Email'];

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

        $Select = $Conexao->prepare("SELECT senha, id FROM usuarios WHERE email = '$Email'");
        $Select->execute();
        $Resultado = $Select->fetch();

        if(crypt($Senha, $Resultado['senha']) === $Resultado['senha']) 
        {
            $_SESSION['login'] = 1;
            $_SESSION['id'] = $Resultado['id'];
            $_SESSION["email"] = $Email;

            Header('Location: Index.php');
        } 
        else 
        {
            Echo "<script Language = 'Javascript'> alert('E-mail ou Senha incorreta'); window.location = 'LoginUsuario.php'; </script>";
        }

    }
    catch(PDOException $e)
    {

        Echo "Falhou".$e->getMessage();
        
    }

?>