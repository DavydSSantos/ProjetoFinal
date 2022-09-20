<?php 

    include 'Include/Cabecalho.php';

?>

        <section class = "titulo">

            <h1 class = "titulo">LOGIN EMPRESARIAL</h1>

        </section>   
  
        <div class = "container">
  
            <form action = "PostLoginEmpresa.php" method = "POST" style = "margin-top: 100px;">

                <div class = "row">

                    <div class = "input-field col s12">

                        <input name = "CNPJ" id = "CNPJ" type = "text" class = "validate" placeholder = "00.000.000/0000-00" onkeypress="mascara(this,cnpj)" onkeyup="mascara(this,cnpj)" maxlength = "18" required>

                        <label for = "CNPJ">CNPJ</label>

                    </div>

                </div>

                <div class = "row">

                    <div class = "input-field col s11">

                        <input name = "Senha" id = "Senha" type = "password" class = "validate" placeholder = "********" maxlength = "20" required>
 
                        <label for = "Senha">Senha</label>

                    </div>

                    <div class = "input-field col s1">

                        <a class = "waves-effect waves-light btn" style = "color: white; background-color: #DB6B27;" id = "Olho" onclick = "mostrarSenha()"><i class = "fas fa-eye"></i></a>

                    </div> 

                </div> 
    
                <div class = "row">

                    <button type = "button" class = "waves-effect waves-brown btn-small" style = "color: #DB6B27; background-color: #FFFFFF" ><a id = "Esqueci" href = "EsqueciMinhaSenhaEmpresa.php">Esqueceu a senha?</a></button>

                    <button id = "BotaoLoginForm" class = "waves-effect waves-brown btn-small" style = "color: #FFFFFF; background-color: #DB6B27;" type = "submit" name = "action">Entrar</button>

                </div>

            </form>

        </div>

        <?php 

            include 'Include/Rodape.php';

        ?>
    
    </body>

</html>