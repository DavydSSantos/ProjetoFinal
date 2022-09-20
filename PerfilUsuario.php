<?php 

    include 'Include/Cabecalho.php';

    include 'Include/LoginMySQL.php';

    $UsuarioId = $_SESSION['id'];
    $EmailPerfil = $_SESSION["email"];

?>

<section class = "titulo">

    <h1 class = "titulo">PERFIL</h1>

</section>

<div>

<?php

try
{

    $Conexao = new PDO($DSN, $DBUser, $DBPass, array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
    $Conexao->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    $ValidarCurriculo = $Conexao->prepare("SELECT curriculo FROM usuarios WHERE email = '$EmailPerfil'");
    $ValidarCurriculo->execute();
    $ValidarCurriculo->setFetchMode(PDO::FETCH_ASSOC);
    $OnouOff = $ValidarCurriculo->fetch();

    if($OnouOff["curriculo"] == "on")
    {

        $_SESSION["CurriculoBanco"] = "on";

    }
    else if($OnouOff["curriculo"] == "off" || $OnouOff["curriculo"] == "")
    {

        $_SESSION["CurriculoBanco"] = "off";

    }

    $ValidarCurriculo = $Conexao->prepare("SELECT email_perfil FROM curriculo WHERE email_perfil = '$EmailPerfil'");
    $ValidarCurriculo->execute();
    $ValidarCurriculo->setFetchMode(PDO::FETCH_ASSOC);
    
    $ExisteOuNao = $ValidarCurriculo->fetch();

    if($ExisteOuNao == false)
    {

        $_SESSION["CurriculoBanco"] = "off";

    }
    else if($ExisteOuNao >= 1)
    {

        $_SESSION["CurriculoBanco"] = "on";

    }

    $Select = $Conexao->prepare("SELECT * FROM usuarios WHERE id = '$UsuarioId' ");

    $Select->execute();
    $Select->setFetchMode(PDO::FETCH_ASSOC); 
    $Linha = $Select->fetch();

}
catch(PDOException $e)
{

    Echo "Falhou".$e->getMessage();
    
}

?>

    <div class = "container">

        <br>

        <h4>Informações Pessoais</h4>
          
        <div class = "row">
         
            <div class = "col s12">
         
                <div class = "card-panel white">
         
                    <span class = "orange-text">

                        <?php Echo($Linha['nome']); ?>
                      
                    </span>
                  
                </div>

            </div>
        
        </div>

        <div class = "row">
        
            <div class = "col s12 m5">
        
                <div class = "card-panel white">
        
                    <span class = "orange-text">

                        <?php Echo($Linha['sexo']); ?>

                    </span>

                </div>

            </div>

            <div class = "col s12 m2">

                <div class = "card-panel white">

                    <span class = "orange-text">

                        <?php Echo($Linha['idade']); ?>

                    </span>

                </div>

            </div>

            <div class = "col s12 m5">

                <div class = "card-panel white">

                    <span class = "orange-text">

                        <?php Echo($Linha['cpf']); ?>

                    </span>

                </div>

            </div>

        </div>
          
        <div class = "row">

            <div class = "col s12 m5">

                <div class = "card-panel white">
                    
                    <span class = "orange-text">

                        <?php Echo($Linha['nacionalidade']); ?>

                    </span>
                
                </div>
            
            </div>

            <div class = "col s12 m7">

                <div class = "card-panel white">
                    
                    <span class = "orange-text">
                        
                        <?php Echo($Linha['email']); ?>

                    </span>

                </div>
            
            </div>
          
        </div>
          
        <h4>Endereço</h4>

        <div class = "row">
              
            <div class = "col s12 m9">
                  
                <div class = "card-panel white">
                      
                    <span class = "orange-text">
                          
                        <?php Echo($Linha['endereco']); ?>

                    </span>
                  
                </div>
              
            </div>

            <div class = "col s12 m3">
                  
                <div class = "card-panel white">
                      
                    <span class = "orange-text">
                          
                        <?php Echo($Linha['numero']); ?>

                    </span>
                  
                </div>
              
            </div>
          
        </div>
          
        <div class = "row">
        
            <div class = "col s12 m9">
        
                <div class = "card-panel white">
        
                    <span class = "orange-text">
        
                        <?php Echo($Linha['cidade']); ?>

                    </span>
                  
                </div>
              
            </div>

            <div class = "col s12 m3">
            
                <div class = "card-panel white">
            
                    <span class = "orange-text">
                        
                        <?php Echo($Linha['estado']); ?>

                    </span>

                </div>
                  
            </div>

        </div>

        <h4>Contatos</h4>
          
        <div class = "row">
        
            <div class = "col s12 m6">
        
                <div class = "card-panel white">
        
                    <span class = "orange-text">
        
                        <?php Echo($Linha['telefone']); ?>
                        
                    </span>

                </div>

            </div>

            <div class = "col s12 m6">
             
                <div class = "card-panel white">
             
                    <span class = "orange-text">
             
                        <?php Echo($Linha['celular']); ?>

                    </span>
                
                </div>
            
            </div>

        </div>
          
        <div class = "row">

            <a href = "AlterarPerfilUsuario.php";  class = "waves-effect waves-brown btn-small" style = "color: #FFFFFF; background-color: #DB6B27;">Editar Perfil</a>

            <?php
            
                if($_SESSION["CurriculoBanco"] == "on")
                {

                    Echo('<a id = "BotaoPerfil" href = "EditarCurriculo.php" class = "waves-effect waves-brown btn-small" style = "color: #FFFFFF; background-color: #DB6B27;">Editar Currículo</a>');
                    Echo('<a id = "BotaoPerfil" href = "VisualizarCurriculo.php" class = "waves-effect waves-brown btn-small" style = "color: #FFFFFF; background-color: #DB6B27;">Visualizar Currículo(ALINHAR NO CENTRO)</a>');
                    Echo('<a id = "BotaoPerfil" href = "#" class = "waves-effect waves-brown btn-small" style = "color: #FFFFFF; background-color: #DB6B27;" onclick = "ApagarCurriculo()">Apagar Currículo(ALINHAR NO CENTRO)</a>');

                }
                else if($_SESSION["CurriculoBanco"] == "off")
                {

                    Echo('<a id = "BotaoPerfil" href = "CriarCurriculo.php"  class = "waves-effect waves-brown btn-small" style = "color: #FFFFFF; background-color: #DB6B27;">Cadastrar Currículo</a>');
                    
                }

            ?>

        </div>

        <br><br>

    </div>

<?php

include 'Include/Rodape.php';

?>