<?php

    session_start();
    
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;

    require 'PHPMailer/src/Exception.php';
    require 'PHPMailer/src/PHPMailer.php';
    require 'PHPMailer/src/SMTP.php';

    header("Content-type: text/html; charset=utf-8");

    include 'Include/LoginMySQL.php';

    $CNPJ = $_POST['CNPJ'];

    $_SESSION["CNPJ"] = $CNPJ;

    try
    {
        $Conexao = new PDO($DSN, $DBUser, $DBPass, array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
        $Conexao->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $Select = $Conexao->prepare("SELECT email FROM empresas WHERE cnpj = '$CNPJ'");
        $Select->execute();
        $Resultado = $Select->fetch();

        if($Resultado == true)
        {

            //EMAIL E TOKEN

            $EmailValidacao = $Resultado["email"];
            $TokenUm        = mt_rand(100000, 999999);
            $TokenDois      = mt_rand(100000, 999999);

            $Codificacao = base64_encode($EmailValidacao."/".$TokenUm."/".$TokenDois);   

            $Email = new PHPMailer();
            $Email->IsSMTP();

            $Email->Port       = '465'; 
            $Email->Host       = 'smtp.gmail.com'; 
            $Email->IsHTML(true); 
            $Email->Mailer     = 'smtp'; 
            $Email->SMTPSecure = 'ssl';

            $Email->SMTPAuth = true; 
            $Email->Username = 'trabalhofacilof@gmail.com';
            $Email->Password = 'projeto3web';               

            $Email->SingleTo = true; 

            $Email->From     = "trabalhofacilof@gmail.com"; 
            $Email->FromName = "Trabalho Facil"; 

            $Email->addAddress($EmailValidacao);
            $Email->Subject = "Clique para recuperar sua senha."; 
            $Email->Body    = "127.0.0.1/TrabalhoFacil/AlterarSenhaEmpresa.php?".$Codificacao;
            
            date_default_timezone_set('America/Sao_Paulo');
            $Data = date('Y-m-d H:i:s');
            $Data = date('Y-m-d H:i:s', strtotime("+30 minutes", strtotime($Data)));

            $Insert = "INSERT INTO validacao
                        SET email_validacao = '$EmailValidacao',
                            token_um        = '$TokenUm',
                            token_dois      = '$TokenDois',
                            data_expirar    = '$Data'";

            $Insert = $Conexao->query($Insert);

            Echo "<script Language = 'Javascript'> window.location = 'EnvioEmailEmpresa.php'; </script>";

            if(!$Email->Send())
            {
                Echo "Erro ao enviar Email:" . $Email->ErrorInfo;
            }

        }
        else if($Resultado == false)
        {

            Echo "<script Language = 'Javascript'> alert('CNPJ digitado não cadastrado.'); window.location = 'EsqueciMinhaSenhaEmpresa.php'; </script>";

        }

    }
    catch(PDOException $e)
    {
        Echo "Falhou".$e->getMessage();
    }
    
?>