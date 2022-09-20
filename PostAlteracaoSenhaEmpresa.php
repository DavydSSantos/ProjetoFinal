<?php

    header("Content-type: text/html; charset=utf-8");

    include 'Include/LoginMySQL.php';

    $Senha         = $_POST['Senha'];
    $ConfirmaSenha = $_POST['ConfirmaSenha'];
    $Email         = $_POST["EmailHidden"];
    $TokenUm       = $_POST["TokenUmHidden"];
    $TokenDois     = $_POST["TokenDoisHidden"];

    if($Senha == $ConfirmaSenha)
    {
        $Senha = $Senha;
    }
    else if($Senha != $ConfirmaSenha)
    {
        Echo "<script Language = 'Javascript'> alert('As senhas não são iguais, tente novamente.'); window.location = 'AlterarSenhaEmpresa.php'; </script>";
    }

    try
    {
        $Conexao = new PDO($DSN, $DBUser, $DBPass, array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
        $Conexao->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $Select = $Conexao->prepare("SELECT * 
                                     FROM validacao
                                     WHERE email_validacao = '$Email' 
                                     AND token_um          = $TokenUm 
                                     AND token_dois        = $TokenDois");

        $Select->execute();
        $Resultado = $Select->fetch();

        if($Resultado == true)
        {

            $Custo = 10;
            $Salt  =  "Cf1f11ePArKlBJomM0F6aJ";
            $Hash  = crypt($Senha, "$2a$" . $Custo . "$" . $Salt . "$");

            $Update = "UPDATE empresas 
                       SET senha   = '$Hash'
                       WHERE email = '$Email'";     
                
            $Update = $Conexao->query($Update);

            $Delete = $Conexao->prepare("DELETE FROM validacao
                                         WHERE email_validacao = '$Email' 
                                         AND token_um          = $TokenUm 
                                         AND token_dois        = $TokenDois");

            $Delete->execute();

            Echo "<script Language = 'Javascript'> alert('Alteração de senha concluída com sucesso! Por favor, guarde sua senha..'); window.location = 'LoginEmpresa.php'; </script>";

        }
        else if($Resultado == false)
        {

            Echo "<script Language = 'Javascript'> alert('Algo deu errado, por favor faça novamente a recuperação de senha.'); window.location = 'EsqueciMinhaSenhaUsuario.php'; </script>";

        }

    }
    catch(PDOException $e)
    {
        Echo "Falhou".$e->getMessage();
    }
    
?>