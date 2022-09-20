<?php

    include 'Include/Cabecalho.php';
    include 'Include/LoginMySQL.php';

    $EmailPerfil = $_SESSION['email'];
    $IDPerfil = $_SESSION['id'];

    $Nome          = $_POST["nome"];
    $Email         = $_POST["email"];
    $Sexo          = $_POST['sexo'];
    $Idade         = $_POST['idade'];
    $Filhos        = $_POST['filhos'];
    $CPF           = $_POST['cpf'];
    $Nacionalidade = $_POST['nacionalidade'];
    $Endereco      = $_POST['endereco'];
    $Estado        = $_POST['estado'];
    $Cidade        = $_POST['cidade'];
    $Telefone      = $_POST['telefone'];
    $Celular       = $_POST['celular'];
    $Senha         = $_POST["senha"];
    $Numero        = $_POST["numero"];
    $EstadoCivil   = $_POST["estadocivil"];
    $Senha         = $_POST["senha"];

    if($Sexo == "Masculino")
    {
        if($EstadoCivil == "1")
        {
            $EstadoCivil = "Solteiro";
        }
        elseif($EstadoCivil == "2")
        {
            $EstadoCivil = "Casado";
        }
        elseif($EstadoCivil == "3")
        {
            $EstadoCivil = "União Estável";
        }
        elseif($EstadoCivil == "4")
        {
            $EstadoCivil = "Separado";
        }
        elseif($EstadoCivil == "5")
        {
            $EstadoCivil = "Divorciado";
        }
        elseif($EstadoCivil == "6")
        {
            $EstadoCivil = "Viúvo";
        }
    }
    elseif($Sexo == "Feminino")
    {   
        if($EstadoCivil == "1")
        {
            $EstadoCivil = "Solteira";
        }
        elseif($EstadoCivil == "2")
        {
            $EstadoCivil = "Casada";
        }
        elseif($EstadoCivil == "3")
        {
            $EstadoCivil = "União Estável";
        }
        elseif($EstadoCivil == "4")
        {
            $EstadoCivil = "Separada";
        }
        elseif($EstadoCivil == "5")
        {
            $EstadoCivil = "Divorciada";
        }
        elseif($EstadoCivil == "6")
        {
            $EstadoCivil = "Viúva";
        }
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

        Echo "<script Language = 'Javascript'> alert('CPF inválido, por favor tente novamente com outro CPF'); window.location = 'AlterarPerfilUsuario.php'; </script>";
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

            Echo("<script Language = 'Javascript'> alert('CPF inválido, por favor tente novamente com outro CPF'); window.location = 'AlterarPerfilUsuario.php'; </script>");
            $DBPass = "1";

        }

    }

try    
{
    $Conexao = new PDO($DSN, $DBUser, $DBPass, array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
    $Conexao->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $Select = $Conexao->prepare("SELECT senha FROM usuarios WHERE email = '$EmailPerfil'");
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
    


    $Select = $Conexao->prepare("SELECT email FROM usuarios WHERE id = $IDPerfil");
    $Select->execute();
    $Resultado = $Select->fetch();

    if($Resultado["email"] == $Email && $Resultado["email"] == $EmailPerfil)
    {

        $EAi = "Pode Passar!";

    }
    else if($Resultado["email"] != $Email || $Resultado["email"] != $EmailPerfil)
    {

        $Select = $Conexao->prepare("SELECT email, cpf FROM usuarios");
        $Select->execute();

        while($Resultado = $Select->fetch())
        {

            if($Resultado["email"] == $Email)
            {
        
                Echo "<script Language = 'Javascript'> alert('Novo e-mail já cadastrado. Por favor tente novamente com outro e-mail ou tente entrar usando o e-mail digitado.'); window.location = 'AlterarPerfilUsuario.php'; </script>";
                $Conexao = null;

            } 
            else if($Linha["cpf"] == $CPF)
            {
                
                Echo "<script Language = 'Javascript'> alert('Novo CPF já cadastrado. Por favor tente novamente com outro CPF'); window.location = 'AlterarPerfilUsuario.php'; </script>";
                $Conexao = null;
                
            }   
        
        }

    }

    $Update = "UPDATE usuarios 
               SET    nome          = '$Nome',
                      email         = '$Email',
                      sexo          = '$Sexo',
                      idade         =  $Idade,
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
                      filhos        = '$Filhos' 
               WHERE  email         = '$EmailPerfil'";

    $Update = $Conexao->query($Update);

    Echo "<script Language = 'Javascript'> alert('Perfil alterado com Sucesso!'); window.location = 'PerfilUsuario.php'; </script>";

}
catch(PDOException $e)
{

    Echo "Falhou".$e->getMessage();
    
}

?>

<?php
    
    include 'Include/Rodape.php';

?>