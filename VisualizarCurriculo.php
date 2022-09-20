<?php

    session_start();

    $EmailPerfil = $_SESSION["email"];

    header("Content-type: text/html; charset=utf-8");

    include 'Include/LoginMySQL.php';

    try
    {
        $Conexao = new PDO($DSN, $DBUser, $DBPass, array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
        $Conexao->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $Select = $Conexao->prepare("SELECT * FROM curriculo WHERE email = '$EmailPerfil'");
        $Select->execute();
        $Resultado = $Select->fetch();

        $Foto = $Resultado["foto"];
        $Nome = $Resultado["nome"];
        $Sobrenome = $Resultado["sobrenome"];
        $Nacionalidade = $Resultado["nacionalidade"];
        $Sexo = $Resultado["sexo"];
        $Idade = $Resultado["idade"];
        $EstadoCivil = $Resultado["estado_civil"];
        $Filhos = $Resultado["filho"];
        $Endereco = $Resultado["endereco"];
        $Estado = $Resultado["estado"];
        $Cidade = $Resultado["cidade"];
        $TelefoneUm = $Resultado["telefone_um"];
        $TelefoneDois = $Resultado["telefone_dois"];
        $Email = $Resultado["email"];
        $Objetivo = $Resultado["objetivo"];
        $Curso = $Resultado["curso"];
        $Instituicao = $Resultado["instituicao"];
        $Conclusao = $Resultado["conclusao"];
        $DataDeConclusao = $Resultado["data_de_conclusao"];
        $Empresa = $Resultado["empresa"];
        $AnoDeEntrada = $Resultado["ano_de_entrada"];
        $AnoDeSaida = $Resultado["ano_de_saida"];
        $Cargo = $Resultado["cargo"];
        $Atividades = $Resultado["atividades"];
        $Qualificacoes = $Resultado["qualificacoes"];
        $Informacoes = $Resultado["informacoes"];

        if($Objetivo == "")
        {

            $Objetivo = "Nenhum objetivo profissional";

        }

        if($Conclusao == "disable")
        {

            $Conclusao = "";

        }
        if($Atividades == "")
        {

            $Atividades = "Nenhuma atividade desempenhada";

        }
        if($Qualificacoes == "")
        {

            $Qualificacoes = "Nenhuma qualificação";

        }
        if($Informacoes == "")
        {
            
            $Informacoes = "Nenhuma informação adicional";

        }


        class PDF extends FPDF
        {

            function Footer()
            {   

                $this->SetY(-15);
                $this->SetFont('Arial', 'I', 8);
                $this->Cell(0,10,'Página '.$this->PageNo().'/{nb}',0,0,'C');

            }


        }

        $PDF = new PDF('P', 'mm', 'A4');
        $PDF->SetAuthor("Trabalho Fácil", "isUTF8");
        $PDF->SetTitle("Currículo de ".$Nome." ".$Sobrenome, "isUTF8");
        $PDF->AliasNbPages();
        $PDF->AddPage();
        $PDF->SetFont('Arial', '', 20);

        if($Foto == "")
        {

            $PDF->Image('ImagemCurriculo\Perfil.png', 173, 12, 25);

        }
        else
        {

            $PDF->Image($Foto, 173, 12, 25);

        }

        $PDF->Cell(40, 10, $Nome." ".$Sobrenome, 0, 1, "L");
        $PDF->SetFont('Arial', '', 11);
        $PDF->Ln(-1);

        $PDF->Cell(40, 10, $Nacionalidade.", ".$EstadoCivil.", ".$Idade." anos", 0, 2, "L");
        $PDF->Ln(-5);

        $PDF->Cell(40, 10, $Endereco." - ".$Estado, 0, 2, "L");
        $PDF->Ln(-5);

        $PDF->Cell(40, 10, "Telefone: ".$TelefoneUm." / ".$TelefoneDois, 0, 2, "L");
        $PDF->Ln(-5);

        $PDF->Cell(40, 10, "E-mail: ".$Email, 0, 2, "L");
        $PDF->Ln(4);

        $PDF->SetFont('Arial', 'B', 12);
        $PDF->Cell(40 ,10, " Objetivo", 0, 2, "L");
        $PDF->Ln(-9);
        $PDF->SetFont('Arial', '', 11);    
        $PDF->Cell(40 ,10, "_______________________________________________________________________________________", 0, 2, "L");
        $PDF->Ln(-1); 
        $PDF->MultiCell(0, 6, $Objetivo, 0, 'L', false);
        $PDF->Ln(4);

        $PDF->SetFont('Arial', 'B', 12);
        $PDF->Cell(40 ,10, " Formação", 0, 2, "L");
        $PDF->Ln(-9);
        $PDF->SetFont('Arial', '', 11);    
        $PDF->Cell(40 ,10, "_______________________________________________________________________________________", 0, 2, "L");
        $PDF->Ln(-3); 
        
        if($Curso == "" || $Instituicao == "" || $Conclusao == "" || $DataDeConclusao == "")
        {

            $PDF->Cell(40, 10, "         ".chr(127)." Nenhuma formação acadêmica", 0, 2, "L");

        }
        else
        {

            $PDF->Cell(40, 10, "         ".chr(127)." ".$Curso.". ".$Instituicao.", ".$Conclusao." ".$DataDeConclusao, 0, 2, "L");
            
        }

        $PDF->Ln(4);    
        $PDF->SetFont('Arial', 'B', 12);
        $PDF->Cell(40 ,10, " Experiência Profissional", 0, 2, "L");
        $PDF->Ln(-9);
        $PDF->SetFont('Arial', '', 11);    
        $PDF->Cell(40 ,10, "_______________________________________________________________________________________", 0, 2, "L");
        $PDF->Ln(-3); 
        
        if($AnoDeEntrada == "" || $AnoDeSaida =="" || $Empresa =="" || $Cargo == "" || $Atividades == "")
        {

            $PDF->Cell(40, 10, "         ".chr(127)." Nenhuma experiência profissional", 0, 2, "L");

        }
        else
        {

            $PDF->Cell(40, 10, "         ".chr(127)." ".$AnoDeEntrada."-".$AnoDeSaida." - ".$Empresa, 0, 2, "L");
            $PDF->Ln(-3); 
            $PDF->MultiCell(0, 10, "           Cargo: ".$Cargo, 0, "L", false); 
            $PDF->Ln(-3); 
            $PDF->Cell(40, 10, "           Principais atividades: ".$Atividades, 0, 2, "L");

        }
        
        $PDF->Ln(4);    
        $PDF->SetFont('Arial', 'B', 12);
        $PDF->Cell(40 ,10, " Qualificações e Atividades Complementares", 0, 2, "L");
        $PDF->Ln(-9);
        $PDF->SetFont('Arial', '', 11);    
        $PDF->Cell(40 ,10, "_______________________________________________________________________________________", 0, 2, "L");
        $PDF->Ln(-3); 
        $PDF->MultiCell(0, 10, "         ".chr(127)." ".$Qualificacoes, 0, 'L', false);
        $PDF->Ln(4);    
        $PDF->SetFont('Arial', 'B', 12);
        $PDF->Cell(40 ,10, " Informações Adicionais", 0, 2, "L");
        $PDF->Ln(-9);
        $PDF->SetFont('Arial', '', 11);    
        $PDF->Cell(40 ,10, "_______________________________________________________________________________________", 0, 2, "L");
        $PDF->Ln(-3);
        $PDF->MultiCell(0, 10, "         ".chr(127)." ".$Informacoes, 0, 'L', false); 

        $PDF->Output();


    }
    catch(PDOException $e)
    {
        Echo "Falhou".$e->getMessage();
    }
    
?>