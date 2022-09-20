<?php

    session_start();

    require('FPDF\1.81\fPDF.php');

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

    if(isset($_POST['check']))
    {

        $Diretorio = 'ImagemCurriculo\\';
        $Arquivo   = $Diretorio . basename($_FILES['Arquivo']['name']);
        
        move_uploaded_file($_FILES["Arquivo"]["tmp_name"], $Arquivo);
        $PDF->Image($Arquivo, 173, 12, 25);

    }
    else
    {
        $PDF->Image('ImagemCurriculo\Perfil.png', 173, 12, 25);
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

?> 