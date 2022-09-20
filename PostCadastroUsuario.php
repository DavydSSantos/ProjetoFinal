<?php

    header("Content-type: text/html; charset=utf-8");

    include 'Include/LoginMySQL.php';

    $Nome          = $_POST["Nome"];
    $Email         = $_POST["Email"];
    $Sexo          = $_POST['Sexo'];
    $Idade         = $_POST['Idade'];
    $CPF           = $_POST['CPF'];
    $Nacionalidade = $_POST['Nacionalidade'];
    $Endereco      = $_POST['Endereco'];
    $Estado        = $_POST['Estado'];
    $Cidade        = $_POST['Cidade'];
    $Telefone      = $_POST['Telefone'];
    $Celular       = $_POST['Celular'];
    $Senha         = $_POST["Senha"];
    $Numero        = $_POST["Numero"];
    $EstadoCivil   = $_POST["EstadoCivil"];
    $Newsletter    = $_POST["Newsletter"];

    if($Newsletter == "")
    {
        $Newsletter = "off";
    }
    
    $Um     = $CPF[0];
    $Dois   = $CPF[1];
    $Tres   = $CPF[2];
    $Quatro = $CPF[4];
    $Cinco  = $CPF[5];
    $Seis   = $CPF[6];
    $Sete   = $CPF[8];
    $Oito   = $CPF[9];
    $Nove   = $CPF[10];
    $Dez    = $CPF[12];
    $Onze   = $CPF[13];

    if(($Um     == $Dois)   &&
       ($Dois   == $Tres)   &&
       ($Tres   == $Quatro) &&
       ($Quatro == $Cinco)  &&
       ($Cinco  == $Seis)   &&
       ($Seis   == $Sete)   &&
       ($Sete   == $Oito)   &&
       ($Oito   == $Nove)   &&
       ($Nove   == $Dez)    &&
       ($Dez    == $Onze))
    {

        Echo "<script Language = 'Javascript'> alert('CPF Inválido!'); window.location = 'CadastroUsuario.php'; </script>";
        $DBPass = "1";

    }
    else
    {

        $Soma = ($Um * 10) + ($Dois * 9) + ($Tres * 8) + ($Quatro * 7) + ($Cinco * 6) + ($Seis * 5) + ($Sete * 4) + ($Oito * 3) + ($Nove * 2);
        $Multiplicacao = $Soma * 10;
        $Divisao = $Multiplicacao % 11;

        if($Divisao > 9)
        {

            $Divisao = 0;

        }

        if($Divisao == $Dez)
        {

            $Soma = ($Um * 11) + ($Dois * 10) + ($Tres * 9) + ($Quatro * 8) + ($Cinco * 7) + ($Seis * 6) + ($Sete * 5) + ($Oito * 4) + ($Nove * 3) + ($Dez * 2);
            $Multiplicacao = $Soma * 10;
            $Divisao = $Multiplicacao % 11;

            if($Divisao > 9)
            {

                $Divisao = 0;

            }

            if($Divisao == $Onze)
            {

                $ValidarCPF = "Ok";
            
            }

        }
        else if($Divisao != $Dez)
        {

            Echo "<script Language = 'Javascript'> alert('CPF Inválido!'); window.location = 'CadastroUsuario.php'; </script>";
            $DBPass = "1";

        }

    }

    try
    {
        $Conexao = new PDO($DSN, $DBUser, $DBPass, array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
        $Conexao->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $Select = $Conexao->prepare("SELECT * FROM usuarios");
        $Select->execute();
        $Select->setFetchMode(PDO::FETCH_ASSOC); 

        while($Linha = $Select->fetch())
        {

            if($Linha["email"] == $Email)
            {
        
                Echo "<script Language = 'Javascript'> alert('E-mail já Cadastrado'); window.location = 'CadastroUsuario.php'; </script>";
                $Conexao = null;

            } 
            else if($Linha["cpf"] == $CPF)
            {
                
                Echo "<script Language = 'Javascript'> alert('CPF já Cadastrado'); window.location = 'CadastroUsuario.php'; </script>";
                $Conexao = null;
                
            } 

        }

        $Custo = 10;
        $Salt  =  "Cf1f11ePArKlBJomM0F6aJ";
        $Hash  = crypt($Senha, "$2a$" . $Custo . "$" . $Salt . "$");

        $Insert = "INSERT INTO usuarios
                   SET nome          = '$Nome',
                       email         = '$Email',
                       sexo          = '$Sexo', 
                       idade         = '$Idade', 
                       cpf           = '$CPF', 
                       nacionalidade = '$Nacionalidade',
                       endereco      = '$Endereco', 
                       estado        = '$Estado', 
                       cidade        = '$Cidade',
                       telefone      = '$Telefone', 
                       celular       = '$Celular', 
                       senha         = '$Hash',
                       numero        =  $Numero,
                       estadocivil   = '$EstadoCivil',
                       newsletter    = '$Newsletter',
                       curriculo     = 'off'";
                        
        $Insert = $Conexao->query($Insert);

        Echo "<script Language = 'Javascript'> alert('Cadastro concluído com Sucesso!'); window.location = 'Index.php'; </script>";

    }
    catch(PDOException $e)
    {
        Echo "Falhou".$e->getMessage();
    }
    
?>