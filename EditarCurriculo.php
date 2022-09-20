<?php 

    include 'Include/Cabecalho.php';
    include 'Include/LoginMySQL.php';

    $EmailPerfil = $_SESSION["email"];

?>

        <section class = "titulo">

        <h1 class = "titulo">EDITAR CURRÍCULO</h1>

        </section>   

<?php

    try
    {
    
        $Conexao = new PDO($DSN, $DBUser, $DBPass, array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
        $Conexao->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
        $Select = $Conexao->prepare("SELECT * FROM curriculo WHERE email = '$EmailPerfil'");
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
   
            <form class = "col s12" style = "margin-top: 100px;" method = "post" action = "PostEditarCurriculo.php" id = "form" enctype = "multipart/form-data">

                <p>

                    <label>
                        
                        <?php 
                            
                            if($Linha["foto"] == "")
                            {

                                        Echo("<input type = 'checkbox' name = 'check' checked = 'checked' class = 'filled-in'>");

                                        Echo("<span style = 'color: #000000;'>FOTO NO CURRÍCULO</span>");

                                    Echo("</label>");

                                Echo("</p>");
                
                                Echo("<div class = 'row'>");
                
                                    Echo("<div class = 'file-field input-field col s12 m6'>");
                
                                        Echo("<div name = 'fotoCurriculo' class = 'btn' style = 'background: #db6b27;'>");
                                            
                                            Echo("<span>Foto</span>");
                                            
                                            Echo("<input type = 'file' name = 'Arquivo'>");
                
                                        Echo("</div>");
                
                                        Echo("<div class = 'file-path-wrapper'>");
                
                                            Echo("<input style = 'color: #000000;' name = 'fotoCurriculo' class = 'file-path validate' type = 'text' placeholder = 'Adicione aqui uma foto para o seu Currículo'>");
                
                                        Echo("</div>");
                
                                    Echo("</div>");
                
                                Echo("</div>");

                            }
                            else
                            {

                                        Echo("<input type = 'checkbox' name = 'check' checked = 'checked' class = 'filled-in'>");

                                        Echo("<span style = 'color: #000000;'>FOTO NO CURRÍCULO</span>");

                                    Echo("</label>");

                                Echo("</p>");
        
                                Echo("<div class = 'row'>");
        
                                    Echo("<div class = 'file-field input-field col s12 m6'>");
        
                                        Echo("<div name = 'fotoCurriculo' class = 'btn' style = 'background: #db6b27;'>");
                                    
                                            Echo("<span>Foto</span>");

                                            Echo("<input type = 'file' name = 'Arquivo'>");
        
                                        Echo("</div>");
        
                                        Echo("<div class = 'file-path-wrapper'>");
        
                                            Echo("<input style = 'color: #000000;' name = 'fotoCurriculo' class = 'file-path validate' type = 'text' placeholder = 'Adicione aqui uma novo foto para o seu Currículo'>");

                                        Echo("</div>");
        
                                    Echo("</div>");
        
                                Echo("</div>");

                                Echo("<div class = 'row'>");

                                    Echo("<a href = 'ApagarFoto.php' ><i class = 'fas fa-times-circle' style = 'color: #DB6B27;'>APAGAR FOTO DO BANCO(ARRUMAR)</i></a>");

                                Echo("</div>");

                            }

                        ?>

                <h6>1. DADOS PESSOAIS</h6>

                <label></label>

                <div class = "row">

                    <div class = "input-field col s12 m3">

                        <input name = "nome" id = "nome" type = "text" class = "validate" maxlength = "30" value = "<?php Echo($Linha["nome"]); ?>" required>
                        <label for = "nome">Nome</label>

                    </div>
                    <div class = "input-field col s12 m3">

                        <input name = "sobrenome" id = "sobrenome" type = "text" class = "validate" maxlength = "30" value = "<?php Echo($Linha["sobrenome"]); ?>" required>
                        <label for = "sobrenome">Sobrenome</label>

                    </div>

                    <div class = "input-field col s12 m6">

                        <input name = "nacionalidade" id = "nacionalidade" type = "text" class = "validate" value = "<?php Echo($Linha["nacionalidade"]); ?>" maxlength = "30" required>
                        <label for = "nacionalidade">Nacionalidade</label>

                    </div>

                </div>

                <div class = "row">
                    
                    <div class = "input-field col s12 m3">

                        <select name = "sexo" id = "sexo" required>

                            <option value = "" disable select></option>
                            <option value = "Masculino" <?php if ($Linha["sexo"] == "Masculino") {Echo ("selected = 'selected'");} ?> >Masculino</option>
                            <option value = "Feminino" <?php if ($Linha["sexo"] == "Feminino") {Echo ("selected = 'selected'");} ?>>Feminino</option>

                        </select>

                        <label>Sexo</label>

                    </div>

                    <div class = "input-field col s12 m3">

                        <input name = "idade" id = "idade" type = "number" class = "validate"  value = "<?php Echo($Linha["idade"]); ?>" max = "120" min = "16"  required>
                        <label for = "idade">Idade</label>

                    </div>

                    <div class = "input-field col s12 m3">

                        <select name = "estadocivil" required>

                            <option value = "disable"></option>
                            <option value = "1" <?php if ($Linha["estado_civil"] == "Solteiro"  || $Linha["estado_civil"] == "Solteira")   {Echo ("selected = 'selected'");} ?> >Solteiro(a)</option>
                            <option value = "2" <?php if ($Linha["estado_civil"] == "Casado"    || $Linha["estado_civil"] == "Casada")     {Echo ("selected = 'selected'");} ?> >Casado(a)</option>
                            <option value = "3" <?php if ($Linha["estado_civil"] == "União Estável")                                       {Echo ("selected = 'selected'");} ?> >União Estável</option>
                            <option value = "4" <?php if ($Linha["estado_civil"] == "Separado"  || $Linha["estado_civil"] == "Separada")   {Echo ("selected = 'selected'");} ?> >Separado(a)</option>
                            <option value = "5" <?php if ($Linha["estado_civil"] == "Divorciado"|| $Linha["estado_civil"] == "Divorciada") {Echo ("selected = 'selected'");} ?> >Divorciado(a)</option>
                            <option value = "6" <?php if ($Linha["estado_civil"] == "Viúvo"     || $Linha["estado_civil"] == "Viúva")      {Echo ("selected = 'selected'");} ?> >Viúvo(a)</option>

                        </select>

                        <label>Estado Civil</label>

                    </div>

                    <div class = "input-field col s12 m3">

                        <select name = "filhos" required>

                            <option value = "disable"></option>
                            <option value = "Não" <?php if ($Linha["filho"] == "Não") {Echo ("selected = 'selected'");} ?> >Não</option>
                            <option value = "Sim" <?php if ($Linha["filho"] == "Sim") {Echo ("selected = 'selected'");} ?> >Sim</option>

                        </select>

                        <label>Tem Filhos(s)?</label>

                    </div>

                </div> 

                <div class = "row">

                    <div class = "input-field col s12">

                    <input name = "endereco" id = "endereco" type = "text" class = "validate" value = "<?php Echo($Linha["endereco"]); ?>" maxlength = "50" required>
                    <label for = "endereco">Endereço</label>
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

                    <input name = "cidade" id = "cidade" type = "text" class = "validate" value = "<?php Echo($Linha["cidade"]) ?>" maxlength = "70" required>
                    <label for = "cidade">Cidade</label>

                    </div>

                </div> 

                <div class = "row">           

                    <div class = "input-field col s3">

                    <input name = "telefone1" id = "telefone" type = "tel" class = "validate" value = "<?php Echo($Linha["telefone_um"]) ?>" onkeydown="javascript: fMasc( this, mTel );"  maxlength = "14" required>
                    <label for = "telefone">Telefone</label>

                    </div>     

                    <div class = "input-field col s3">

                    <input name = "telefone2" id = "celular" type = "tel" class = "validate" value = "<?php Echo($Linha["telefone_dois"]) ?>" onkeydown="javascript: fMasc( this, mTel );"   maxlength = "14" required>
                    <label for = "celular">Celular</label>

                    </div>     

                    <div class = "input-field col s6">

                        <input name = "email" id = "email" type = "email" class = "validate" value = "<?php Echo($Linha["email"]) ?>" maxlength = "252" required>
                        <label for = "email">E-mail</label>

                    </div>     

                </div>

                <h6>2. OBJETIVO</h6>
                
                <div class = "row">

                    <div class = "input-field col s12">

                        <input name = "objetivo" id = "objetivo" type = "text" value = "<?php Echo($Linha["objetivo"]) ?>" class = "validate" maxlength = "500">
                        <label for = "objetivo"></label>

                    </div>

                </div>

                <div id = "curso">

                <h6>3. FORMAÇÃO ACADÊMICA</h6>

                <div class = "row">

                    <div class = "input-field col s12">

                        <input name = "curso" id = "curso" type = "text" value = "<?php Echo($Linha["curso"]) ?>" class = "validate" maxlength = "100">
                        <label for = "curso">Curso</label>

                    </div>

                </div>

                <div class = "row">

                    <div class = "input-field col s12">

                        <input name = "instituicao" id = "instituicao" value = "<?php Echo($Linha["instituicao"]) ?>" type = "text" class = "validate" maxlength = "120">
                        <label for = "instituicao">Instituição</label>

                    </div>

                </div>

                <div class = "row">

                    <div class = "input-field col s12 m6">

                        <select name = "conclusao">

                            <option value = "disable"></option>
                            <option value = "concluído em" <?php if ($Linha["conclusao"] == "concluído em") {Echo ("selected = 'selected'");} ?> >Concluído em:</option>
                            <option value = "previsão de conclusão em" <?php if ($Linha["conclusao"] == "previsão de conclusão em") {Echo ("selected = 'selected'");} ?>>Previsão de conclusão em:</option>

                        </select>

                        <label>Ano de Conclusão</label>

                    </div>  

                    <div class = "input-field col s12 m6">

                        <input name = "dataDeConclusao" placeholder = "Ex: 2018" id = "dataDeConclusao" value = "<?php Echo($Linha["data_de_conclusao"])?>" type = "number" class = "validate">

                    </div>

                </div>

                <h6>4. EXPERIÊNCIA PROFISSIONAL</h6>

                <div class = "row">

                    <div class = "input-field col s12 m4">

                        <input name = "empresa" id = "empresa" type = "text" value = "<?php Echo($Linha["empresa"])?>" class = "validate" maxlength = "120">
                        <label for = "empresa">Empresa</label>

                    </div>

                    <div class = "input-field col s12 m2">

                        <input name = "anoEntrada" id = "anoEntrada" type = "text" value = "<?php Echo($Linha["ano_de_entrada"])?>" class = "validate" maxlength = "4">  
                        <label for = "anoEntrada">Ano de Entrada</label>

                    </div>

                    <div class = "input-field col s12 m2">

                        <input name = "anoSaida" id = "anoSaida" type = "text" value = "<?php Echo($Linha["ano_de_saida"])?>" class = "validate" maxlength = "4">
                        <label for = "anoSaida">Ano de Saída</label>

                    </div>

                    <div class = "input-field col s12 m4">

                        <input name = "cargo" id = "cargo" type = "text" class = "validate" value = "<?php Echo($Linha["cargo"]); ?>" maxlength = "100">
                        <label for = "cargo">Cargo</label>

                    </div>

                </div>

                <div class = "row">

                    <div class = "input-field col s12">

                        <textarea type = "hidden" name = "nothing" id = "textarea1" class = "materialize-textarea" style = "display: none;" maxlength = "300"></textarea>

                        <textarea name = "atividades" id = "textarea1" class = "materialize-textarea" maxlength = "300"><?php Echo($Linha["atividades"])?></textarea>

                        <label for = "textarea1">Principais atividades desempenhadas no cargo:<label>

                    </div>

                </div>

                <h6>5. QUALIFICAÇÕES E ATIVIDADES COMPLEMENTARES</h6>

                <div class = "row">

                    <div class = "input-field col s12">

                        <textarea name = "qualificacoes" id = "textarea1" class = "materialize-textarea" maxlength = "300"><?php Echo($Linha["qualificacoes"])?></textarea>

                        <label for = "textarea1"></label>

                    </div>

                </div>

                <h6>6. INFORMAÇÕES ADICIONAIS</h6>

                <div class = "row">

                    <div class = "input-field col s12">

                        <textarea name = "informacoes" id = "textarea1" class = "materialize-textarea" maxlength = "300"><?php Echo($Linha["informacoes"])?></textarea>

                        <label for = "textarea1"></label>

                    </div>

                </div>

                <div class = "center-align">

                    <button class = "waves-effect waves-light btn-small col s4 offset-m4 offset-s3" style = "color: white; background-color: #db6b27;;" type = "submit" name = "action">Salvar Alterações</button>

                    <br><br>

                </div>

                <div class = "center-align">

                    <a href = "PerfilUsuario.php" ><button class = "waves-effect waves-light btn-small col s4 offset-m4 offset-s3" style = "color: white; background-color: #db6b27;;" type = "button" name = "action">Voltar</button></a>

                    <br><br>

                </div>

            </form>

        </div>

        </div>

        <?php 

            include 'Include/Rodape.php';

        ?>
    
    </body>

</html>