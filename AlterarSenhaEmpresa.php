<?php

    $HashValidacao = str_replace("/TrabalhoFacil/AlterarSenhaEmpresa.php?", "", $_SERVER["REQUEST_URI"]);
    $Resultado = base64_decode($HashValidacao);

    $Array = explode('/', $Resultado);
    $QuantidadeArray = count($Array);

    if($QuantidadeArray == 3)
    {

        $Email = $Array["0"];
        $TokenUm = $Array["1"];
        $TokenDois = $Array["2"];    

    }
    else if($QuantidadeArray == 1)
    {
        $Email = "sem email";
        $TokenUm = 000000;
        $TokenDois = 000000; 
    }


    include 'Include/Cabecalho.php';

?>

        <section class = "titulo">

            <h1 class = "titulo">ALTERAÇÃO DE SENHA</h1>

        </section>

        <div class = "container">

            <p style = "text-align: center; font-weight: bold; font-size: 15px;">Digite e confirme a nova senha para prosseguir:</p>

            <form action = "PostAlteracaoSenhaEmpresa.php" method = "POST" style = "margin-top: 100px;">

                <div class = "row">

                    <div class = "input-field col s11">

                        <input name = "Senha" id = "Senha" type = "password" class = "validate" placeholder = "********" maxlength = "20" title = "Escolha uma senha mais segura. Use uma combinação de letras maiúsculas e minuscúlas, números e símbolos." pattern = "(?=^.{8,}$)((?=.*\d)|(?=.*\W+))(?![.\n])(?=.*[A-Z])(?=.*[a-z]).*$" required>
                        <label for = "Senha">Senha</label>

                    </div> 

                    <div class = "input-field col s1">

                        <a class = "waves-effect waves-light btn" style = "color: white; background-color: #db6b27;" id = "Olho" onclick = "mostrarSenha()"><i class = "fas fa-eye"></i></a>

                    </div>

                </div>

                <div class = "row">

                    <div class = "input-field col s11">

                        <input name = "ConfirmaSenha" id = "ConfirmaSenha" type = "password" class = "validate" placeholder = "********" maxlength = "20" title = "Escolha uma senha mais segura. Use uma combinação de letras maiúsculas e minuscúlas, números e símbolos." pattern = "(?=^.{8,}$)((?=.*\d)|(?=.*\W+))(?![.\n])(?=.*[A-Z])(?=.*[a-z]).*$" required>
                        <label for = "ConfirmaSenha">Confirmação de Senha</label>

                        <input type = "hidden" name = "EmailHidden" id = "EmailHidden" value = "<?php Echo($Email); ?>">
                        <input type = "hidden" name = "TokenUmHidden" id = "TokenUmHidden" value = "<?php Echo($TokenUm); ?>">
                        <input type = "hidden" name = "TokenDoisHidden" id = "TokenDoisHidden" value = "<?php Echo($TokenDois); ?>">

                    </div> 

                    <div class = "input-field col s1">

                        <a class = "waves-effect waves-light btn" style = "color: white; background-color: #db6b27;" id = "OlhoConfirma" onclick = "mostrarConfirmaSenha()"><i class = "fas fa-eye"></i></a>

                    </div> 

                </div>
                       
                <div class = "row">

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