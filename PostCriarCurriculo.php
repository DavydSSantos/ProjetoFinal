<?php

    session_start();

    $EmailPerfil = $_SESSION["email"];

    header("Content-type: text/html; charset=utf-8");

    include 'Include/LoginMySQL.php';


    if(isset($_POST['check']))
    {

        $Diretorio = 'ImagemCurriculo/';
        $Foto   = $Diretorio . basename($_FILES['Arquivo']['name']);
        
        move_uploaded_file($_FILES["Arquivo"]["tmp_name"], $Foto);
    }
    else
    {
        $Foto = "";
    }

    // 1. DADOS PESSOAIS

    $Nome          = $_POST["nome"];
    $Sobrenome     = $_POST["sobrenome"];
    $Nacionalidade = $_POST["nacionalidade"];
    $Sexo          = $_POST["sexo"];
    $Idade         = $_POST["idade"];
    $EstadoCivil   = $_POST["estadocivil"];
    
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

    $Filhos       = $_POST["filhos"];
    $Endereco     = $_POST["endereco"];
    $Estado       = $_POST["estado"];
    $Cidade       = $_POST["cidade"];
    $TelefoneUm   = $_POST["telefone1"];
    $TelefoneDois = $_POST["telefone2"];
    $Email        = $_POST["email"];

    // 3. OBJETIVO

    $Objetivo = $_POST["objetivo"];

    if($Objetivo == "")
    {
        $Objetivo = "Nenhum objetivo profissional";
    }

    // 4. FORMAÇÃO ACADÊMICA

    $Curso           = $_POST["curso"];
    $Instituicao     = $_POST["instituicao"];
    $Conclusao       = $_POST["conclusao"];

    if($Conclusao == "disable")
    {

        $Conclusao = "";

    }
    
    $DataDeConclusao = $_POST["dataDeConclusao"];

    // 5. EXPERIÊNCIA PROFISSIONAL

    $Empresa      = $_POST["empresa"];
    $AnoDeEntrada = $_POST["anoEntrada"];
    $AnoDeSaida   = $_POST["anoSaida"];
    $Cargo        = $_POST["cargo"];
    $Atividades   = $_POST["atividades"];

    if($Atividades == "")
    {
        $Atividades = "Nenhuma atividade desempenhada";
    }

    // 6. QUALIFICAÇÕES

    $Qualificacoes = $_POST["qualificacoes"];

    if($Qualificacoes == "")
    {
        $Qualificacoes = "Nenhuma qualificação";
    }

    // 7. INFORMAÇÕES

    $Informacoes = $_POST["informacoes"];

    if($Informacoes == "")
    {
        $Informacoes = "Nenhuma informação adicional";
    }

    try
    {
        $Conexao = new PDO($DSN, $DBUser, $DBPass, array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
        $Conexao->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        
        $Select = 

        $Select = $Conexao->prepare("SELECT curriculo 
                                     FROM usuarios
                                     WHERE email = '$EmailPerfil'");
        $Select->execute();
        $Select->setFetchMode(PDO::FETCH_ASSOC); 
        $Curriculo = $Select->fetch();

        if($Curriculo["curriculo"] == "on")
        {
            
            Echo "<script Language = 'Javascript'> alert('Já existe um curriculo cadastrado. Tente edita-lo ou apaga-lo!'); window.location = 'PerfilUsuario.php'; </script>";
            $Conexao = null;

        }

        $Insert = "INSERT INTO curriculo
                   SET foto              = '$Foto',
                       nome              = '$Nome',
                       sobrenome         = '$Sobrenome',
                       nacionalidade     = '$Nacionalidade',
                       sexo              = '$Sexo',
                       idade             =  $Idade,
                       estado_civil      = '$EstadoCivil',
                       filho             = '$Filhos',
                       endereco          = '$Endereco',
                       estado            = '$Estado',
                       cidade            = '$Cidade',
                       telefone_um       = '$TelefoneUm',
                       telefone_dois     = '$TelefoneDois',
                       email             = '$Email',
                       objetivo          = '$Objetivo',
                       curso             = '$Curso',
                       instituicao       = '$Instituicao',
                       conclusao         = '$Conclusao',
                       data_de_conclusao = '$DataDeConclusao',
                       empresa           = '$Empresa',
                       ano_de_entrada    = '$AnoDeEntrada',
                       ano_de_saida      = '$AnoDeSaida',
                       cargo             = '$Cargo',
                       atividades        = '$Atividades',
                       qualificacoes     = '$Qualificacoes',
                       informacoes       = '$Informacoes',
                       email_perfil      = '$EmailPerfil'";

        $Insert = $Conexao->query($Insert);

        $Insert = "UPDATE usuarios
                   SET curriculo = 'on'
                   WHERE email = '$EmailPerfil'";

        $Insert = $Conexao->query($Insert);

        Echo "<script Language = 'Javascript'> alert('Curriculo cadastrado com sucesso!'); window.location = 'PerfilUsuario.php'; </script>";

    }
    catch(PDOException $e)
    {
        Echo "Falhou".$e->getMessage();
    }
    
?>