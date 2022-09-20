<?php

    session_start();

    $EmailPerfil = $_SESSION["email"];

    header("Content-type: text/html; charset=utf-8");

    include 'Include/LoginMySQL.php';

    try
    {
        $Conexao = new PDO($DSN, $DBUser, $DBPass, array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
        $Conexao->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $Delete = $Conexao->prepare("DELETE FROM curriculo WHERE email = '$EmailPerfil'");
        $Delete->execute();

        $Update = "UPDATE usuarios
                   SET    curriculo = 'off'
                   WHERE  email     = '$EmailPerfil'";     

        $Update = $Conexao->query($Update);

        Echo "<script Language = 'Javascript'> alert('Curriculo apagado com sucesso!'); window.location = 'PerfilUsuario.php'; </script>";

    }
    catch(PDOException $e)
    {
        Echo "Falhou".$e->getMessage();
    }
    
?>