<?php 

    include 'Include/Cabecalho.php';

?>

        <section class = "titulo">

            <h1 class = "titulo">CRIADOR DE CURRÍCULO</h1>

        </section>   

        <div class = "container">
   
            <form class = "col s12" style = "margin-top: 100px;" method = "post" action = "PostCurriculo.php" id = "form" enctype = "multipart/form-data">

                <p>

                    <label>

                        <input type = "checkbox" name = "check" checked = "checked" class = "filled-in">
                        <span style = "color: #000000;">FOTO NO CURRÍCULO</span>

                    </label>
                
                </p>

                <div class = "row">

                    <div class = "file-field input-field col s12 m6">

                        <div name = "fotoCurriculo" class = "btn" style = "background: #db6b27;">
                            
                            <span>Foto</span>
                            
                            <input type = "file" name = "Arquivo">

                        </div>

                        <div class = "file-path-wrapper">

                            <input style = "color: #000000;" name = "fotoCurriculo" class = "file-path validate" type = "text" placeholder = "Adicione aqui uma foto para o seu Currículo">

                        </div>

                    </div>

                </div>

                <h6>1. DADOS PESSOAIS</h6>

                <label></label>

                <div class = "row">

                    <div class = "input-field col s12 m3">

                        <input name = "nome" id = "nome" type = "text" class = "validate" maxlength = "30" required>
                        <label for = "nome">Nome</label>

                    </div>
                    <div class = "input-field col s12 m3">

                        <input name = "sobrenome" id = "sobrenome" type = "text" class = "validate" maxlength = "30" required>
                        <label for = "sobrenome">Sobrenome</label>

                    </div>

                    <div class = "input-field col s12 m6">

                        <input name = "nacionalidade" id = "nacionalidade" type = "text" class = "validate" maxlength = "30" required>
                        <label for = "nacionalidade">Nacionalidade</label>

                    </div>

                </div>

                <div class = "row">
                    
                    <div class = "input-field col s12 m3">

                        <select name = "sexo" id = "sexo" required>

                            <option value = "" disable select></option>
                            <option value = "Masculino">Masculino</option>
                            <option value = "Feminino">Feminino</option>

                        </select>

                        <label>Sexo</label>

                    </div>

                    <div class = "input-field col s12 m3">

                        <input name = "idade" id = "idade" type = "number" class = "validate" max = "120" min = "16"  required>
                        <label for = "idade">Idade</label>

                    </div>

                    <div class = "input-field col s12 m3">

                        <select name = "estadocivil" required>

                            <option value = "disable"></option>
                            <option value = "1">Solteiro(a)</option>
                            <option value = "2">Casado(a)</option>
                            <option value = "3">União Estável</option>
                            <option value = "4">Separado(a)</option>
                            <option value = "5">Divorciado(a)</option>
                            <option value = "6">Viúvo(a)</option>

                        </select>

                        <label>Estado Civil</label>

                    </div>

                    <div class = "input-field col s12 m3">

                        <select name = "filhos" required>

                            <option value = "disable"></option>
                            <option value = "Não">Não</option>
                            <option value = "Sim">Sim</option>

                        </select>

                        <label>Tem Filhos(s)?</label>

                    </div>

                </div> 

                <div class = "row">

                    <div class = "input-field col s12">

                    <input name = "endereco" id = "endereco" type = "text" class = "validate" maxlength = "50" required>
                    <label for = "endereco">Endereço</label>
                    </div>    

                </div>

                <div class = "row">           

                    <div class = "input-field col s12 m6">

                        <select name = "estado" required>

                            <option value = "disable"></option>
                            <option value = "AC">Acre</option>
                            <option value = "AL">Alagoas</option>
                            <option value = "AP">Amapá</option>
                            <option value = "AM">Amazonas</option>
                            <option value = "BA">Bahia</option>
                            <option value = "CE">Ceará</option>
                            <option value = "DF">Distrito Federal</option>
                            <option value = "ES">Espírito Santo</option>
                            <option value = "GO">Goiás</option>
                            <option value = "MA">Maranhão</option>
                            <option value = "MT">Mato Grosso</option>
                            <option value = "MS">Mato Grosso do Sul</option>
                            <option value = "MG">Minas Gerais</option>
                            <option value = "PA">Pará</option>
                            <option value = "PB">Paraíba</option>
                            <option value = "PR">Paraná</option>
                            <option value = "PE">Pernambuco</option>
                            <option value = "PI">Piauí</option>
                            <option value = "RJ">Rio de Janeiro</option>
                            <option value = "RN">Rio Grande do Norte</option>
                            <option value = "RS">Rio Grande do Sul</option>
                            <option value = "RO">Rondônia</option>
                            <option value = "RR">Roraima</option>
                            <option value = "SC">Santa Catarina</option>
                            <option value = "SP">São Paulo</option>
                            <option value = "SE">Sergipe</option>
                            <option value = "TO">Tocantins</option>

                        </select>

                        <label>Estado</label>            

                    </div> 

                    <div class = "input-field col s12 m6">

                    <input name = "cidade" id = "cidade" type = "text" class = "validate"  maxlength = "70" required>
                    <label for = "cidade">Cidade</label>

                    </div>

                </div> 

                <div class = "row">           

                    <div class = "input-field col s3">

                    <input name = "telefone1" id = "telefone" type = "tel" class = "validate" onkeydown="javascript: fMasc( this, mTel );"  maxlength = "14" required>
                    <label for = "telefone">Telefone</label>

                    </div>     

                    <div class = "input-field col s3">

                    <input name = "telefone2" id = "celular" type = "tel" class = "validate" onkeydown="javascript: fMasc( this, mTel );"   maxlength = "14" required>
                    <label for = "celular">Celular</label>

                    </div>     

                    <div class = "input-field col s6">

                        <input name = "email" id = "email" type = "email" class = "validate" maxlength = "252" required>
                        <label for = "email">E-mail</label>

                    </div>     

                </div>

                <h6>2. OBJETIVO</h6>
                
                <div class = "row">

                    <div class = "input-field col s12">

                        <input name = "objetivo" id = "objetivo" type = "text" class = "validate" maxlength = "500">
                        <label for = "objetivo"></label>

                    </div>

                </div>

                <div id = "curso">

                <h6>3. FORMAÇÃO ACADÊMICA</h6>

                <div class = "row">

                    <div class = "input-field col s12">

                        <input name = "curso" id = "curso" type = "text" class = "validate" maxlength = "100">
                        <label for = "curso">Curso</label>

                    </div>

                </div>

                <div class = "row">

                    <div class = "input-field col s12">

                        <input name = "instituicao" id = "instituicao" type = "text" class = "validate" maxlength = "120">
                        <label for = "instituicao">Instituição</label>

                    </div>

                </div>

                <div class = "row">

                    <div class = "input-field col s12 m6">

                        <select name = "conclusao">

                            <option value = "disable"></option>
                            <option value = "concluído em">Concluído em:</option>
                            <option value = "previsão de conclusão em">Previsão de conclusão em:</option>

                        </select>

                        <label>Ano de Conclusão</label>

                    </div>  

                    <div class = "input-field col s12 m6">

                        <input name = "dataDeConclusao" placeholder = "Ex: 2018" id = "dataDeConclusao" type = "number" class = "validate">

                    </div>

                </div>

                <h6>4. EXPERIÊNCIA PROFISSIONAL</h6>

                <div class = "row">

                    <div class = "input-field col s12 m4">

                        <input name = "empresa" id = "empresa" type = "text" class = "validate" maxlength = "120">
                        <label for = "empresa">Empresa</label>

                    </div>

                    <div class = "input-field col s12 m2">

                        <input name = "anoEntrada" id = "anoEntrada" type = "text" class = "validate" maxlength = "4">  
                        <label for = "anoEntrada">Ano de Entrada</label>

                    </div>

                    <div class = "input-field col s12 m2">

                        <input name = "anoSaida" id = "anoSaida" type = "text" class = "validate" maxlength = "4">
                        <label for = "anoSaida">Ano de Saída</label>

                    </div>

                    <div class = "input-field col s12 m4">

                        <input name = "cargo" id = "cargo" type = "text" class = "validate" maxlength = "100">
                        <label for = "cargo">Cargo</label>

                    </div>

                </div>

                <div class = "row">

                    <div class = "input-field col s12">

                        <textarea name = "atividades" id = "textarea1" class = "materialize-textarea" maxlength = "300"></textarea>

                        <label for = "textarea1">Principais atividades desempenhadas no cargo:<label>

                    </div>

                </div>

                <h6>5. QUALIFICAÇÕES E ATIVIDADES COMPLEMENTARES</h6>

                <div class = "row">

                    <div class = "input-field col s12">

                        <textarea name = "qualificacoes" id = "textarea1" class = "materialize-textarea" maxlength = "300"></textarea>

                        <label for = "textarea1"></label>

                    </div>

                </div>

                <h6>6. INFORMAÇÕES ADICIONAIS</h6>

                <div class = "row">

                    <div class = "input-field col s12">

                        <textarea name = "informacoes" id = "textarea1" class = "materialize-textarea" maxlength = "300"></textarea>

                        <label for = "textarea1"></label>

                    </div>

                </div>

                <div class = "center-align">

                    <button class = "waves-effect waves-light btn-small col s4 offset-m4 offset-s3" style = "color: white; background-color: #db6b27;;" type = "submit" name = "action">Criar Curriculo</button>

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