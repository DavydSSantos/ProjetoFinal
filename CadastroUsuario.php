<?php 

    include 'Include/Cabecalho.php';

?>

        <section class = "titulo">

            <h1 class = "titulo">CADASTRO DE USUÁRIO</h1>

        </section>   

        <div class = "container">
   
            <form accept-charset = "utf-8" class = "col s12" style = "margin-top: 100px;" method = "POST" action = "PostCadastroUsuario.php">

                <h6>DADOS PESSOAIS</h6>

                <div class = "row">

                    <div class = "input-field col s12 m6">

                        <input name = "Nome" id = "Nome" type = "text" class = "validate"  maxlength = "199" required>
                        <label for = "Nome">Nome Completo</label>

                    </div>

                    <div class = "input-field col s12 m6">

                        <input name = "Nacionalidade" id = "Nacionalidade" type = "text" class = "validate" maxlength = "30" required>
                        <label for = "Nacionalidade">Nacionalidade</label>

                    </div>

                </div>

                <div class = "row">
                    
                    <div class = "input-field col s12 m3">

                        <select name = "Sexo">

                            <option value = "" disabled selected></option>
                            <option value = "Masculino">Masculino</option>
                            <option value = "Feminino">Feminino</option>

                        </select>

                        <label>Sexo</label>

                    </div>

                    <div class = "input-field col s12 m3">

                        <input name = "Idade" id = "Idade" type = "number" class = "validate" max = "120" min = "16" required>
                        <label for = "Idade">Idade</label>

                    </div>

                    <div class = "input-field col s12 m3">

                        <select name = "EstadoCivil">

                            <option value = "" disabled selected></option>
                            <option value = "Solteiro(a)">Solteiro(a)</option>
                            <option value = "Casado(a)">Casado(a)</option>
                            <option value = "União Estável">União Estável</option>
                            <option value = "Separado(a)">Separado(a)</option>
                            <option value = "Divorciado(a)">Divorciado(a)</option>
                            <option value = "Viúvo(a)">Viúvo(a)</option>

                        </select>

                        <label>Estado Civil</label>

                    </div>

                    <div class = "input-field col s12 m3">

                        <select name = "Filhos">

                            <option value = "" disabled selected></option>
                            <option value = "Não">Não</option>
                            <option value = "Sim">Sim</option>

                        </select>

                        <label>Tem Filhos(s)?</label>

                    </div>

                </div> 

                <div class = "row">

                    <div class = "input-field col s10">

                        <input name = "Endereco" id = "Endereco" type = "text" class = "validate" maxlength = "50" required>
                        <label for = "Endereco">Endereço</label>

                    </div>  

                    <div class = "input-field col s2">

                    <input name = "Numero" id = "Numero" type = "number" class = "validate" min = "1" max = "99999" required>
                    <label for = "Numero">Nº</label>

                    </div>  

                </div>

                <div class = "row">           

                    <div class = "input-field col s12 m6">

                        <select name = "Estado">

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

                        <input name = "Cidade" id = "Cidade" type = "text" class = "validate"  maxlength = "100" required>
                        <label for = "Cidade">Cidade</label>

                    </div>

                </div> 

                <div class = "row">           

                    <div class = "input-field col s3">

                        <input name = "Telefone" id = "Telefone" type = "tel" class = "validate" onkeydown = "javascript: fMasc( this, mTel );" maxlength = "14" required>
                        <label for = "Telefone">Telefone</label>

                    </div>     

                    <div class = "input-field col s3">

                        <input name = "Celular" id = "Celular" type = "tel" class = "validate" onkeydown = "javascript: fMasc( this, mTel );"   maxlength = "14" required>
                        <label for = "Celular">Celular</label>

                    </div> 

                    <div class = "input-field col s6">

                        <input name = "CPF" id = "CPF" type = "text" class = "validate" placeholder = "000.000.000-00" onkeydown = "javascript: fMasc( this, mCPF );" maxlength = "14" required>
                        <label for = "CPF">CPF</label>

                    </div>    

                </div>

                <div class = "row"> 

                    <div class = "input-field col s6">

                        <input name = "Email" id = "Email" type = "Email" class = "validate" maxlength = "150" required>
                        <label for = "Email">E-mail</label>

                    </div>        

                    <div class = "input-field col s5">

                        <input name = "Senha" id = "Senha" type = "password" class = "validate" placeholder = "********" maxlength = "20" title = "Escolha uma senha mais segura. Use uma combinação de letras maiúsculas e minuscúlas, números e símbolos." pattern = "(?=^.{8,}$)((?=.*\d)|(?=.*\W+))(?![.\n])(?=.*[A-Z])(?=.*[a-z]).*$" required>
                        <label for = "Senha">Senha</label>

                    </div>

                    <div class = "input-field col s1">  

                        <a class = "waves-effect waves-light btn" style = "color: white; background-color: #db6b27;" id = "Olho" onclick = "mostrarSenha()"><i class = "fas fa-eye"></i></a>

                    </div>

                </div>

                <div class = "row">

                    <p>

                        <label>

                            <input type = "checkbox" name = "Newsletter" checked = "checked" class = "filled-in">
                            <span style = "color: #000000;">Deseja receber notícias?</span>

                        </label>

                    </p>

                </div>

                <div class = "center-align">

                    <button id = "BotaoRecuperarForm" class = "waves-effect waves-brown btn-small" style = "color: #FFFFFF; background-color: #DB6B27;" type = "submit" name = "action">Cadastrar</button>

                    <br><br>

                </div>

            </form>

        </div>

        <?php 

            include 'Include/Rodape.php';

        ?>
    
    </body>

</html>