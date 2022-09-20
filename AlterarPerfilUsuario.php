<?php 

    include 'Include/Cabecalho.php';
    include 'Include/LoginMySQL.php';

    $EmailPerfil = $_SESSION["email"];

?>

        <section class = "titulo">

            <h1 class = "titulo">ALTERAR PERFIL</h1>

        </section>   

<?php

    try
    {

        $Conexao = new PDO($DSN, $DBUser, $DBPass, array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
        $Conexao->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $Select = $Conexao->prepare("SELECT * FROM usuarios WHERE email = '$EmailPerfil'");
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
   
            <form accept-charset = "utf-8" class = "col s12" style = "margin-top: 100px;" method = "POST" action = "PostAlterarPerfilUsuario.php">

                <h6>DADOS PESSOAIS</h6>

                <div class = "row">

                    <div class = "input-field col s12 m6">

                        <input name = "nome" id = "nome" type = "text" class = "validate"  maxlength = "199" value = "<?php Echo($Linha['nome']); ?>" required>
                        <label for = "nome">Nome Completo</label>

                    </div>

                    <div class = "input-field col s12 m6">

                        <input name = "nacionalidade" id = "nacionalidade" type = "text" class = "validate" maxlength = "30" value = "<?php Echo($Linha['nacionalidade']); ?>" required>
                        <label for = "nacionalidade">Nacionalidade</label>

                    </div>

                </div>

                <div class = "row">
                    
                    <div class = "input-field col s12 m3">

                        <select name = "sexo">

                            <option value = "" disable select></option>
                            <option value = "Masculino" <?php if ($Linha["sexo"] == "Masculino") {Echo ("selected = 'selected'");} ?> >Masculino</option>
                            <option value = "Feminino" <?php if ($Linha["sexo"] == "Feminino") {Echo ("selected = 'selected'");} ?>>Feminino</option>

                        </select>

                        <label>Sexo</label>

                    </div>

                    <div class = "input-field col s12 m3">

                        <input name = "idade" id = "idade" type = "number" class = "validate" max = "120" min = "16" value = "<?php Echo($Linha['idade']); ?>" required>
                        <label for = "idade">Idade</label>

                    </div>

                    <div class = "input-field col s12 m3">

                        <select name = "estadocivil" required>

                            <option value = "disable"></option>
                            <option value = "1" <?php if ($Linha["estadocivil"] == "Solteiro"  || $Linha["estadocivil"] == "Solteira")   {Echo ("selected = 'selected'");} ?> >Solteiro(a)</option>
                            <option value = "2" <?php if ($Linha["estadocivil"] == "Casado"    || $Linha["estadocivil"] == "Casada")     {Echo ("selected = 'selected'");} ?> >Casado(a)</option>
                            <option value = "3" <?php if ($Linha["estadocivil"] == "União Estável")                                      {Echo ("selected = 'selected'");} ?> >União Estável</option>
                            <option value = "4" <?php if ($Linha["estadocivil"] == "Separado"  || $Linha["estadocivil"] == "Separada")   {Echo ("selected = 'selected'");} ?> >Separado(a)</option>
                            <option value = "5" <?php if ($Linha["estadocivil"] == "Divorciado"|| $Linha["estadocivil"] == "Divorciada") {Echo ("selected = 'selected'");} ?> >Divorciado(a)</option>
                            <option value = "6" <?php if ($Linha["estadocivil"] == "Viúvo"     || $Linha["estadocivil"] == "Viúva")      {Echo ("selected = 'selected'");} ?> >Viúvo(a)</option>

                        </select>

                        <label>Estado Civil</label>

                    </div>

                    <div class = "input-field col s12 m3">

                        <select name = "filhos" required>

                            <option value = "disable"></option>
                            <option value = "Não" <?php if ($Linha["filhos"] == "Não") {Echo ("selected = 'selected'");} ?> >Não</option>
                            <option value = "Sim" <?php if ($Linha["filhos"] == "Sim") {Echo ("selected = 'selected'");} ?> >Sim</option>

                        </select>

                        <label>Tem Filhos(s)?</label>

                    </div>

                </div> 

                <div class = "row">

                    <div class = "input-field col s10">

                        <input name = "endereco" id = "endereco" type = "text" class = "validate" maxlength = "50" value = "<?php Echo($Linha["endereco"]); ?>" required>
                        <label for = "endereco">Endereço</label>

                    </div>  

                    <div class = "input-field col s2">

                    <input name = "numero" id = "numero" type = "number" class = "validate" min = "1" max = "99999" value = "<?php Echo($Linha["numero"]); ?>" required>
                    <label for = "numero">Nº</label>

                    </div>  

                </div>

                <div class = "row">           

                    <div class = "input-field col s12 m6">

                    <select name = "estado" required>

                        <option value = "disable"></option>
                        <option value = "AC" <?php if ($Linha["estado"] == "AC") {Echo ("selected = 'selected'");} ?> >Acre</option>
                        <option value = "AL" <?php if ($Linha["estado"] == "AL") {Echo ("selected = 'selected'");} ?> >Alagoas</option>
                        <option value = "AP" <?php if ($Linha["estado"] == "AP") {Echo ("selected = 'selected'");} ?> >Amapá</option>
                        <option value = "AM" <?php if ($Linha["estado"] == "AM") {Echo ("selected = 'selected'");} ?> >Amazonas</option>
                        <option value = "BA" <?php if ($Linha["estado"] == "BA") {Echo ("selected = 'selected'");} ?> >Bahia</option>
                        <option value = "CE" <?php if ($Linha["estado"] == "CE") {Echo ("selected = 'selected'");} ?> >Ceará</option>
                        <option value = "DF" <?php if ($Linha["estado"] == "DF") {Echo ("selected = 'selected'");} ?> >Distrito Federal</option>
                        <option value = "ES" <?php if ($Linha["estado"] == "ES") {Echo ("selected = 'selected'");} ?> >Espírito Santo</option>
                        <option value = "GO" <?php if ($Linha["estado"] == "GO") {Echo ("selected = 'selected'");} ?> >Goiás</option>
                        <option value = "MA" <?php if ($Linha["estado"] == "MA") {Echo ("selected = 'selected'");} ?> >Maranhão</option>
                        <option value = "MT" <?php if ($Linha["estado"] == "MT") {Echo ("selected = 'selected'");} ?> >Mato Grosso</option>
                        <option value = "MS" <?php if ($Linha["estado"] == "MS") {Echo ("selected = 'selected'");} ?> >Mato Grosso do Sul</option>
                        <option value = "MG" <?php if ($Linha["estado"] == "MG") {Echo ("selected = 'selected'");} ?> >Minas Gerais</option>
                        <option value = "PA" <?php if ($Linha["estado"] == "PA") {Echo ("selected = 'selected'");} ?> >Pará</option>
                        <option value = "PB" <?php if ($Linha["estado"] == "PB") {Echo ("selected = 'selected'");} ?> >Paraíba</option>
                        <option value = "PR" <?php if ($Linha["estado"] == "PR") {Echo ("selected = 'selected'");} ?> >Paraná</option>
                        <option value = "PE" <?php if ($Linha["estado"] == "PE") {Echo ("selected = 'selected'");} ?> >Pernambuco</option>
                        <option value = "PI" <?php if ($Linha["estado"] == "PI") {Echo ("selected = 'selected'");} ?> >Piauí</option>
                        <option value = "RJ" <?php if ($Linha["estado"] == "RJ") {Echo ("selected = 'selected'");} ?> >Rio de Janeiro</option>
                        <option value = "RN" <?php if ($Linha["estado"] == "RN") {Echo ("selected = 'selected'");} ?> >Rio Grande do Norte</option>
                        <option value = "RS" <?php if ($Linha["estado"] == "RS") {Echo ("selected = 'selected'");} ?> >Rio Grande do Sul</option>
                        <option value = "RO" <?php if ($Linha["estado"] == "RO") {Echo ("selected = 'selected'");} ?> >Rondônia</option>
                        <option value = "RR" <?php if ($Linha["estado"] == "RR") {Echo ("selected = 'selected'");} ?> >Roraima</option>
                        <option value = "SC" <?php if ($Linha["estado"] == "SC") {Echo ("selected = 'selected'");} ?> >Santa Catarina</option>
                        <option value = "SP" <?php if ($Linha["estado"] == "SP") {Echo ("selected = 'selected'");} ?> >São Paulo</option>
                        <option value = "SE" <?php if ($Linha["estado"] == "SE") {Echo ("selected = 'selected'");} ?> >Sergipe</option>
                        <option value = "TO" <?php if ($Linha["estado"] == "TO") {Echo ("selected = 'selected'");} ?> >Tocantins</option>

                    </select>

                        <label>Estado</label>            

                    </div> 

                    <div class = "input-field col s12 m6">

                        <input name = "cidade" id = "cidade" type = "text" class = "validate"  maxlength = "100" value = "<?php Echo($Linha["cidade"]); ?>" required>
                        <label for = "cidade">Cidade</label>

                    </div>

                </div> 

                <div class = "row">           

                    <div class = "input-field col s3">

                        <input name = "telefone" id = "telefone" type = "tel" class = "validate" onkeydown = "javascript: fMasc( this, mTel );" maxlength = "14" value = "<?php Echo($Linha["telefone"]); ?>" required>
                        <label for = "telefone">Telefone</label>

                    </div>     

                    <div class = "input-field col s3">

                        <input name = "celular" id = "celular" type = "tel" class = "validate" onkeydown = "javascript: fMasc( this, mTel );" value = "<?php Echo($Linha["celular"]); ?>" required maxlength = "14" >
                        <label for = "Celular">Celular</label>

                    </div> 

                    <div class = "input-field col s6">

                        <input name = "cpf" id = "cpf" type = "text" class = "validate" placeholder = "000.000.000-00" onkeydown = "javascript: fMasc( this, mCPF );" value = "<?php Echo($Linha["cpf"]); ?>" required maxlength = "14" >
                        <label for = "cpf">CPF</label>

                    </div>    

                </div>

                <div class = "row"> 

                    <div class = "input-field col s6">

                        <input name = "email" id = "email" type = "email" class = "validate" maxlength = "150" value = "<?php Echo($Linha["email"]); ?>" required>
                        <label for = "email">E-mail</label>

                    </div>        

                    <div class = "input-field col s5">

                        <input name = "senha" id = "Senha" type = "password" class = "validate" placeholder = "********" maxlength = "20"  title = "Escolha uma senha mais segura. Use uma combinação de letras maiúsculas e minuscúlas, números e símbolos." pattern = "(?=^.{8,}$)((?=.*\d)|(?=.*\W+))(?![.\n])(?=.*[A-Z])(?=.*[a-z]).*$">
                        <label for = "senha">Senha</label>

                    </div>

                    <div class = "input-field col s1">  

                        <a class = "waves-effect waves-light btn" style = "color: white; background-color: #db6b27;" id = "Olho" onclick = "mostrarSenha()"><i class = "fas fa-eye"></i></a>

                    </div>

                </div>

                <div class = "center-align">

                    <button id = "BotaoRecuperarForm" class = "waves-effect waves-brown btn-small" style = "color: #FFFFFF; background-color: #DB6B27;" type = "submit" name = "action">Salvar Alterações</button>

                    <br><br>

                </div>

                <div class = "center-align">

                    <a href = "PerfilUsuario.php" ><button class = "waves-effect waves-light btn-small col s4 offset-m4 offset-s3" style = "color: white; background-color: #db6b27;;" type = "button" name = "action">Voltar</button></a>
                    <a id = "BotaoPerfil" href = "#" class = "waves-effect waves-brown btn-small" style = "color: #FFFFFF; background-color: #DB6B27;" onclick = "ApagarCadastro()">Apagar Cadastro</a>

                    <br><br>

                </div>

            </form>

        </div>

        <?php 

            include 'Include/Rodape.php';

        ?>
    
    </body>

</html>