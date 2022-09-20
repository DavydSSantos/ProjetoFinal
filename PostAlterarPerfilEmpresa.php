<?php

    include 'Include/Cabecalho.php';
    include 'Include/LoginMySQL.php';

    $EmailPerfil = $_SESSION['email'];
    $CNPJPerfil = $_SESSION['cnpj'];
    $IDPerfil = $_SESSION['id'];

    $NomeDaEmpresa     = $_POST["NomeDaEmpresa"];
    $NomeDoResponsavel = $_POST["NomeDoResponsavel"];
    $Endereco          = $_POST['Endereco'];
    $Numero            = $_POST['Numero'];
    $Estado            = $_POST['Estado'];
    $Cidade            = $_POST['Cidade'];
    $Telefone          = $_POST['Telefone'];
    $Celular           = $_POST['Celular'];
    $Email             = $_POST['Email'];
    $CNPJ              = $_POST['CNPJ'];
    $Senha             = $_POST["Senha"];
                            
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

        Echo "<script Language = 'Javascript'> alert('CNPJ inválido, por favor tente novamente com outro CNPJ'); window.location = 'AlterarPerfilEmpresa.php'; </script>";
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

            Echo "<script Language = 'Javascript'> alert('CNPJ inválido, por favor tente novamente com outro CNPJ'); window.location = 'AlterarPerfilEmpresa.php'; </script>";
            $DBPass = "1";

        }

    }

    try    
    {
        $Conexao = new PDO($DSN, $DBUser, $DBPass, array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
        $Conexao->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $Select = $Conexao->prepare("SELECT senha FROM empresas WHERE cnpj = '$CNPJPerfil'");
        $Select->execute();
        $Resultado = $Select->fetch();

        if($Senha == "")
        {

            $Hash = $Resultado["senha"];

        }
        else 
        {

            $Custo = 10;
            $Salt  =  "Cf1f11ePArKlBJomM0F6aJ";
            $Hash  = crypt($Senha, "$2a$" . $Custo . "$" . $Salt . "$");

        }

        $Select = $Conexao->prepare("SELECT email FROM empresas WHERE id = $IDPerfil");
        $Select->execute();
        $Resultado = $Select->fetch();

        if($Resultado["email"] == $Email && $Resultado["email"] == $EmailPerfil)
        {

            $EAi = "Pode Passar!";

        }
        else if($Resultado["email"] != $Email || $Resultado["email"] != $EmailPerfil)
        {

            $Select = $Conexao->prepare("SELECT email, cnpj FROM empresas");
            $Select->execute();

            while($Resultado = $Select->fetch())
            {

                if($Resultado["email"] == $Email)
                {
            
                    Echo "<script Language = 'Javascript'> alert('Novo e-mail já cadastrado. Por favor tente novamente com outro e-mail ou tente entrar usando o e-mail digitado.'); window.location = 'AlterarPerfilEmpresa.php'; </script>";
                    $Conexao = null;

                } 
                else if($Linha["cnpj"] == $CNPJ)
                {
                    
                    Echo "<script Language = 'Javascript'> alert('Novo CNPJ já cadastrado. Por favor tente novamente com outro CNPJ'); window.location = 'AlterarPerfilEmpresa.php'; </script>";
                    $Conexao = null;
                    
                }   
            
            }

        }

        $Update = "UPDATE empresas 
                   SET    nome_da_empresa     = '$NomeDaEmpresa',
                          nome_do_responsavel = '$NomeDoResponsavel',
                          endereco            = '$Endereco',
                          numero              =  $Numero,
                          estado              = '$Estado',
                          cidade              = '$Cidade',
                          telefone            = '$Telefone',
                          celular             = '$Celular',
                          email               = '$Email',
                          cnpj                = '$CNPJ',
                          senha               = '$Hash'
                   WHERE  cnpj                = '$CNPJPerfil'";

        $Update = $Conexao->query($Update); 

        $_SESSION["cnpj"] = $CNPJ;

        Echo "<script Language = 'Javascript'> alert('Perfil alterado com Sucesso!'); window.location = 'PerfilEmpresa.php'; </script>";

    }
    catch(PDOException $e)
    {

        Echo "Falhou".$e->getMessage();
        
    }
    
    include 'Include/Rodape.php';

?>