<?php

    session_start();

    $Existencia = isset($_SESSION['login']);

    if($Existencia == true)
    {

        if($_SESSION['login'] == 1)
        {

            $_SESSION['login'] = 1;

        }
        else if($_SESSION['login'] == 2)
        {

            $_SESSION['login'] = 2;

        }
        else if($_SESSION['login'] == 3)
        {

            $_SESSION['login'] = 3;

        }
        else
        {

            $_SESSION['login'] = 0;

        }

    }
    else if($Existencia == false)
    {
        $_SESSION['login'] = 0;
    }

?>

<!DOCTYPE html>

<html>

    <head>
        
        <title>Trabalho Fácil | Seu futuro começa aqui!</title>

        <link 
        href = "Fonts/Montserrat-Regular.ttf" 
        rel  = "stylesheet">

        <link 
        href  = "Fonts/GoogleApis.css" 
        rel   = "stylesheet">

        <link 
        crossorigin = "anonymous" 
        href        = "FontAwesome\css\all.css"
        rel         = "stylesheet">

        <link 
        href  = "css/style.css"
        type  = "text/css" 
        rel   = "stylesheet" >

        <link
        href  = "img/Favicon.ico"
        type  = "image/x-icon" 
        rel   = "shortcut icon">
    
        <link
        media = "screen,projection"
        href  = "css/materialize.min.css" 
        type  = "text/css" 
        rel   = "stylesheet" >
    
        <meta 
        content = "width=device-width, initial-scale=1.0"
        name    = "viewport">

        <script 
        type = "text/javascript" 
        src  = "js/JavaScript.js">
        </script>

    </head>

    <body>

        <div class = "navbar-fixed">

            <nav class = "nav-extended">
                
                <div class = "nav-wrapper black">

                    <a href = "Index.php"><img class = "responsive-img" src = "img/Logo.png"></a>

                    <a href = "#" data-target="mobile-demo" class = "sidenav-trigger"><i class="fas fa-bars"></i></a>

                    <ul id = "nav-mobile" class = "brand-logo center hide-on-med-and-down">

                        <li><a id = "BotoesMenu" href = "Index.php">INÍCIO</a></li>
                        <li><a id = "BotoesMenu" href = "Servicos.php">SERVIÇOS</a></li>
                        <li><a id = "BotoesMenu" href = "GerarCurriculo.php">CRIE SEU CURRICULO</a></li>
                        <li><a id = "BotoesMenu" href = "Dicas.php">DICAS</a></li>
                        <li><a id = "BotoesMenu" href = "Sobre.php">SOBRE</a></li>

                    </ul>

                    <ul id = "nav-mobile" class = "right hide-on-med-and-down">

                        <?php 

                            if($Existencia == true)
                            {

                                if($_SESSION['login'] == 2) 
                                {

                                    Echo '<li><a href = "#" onclick = "Confirma()" title = "SAIR" ><i class="fas fa-door-open style = "font-size: 32px" ></i></a></li>';
                                    Echo '<li><a class = "BotoesMenuLC" href = "PerfilEmpresa.php" title = "PERFIL"><i class="fas fa-building" "font-size: 32px;" ></i></a></li>';

                                }
                                else if($_SESSION['login'] == 1)
                                {

                                    Echo '<li><a href = "#" onclick = "Confirma()" title = "SAIR" ><i class="fas fa-door-open style = "font-size: 32px" ></i></a></li>';
                                    Echo '<li><a class = "BotoesMenuLC" href = "PerfilUsuario.php" title = "PERFIL"><i class="far fa-id-badge" style = "font-size: 32px;"></i></a></li>';

                                }
                                else if($_SESSION['login'] == 3)
                                {

                                    Echo '<li><a href = "#" onclick = "Confirma()" title = "SAIR" ><i class="fas fa-door-open style = "font-size: 32px" ></i></a></li>';
                                    Echo '<li><a class = "BotoesMenuLC" href = "Administrador.php" title = "Ó MEU DEUS, O CHEGOU ADMIN, CORRAM!"><i class="fas fa-brain" style = "font-size: 32px;"></i></a></li>';

                                }
                                else if($_SESSION['login'] == 0)
                                {

                                    Echo '<li><a class = "BotoesMenuLC" title = "ENTRAR" href = "OpcaoLogin.php"><i class="fas fa-sign-in-alt" style = "font-size: 28px"></i></a></li>';
                                    Echo '<li><a class = "BotoesMenuLC" title = "CADASTRAR" href = "OpcaoCadastro.php"><i class="fas fa-user-plus" style = "font-size: 28px"></i></a></li>';

                                }

                            }
                            else if($Existencia == false)
                            {

                                Echo '<li><a class = "BotoesMenuLC" title = "ENTRAR" href = "OpcaoLogin.php"><i class="fas fa-sign-in-alt" style = "font-size: 28px"></i></a></li>';
                                Echo '<li><a class = "BotoesMenuLC" title = "CADASTRAR" href = "OpcaoCadastro.php"><i class="fas fa-user-plus" style = "font-size: 28px"></i></a></li>';
                                
                            } 

                        ?>

                    </ul>

                </div>
                            
            </nav>  

        </div>

        <ul class = "sidenav black" id = "mobile-demo">

            <br>
            <hr>

            <li><a id = "BotoesMenu" href = "Index.php">INÍCIO</a></li>
            <li><a id = "BotoesMenu" href = "Servicos.php">SERVIÇOS</a></li>
            <li><a id = "BotoesMenu" href = "GerarCurriculo.php">CRIE SEU CURRICULO</a></li>
            <li><a id = "BotoesMenu" href = "Dicas.php">DICAS</a></li>
            <li><a id = "BotoesMenu" href = "Sobre.php">SOBRE</a></li>

            <br>
            <hr>

            <?php 

                if($Existencia == true)
                {

                    if($_SESSION['login'] == 1) 
                    {

                        Echo '<li><a id = "BotoesMenuLC" href = "PerfilUsuario.php" title = "PERFIL" >PERFIL</a></li>';
                        Echo '<li><a id = "BotoesMenuLC" href = "#" onclick = "Confirma()" title = "SAIR" >SAIR</a></li>';
                    }
                    else if($_SESSION['login'] == 2) 
                    {

                        Echo '<li><a id = "BotoesMenuLC" href = "PerfilEmpresa.php" title = "PERFIL" >PERFIL</a></li>';
                        Echo '<li><a id = "BotoesMenuLC" href = "#" onclick = "Confirma()" title = "SAIR" >SAIR</a></li>';
                    }                                
                    else if($_SESSION['login'] == 3)
                    {

                        Echo '<li><a id = "BotoesMenuLC" href = "Administrador.php" title = "Ó MEU DEUS, O CHEGOU ADMIN, CORRAM!"></a></li>';
                        Echo '<li><a id = "BotoesMenuLC" href = "#" onclick = "Confirma()" title = "SAIR" >SAIR</a></li>';

                    }
                    else if($_SESSION['login'] == 0)
                    {

                        Echo '<li><a id = "BotoesMenuLC" title = "ENTRAR" href = "OpcaoLogin.php">ENTRAR</a></li>';
                        Echo '<li><a id = "BotoesMenuLC" title = "CADASTRAR" href = "OpcaoCadastro.php">CADASTRAR</a></li>';

                    }

                }
                else if($Existencia == false)
                {

                    Echo '<li><a id = "BotoesMenuLC" title = "ENTRAR" href = "OpcaoLogin.php">ENTRAR</a></li>';
                    Echo '<li><a id = "BotoesMenuLC" title = "CADASTRAR" href = "OpcaoCadastro.php">CADASTRAR</a></li>';
                    
                } 

            ?>


        </ul>