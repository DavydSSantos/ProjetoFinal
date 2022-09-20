<?php 

    include 'Include/Cabecalho.php';

?>

        <section class = "titulo">

            <h1 class = "titulo">RECUPERAÇÃO DE SENHA</h1>

        </section>  

        <div class = "container">

            <p style = "text-align: center; font-weight: bold; font-size: 15px;">Digite o CPF cadastrado para prosseguir:</p>
        
            <form action = "PostEsqueciMinhaSenhaUsuario.php" method = "POST" style = "margin-top: 100px;">

                <div class = "row">

                    <div class = "input-field col s12">

                        <input name = "CPF" id = "CPF" type = "text" class = "validate" placeholder = "000.000.000-00" onkeydown = "javascript: fMasc( this, mCPF );" maxlength = "14" required>
                        <label for = "CPF">CPF</label>

                    </div>    

                    <div class = "center-align">
                    
                        <button id = "BotaoRecuperarForm" class = "waves-effect waves-brown btn-small" style = "color: #FFFFFF; background-color: #DB6B27;" type = "submit" name = "action">Enviar</button>

                    </div>

                </div>
             
            </form>
           
        </div>    

        <?php 

        include 'Include/Rodape.php';

        ?>

    </body>

</html>