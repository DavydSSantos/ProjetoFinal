<?php 

    include 'Include/Cabecalho.php';
    include 'Include/LoginMySQL.php';

    $Senha = $_POST["Senha"];
 
    try    
    {
        $Conexao = new PDO($DSN, $DBUser, $DBPass, array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
        $Conexao->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        if($_SESSION["login"] == 2)
        {

            $CNPJPerfil = $_SESSION["cnpj"];

            $Select = $Conexao->prepare("SELECT senha FROM empresas WHERE cnpj = '$CNPJPerfil'");
            $Select->execute();
            $Resultado = $Select->fetch();

            $Delete = $Conexao->prepare("DELETE FROM empresas WHERE cnpj = '$CNPJPerfil'");
            
        }
        else if($_SESSION["login"] == 1)
        {

            $EmailPerfil = $_SESSION["email"];

            $Select = $Conexao->prepare("SELECT senha FROM usuarios WHERE email = '$EmailPerfil'");
            $Select->execute();
            $Resultado = $Select->fetch();

            $Delete = $Conexao->prepare("DELETE FROM usuarios WHERE email = '$EmailPerfil'");

        }
        else if($_SESSION["login"] == 0)
        {
        
            Echo "<script Language = 'Javascript'> alert('Algo deu errado, estamos voltando para a página inicial.'); window.location = 'Index.php'; </script>";
            $Conexao = null;

        }

        if(crypt($Senha, $Resultado['senha']) === $Resultado['senha']) 
        {

            $Delete->execute();

            if($_SESSION["login"] == 1)
            {

                $Delete = $Conexao->prepare("DELETE FROM curriculo WHERE email_perfil = '$EmailPerfil'");
                $Delete->execute();

            }

            $_SESSION['login'] = 0;
            $_SESSION['id']    = null;
            $_SESSION["email"] = null;
            $_SESSION["cnpj"]  = null;
        
            Echo "<script Language = 'Javascript'> alert('Perfil apagado com Sucesso!'); window.location = 'Index.php'; </script>";
            
        } 
        else
        {

            Echo "<script Language = 'Javascript'> alert('Senha incorreta'); window.location = 'ApagarCadastro.php'; </script>";
            $Conexao = null;

        }

    }
    catch(PDOException $e)
    {

        Echo "Falhou".$e->getMessage();
        
    }
 
    include 'Include/Rodape.php';

?>