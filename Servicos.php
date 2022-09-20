<?php 

    include 'Include/Cabecalho.php';

?>
  
        <section class = "titulo">
        
            <h1 class = "titulo">SERVIÇOS</h1>
            <br>

        </section>  

        <div class = "container">
        
            <div class = "row">
    
                <div class = "col s12 m6">

                <?php

                    if($_SESSION['login'] == 1 || $_SESSION['login'] == 0)
                    {

                     Echo ('<a href = "GerarCurriculo.php">');

                    }
                    else if ($_SESSION['login'] == 2)
                    {

                     Echo ('');

                    }

                ?>



                        <div class = "card hoverable" id = "b_color">
        
                            <div class = "card-image">

                            <?php

                                if($_SESSION['login'] == 0 || $_SESSION['login'] == 1)
                                {

                                    Echo ('<img src = "img/CriarCurriculo.png">');

                                }
                                else if($_SESSION['login'] == 2)
                                {

                                    Echo ('<img src="img/CriarCurriculoPB.png" title = "Disponível somente para pessoa física">');

                                }
                            ?>
          
                                
       
                            </div>

                            <div class = "card-content">

                                <span class = "card-title black-text">Crie ou Cadastre seu Currículo</span>

                                <p class = "black-text">Selecione esta opção para criar ou cadastrar seu currículo online</p>
                            
                            </div>
                        
                        </div>

                    </a>
                
                </div>
    
                <div class = "col s12 m6">
        
                <?php

                    if($_SESSION['login'] == 2)
                    {

                     Echo ('<a href = "MostrarCurriculos.php">');

                    }
                    else if ($_SESSION['login'] == 1 || $_SESSION['login'] == 0)
                    {

                     Echo ('');

                    }

                ?>

                

                    <div class = "card hoverable" id = "b_color">

                        <div class = "card-image">

                        <?php

                            if($_SESSION['login'] == 2)
                            {
                            
                                Echo ('<img src="img/MostrarCurriculo.webp">');
                            
                            }
                            else if($_SESSION['login'] == 0 || $_SESSION['login'] == 1)
                            {

                                Echo ('<img src="img/MostrarCurriculoPB.png" title = "Disponível somente para pessoa jurídica">');

                            }
                        ?>

                        </div>
        
                        <div class = "card-content">
         
                            <span class = "card-title black-text">Visualizar lista de Currículos</span>

                            <p class = "black-text">Selecione esta opção para visualizar a lista de currículos cadastrados</p>
        
                        </div>
      
                        </div>
                
                    </a>
            
                </div>
        
            </div>

        </div>
  
        <?php 

            include 'Include/Rodape.php';

        ?>
    
    </body>
    
</html>