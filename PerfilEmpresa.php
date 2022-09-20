<?php 

    include 'Include/Cabecalho.php';
    include 'Include/LoginMySQL.php';

    $UsuarioId = $_SESSION['id'];
    $CNPJPerfil = $_SESSION["cnpj"];

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
    
    $Select = $Conexao->prepare("SELECT * FROM empresas WHERE id = '$UsuarioId'");
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

            <div class = "col s12 m5">
        
                <div class = "card-panel white" title = "Nome do Responsável">

                    <span class = "orange-text">

                        <i class="fas fa-user-tie" style = "font-size: 30px;"></i>&nbsp&nbsp&nbsp<?php Echo($Linha['nome_do_responsavel']); ?>

                    </span>

                </div>

            </div>    

            <div class = "col s12 m7">
                
                <div class = "card-panel white" title = "Nome da Empresa">
        
                    <span class = "orange-text">

                        <i class="fas fa-building" style = "font-size: 30px;"></i>&nbsp&nbsp&nbsp<?php Echo($Linha['nome_da_empresa']); ?>
                    
                    </span>
                
                </div>

            </div>
        
        </div>

        <div class = "row">

            <div class = "col s12 m7">

                <div class = "card-panel white" title = "E-mail">
                    
                    <span class = "orange-text">

                        <i class="fas fa-envelope" style = "font-size: 30px;"></i>&nbsp&nbsp&nbsp<?php Echo($Linha['email']); ?>

                    </span>
                
                </div>
            
            </div>

            <div class = "col s12 m5">

                <div class = "card-panel white" title = "CNPJ">

                    <span class = "orange-text">

                        <i class="fas fa-money-check" style = "font-size: 30px;"></i>&nbsp&nbsp&nbsp<?php Echo($Linha['cnpj']); ?>

                    </span>

                </div>

            </div>

        </div>
          
        <h4>Endereço</h4>

        <div class = "row">
              
            <div class = "col s12">
                  
                <div class = "card-panel white" title = "Endereço">
                      
                    <span class = "orange-text">
                          
                        <i class="fas fa-map-marked-alt" style = "font-size: 30px;"></i>&nbsp&nbsp&nbsp<?php Echo($Linha['endereco'] ." - Nº ".$Linha['numero']); ?>

                    </span>
                  
                </div>
              
            </div>
          
        </div>
          
        <div class = "row">
        
            <div class = "col s12">
        
                <div class = "card-panel white">
        
                    <span class = "orange-text">
        
                        <i class="fas fa-globe-americas" style = "font-size: 30px;"></i>&nbsp&nbsp&nbsp<?php Echo($Linha['cidade'] ." - ". $Linha['estado']);  ?>

                    </span>
                  
                </div>
              
            </div>

        </div>

        <h4>Contatos</h4>
          
        <div class = "row">
        
            <div class = "col s12 m6">
        
                <div class = "card-panel white">
        
                    <span class = "orange-text">
        
                        <i class="fas fa-phone" style = "font-size: 30px;"></i>&nbsp&nbsp&nbsp<?php Echo($Linha['telefone']); ?>
                        
                    </span>

                </div>

            </div>

            <div class = "col s12 m6">
             
                <div class = "card-panel white">
             
                    <span class = "orange-text">
             
                        <i class="fas fa-mobile-alt" style = "font-size: 30px;"></i>&nbsp&nbsp&nbsp<?php Echo($Linha['celular']); ?>

                    </span>
                
                </div>
            
            </div>

        </div>
          
        <div class = "row">

            <a href = "AlterarPerfilEmpresa.php";  class = "waves-effect waves-brown btn-small" style = "color: #FFFFFF; background-color: #DB6B27;">Editar Perfil</a>

            <a id = "BotaoPerfil" href = "MostrarCurriculos.php" class = "waves-effect waves-brown btn-small" style = "color: #FFFFFF; background-color: #DB6B27;">Mostrar Currículos</a>

        </div>

        <br><br>

    </div>

<?php

include 'Include/Rodape.php';

?>