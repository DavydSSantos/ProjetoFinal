<?php

    header("Content-type: text/html; charset=utf-8");

    include 'Include/LoginMySQL.php';

    $NomeDaEmpresa                = $_POST["NomeDaEmpresa"];
    $NomeDoResponsavelPelaEmpresa = $_POST["NomeDoResponsavelPelaEmpresa"];
    $Endereco                     = $_POST["Endereco"];
    $Numero                       = $_POST["Numero"];
    $Estado                       = $_POST["Estado"];
    $Cidade                       = $_POST['Cidade'];
    $TelefoneComercial            = $_POST['TelefoneComercial'];
    $Celular                      = $_POST['Celular'];
    $Email                        = $_POST['Email'];
    $CNPJ                         = $_POST['CNPJ'];
    $Senha                        = $_POST['Senha'];
    $Newsletter                   = $_POST["Newsletter"];

    if($Newsletter == "")
    {

        $Newsletter = "off";

    }

    $Um       = $CNPJ[0];
    $Dois     = $CNPJ[1];
    $Tres     = $CNPJ[3];
    $Quatro   = $CNPJ[4];
    $Cinco    = $CNPJ[5];
    $Seis     = $CNPJ[7];
    $Sete     = $CNPJ[8];
    $Oito     = $CNPJ[9];
    $Nove     = $CNPJ[11];
    $Dez      = $CNPJ[12];
    $Onze     = $CNPJ[13];
    $Doze     = $CNPJ[14];
    $Treze    = $CNPJ[16];
    $Quatorze = $CNPJ[17];

    if(($Um     == $Dois)   &&
       ($Dois   == $Tres)   &&
       ($Tres   == $Quatro) &&
       ($Quatro == $Cinco)  &&
       ($Cinco  == $Seis)   &&
       ($Seis   == $Sete)   &&
       ($Sete   == $Oito)   &&
       ($Oito   == $Nove)   &&
       ($Nove   == $Dez)    &&
       ($Dez    == $Onze)   &&
       ($Onze   == $Doze)   &&
       ($Doze   == $Treze)  &&
       ($Treze  == $Quatorze))
    {

        Echo "<script Language = 'Javascript'> alert('CNPJ Inválido!'); window.location = 'CadastroEmpresa.php'; </script>";
        $DBPass = "1";

    }
    else
    {

        $Soma = ($Um * 5) + ($Dois * 4) + ($Tres * 3) + ($Quatro * 2) + ($Cinco * 9) + ($Seis * 8) + ($Sete * 7) + ($Oito * 6) + ($Nove * 5) + ($Dez * 4) + ($Onze * 3) + ($Doze * 2);
        $Multiplicacao = $Soma * 10;
        $Divisao = $Multiplicacao % 11;

        if($Divisao <= 2)
        {

            $Divisao = 0;

        }
        else
        {

            $Divisao = $Divisao;

        }

        if($Divisao == $Treze)
        {

            $Soma = ($Um * 6) + ($Dois * 5) + ($Tres * 4) + ($Quatro * 3) + ($Cinco * 2) + ($Seis * 9) + ($Sete * 8) + ($Oito * 7) + ($Nove * 6) + ($Dez * 5) + ($Onze * 4) + ($Doze * 3) + ($Treze * 2);
            $Multiplicacao = $Soma * 10;
            $Divisao = $Multiplicacao % 11;

            if($Divisao <= 2)
            {

                $Divisao = 0;

            }
            else
            {
                $Divisao = $Divisao;

                if($Divisao == $Quatorze)
                {

                    $ValidarCNPJ = "Ok";

                }

            }            

        }
        else if($Divisao != $Treze)
        {

            Echo "<script Language = 'Javascript'> alert('CNPJ Inválido!'); window.location = 'CadastroEmpresa.php'; </script>";
            $DBPass = "1";

        }

    }

    try
    {
        $Conexao = new PDO($DSN, $DBUser, $DBPass, array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
        $Conexao->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $Select = $Conexao->prepare("SELECT * FROM empresas");
        $Select->execute();
        $Select->setFetchMode(PDO::FETCH_ASSOC); 

        while($Linha = $Select->fetch())
        {

            if($Linha["nome_da_empresa"] == $NomeDaEmpresa)
            {
        
                Echo "<script Language = 'Javascript'> alert('Nome da Empresa já Cadastrado'); window.location = 'CadastroEmpresa.php'; </script>";
                $Conexao = null;
            }
            else if($Linha["email"] == $Email)
            {
        
                Echo "<script Language = 'Javascript'> alert('Email já Cadastrado'); window.location = 'CadastroEmpresa.php'; </script>";
                $Conexao = null;
        
            } 
            else if($Linha["cnpj"] == $CNPJ)
            {
                
                Echo "<script Language = 'Javascript'> alert('CNPJ já Cadastrado'); window.location = 'CadastroEmpresa.php'; </script>";
                $Conexao = null;
                
            } 

        }

        $Custo = 10;
        $Salt  = "Cf1f11ePArKlBJomM0F6aJ";
        $Hash  = crypt($Senha, "$2a$" . $Custo . "$" . $Salt . "$");

        $Insert = "INSERT INTO empresas 
                   SET nome_da_empresa     = '$NomeDaEmpresa',
                       nome_do_responsavel = '$NomeDoResponsavelPelaEmpresa',
                       endereco            = '$Endereco',
                       numero              = '$Numero',
                       estado              = '$Estado',
                       cidade              = '$Cidade',
                       telefone            = '$TelefoneComercial',
                       celular             = '$Celular',
                       email               = '$Email',
                       cnpj                = '$CNPJ',
                       senha               = '$Hash',
                       newsletter          = '$Newsletter'";
                
        $Insert = $Conexao->query($Insert);

        Echo "<script Language = 'Javascript'> alert('Cadastro concluído com Sucesso!'); window.location = 'Index.php'; </script>";

    }
    catch(PDOException $e)
    {
        Echo "Falhou".$e->getMessage();
    }

?>