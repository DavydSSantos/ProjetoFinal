<?php 

    include 'Include/Cabecalho.php';
    
?>

        <section class = "titulo">

        <h1 class = "titulo">APAGAR CADASTRO</h1>

        </section>   

        <div class = "container">

            <p style = "text-align: center; font-weight: bold; font-size: 15px;">Digite sua senha para confirmar a exclusão da conta:</p>

            <form accept-charset = "utf-8" class = "col s12" style = "margin-top: 100px;" method = "POST" action = "PostApagarCadastro.php">

                <div class = "row"> 
                            
                    <div class = "input-field col s11">

                        <input name = "Senha" id = "Senha" type = "password" class = "validate" placeholder = "********" maxlength = "20"  title = "Utilize a mesma senha que é usada para entrar na conta." required>
                        <label for = "Senha">Senha</label>

                    </div>

                    <div class = "input-field col s1">  

                        <a class = "waves-effect waves-light btn" style = "color: white; background-color: #db6b27;" id = "Olho" onclick = "mostrarSenha()"><i class = "fas fa-eye"></i></a>

                    </div>

                </div>

                
                <div class = "center-align">

                    <a href = "AlterarPerfilEmpresa.php" ><button class = "waves-effect waves-light btn-small col s4 offset-m4 offset-s3" style = "color: white; background-color: #db6b27;;" type = "button" name = "action">Voltar</button></a>
                    <button id = "BotaoRecuperarForm" class = "waves-effect waves-brown btn-small" style = "color: #FFFFFF; background-color: #DB6B27;" type = "submit" name = "action">Apagar conta</button>

                    <br><br>

                </div>

            </form>

        </div>

<?php

    include 'Include/Rodape.php';

?>