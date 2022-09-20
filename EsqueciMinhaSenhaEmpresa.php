<?php 

    include 'Include/Cabecalho.php';

?>

        <section class = "titulo">

            <h1 class = "titulo">RECUPERAÇÃO DE SENHA</h1>

        </section>  

        <div class = "container">

            <p style = "text-align: center; font-weight: bold; font-size: 15px;">Digite o CNPJ cadastrado para prosseguir:</p>
        
            <form action = "PostEsqueciMinhaSenhaEmpresa.php" method = "POST" style = "margin-top: 100px;">

                <div class = "row">

                    <div class = "input-field col s12">

                        <input name = "CNPJ" id = "CNPJ" type = "text" class = "validate" placeholder = "00.000.000/0000-00" onkeypress="mascara(this,cnpj)" onkeyup="mascara(this,cnpj)" maxlength = "18" required>
                        <label for = "CNPJ">CNPJ</label>

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