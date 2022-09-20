// FUNÇÃO DE CONFIRMAR LOGOUT

function Confirma() 
{

    if (confirm("Deseja realmente sair?")) 
    {

        window.location = "Logout.php";;

    }

}

function ApagarCurriculo() 
{

    if (confirm("Deseja realmente apagar seu currículo?")) 
    {

        window.location = "ApagarCurriculo.php";;

    }

}

function ApagarCadastro() 
{

    if (confirm("Deseja realmente apagar seu cadastro? Não será possível desfazer essa ação.")) 
    {

        window.location = "ApagarCadastro.php";;

    }

}

// FIM FUNÇÃO DE CONFIRMAR LOGOUT

// MASCARAS

function fMasc(objeto,mascara) 
{

    obj = objeto

    masc = mascara

    setTimeout("fMascEx()",1)

}

function fMascEx() 
{

    obj.value = masc(obj.value)

}

function mCPF(cpf)
{

    cpf = cpf.replace(/\D/g,"")

    cpf = cpf.replace(/(\d{3})(\d)/,"$1.$2")

    cpf = cpf.replace(/(\d{3})(\d)/,"$1.$2")

    cpf = cpf.replace(/(\d{3})(\d{1,2})$/,"$1-$2")

    return cpf

}

function fMascEx() 
{

    obj.value = masc(obj.value)

}

function mTel(tel) 
{

    tel = tel.replace(/\D/g,"")

    tel = tel.replace(/^(\d)/,"($1")

    tel = tel.replace(/(.{3})(\d)/,"$1)$2")

    if(tel.length == 9) 
    {

    tel=tel.replace(/(.{1})$/,"-$1")

    } 
    else if (tel.length == 10) 
    {

        tel=tel.replace(/(.{2})$/,"-$1")

    } 
    else if (tel.length == 11) 
    {

        tel=tel.replace(/(.{3})$/,"-$1")

    } 
    else if (tel.length == 12) 
    {

        tel=tel.replace(/(.{4})$/,"-$1")

    } 
    else if (tel.length > 12) 
    {

        tel=tel.replace(/(.{4})$/,"-$1")

    }

    return tel;

}

// FIM MASCARAS

// DUPLICADOR DE CAMPOS

function duplicarCampos()
{

    var clone   = document.getElementById('curso').cloneNode(true);

    var destino = document.getElementById('destino');

    destino.appendChild (clone);
    
    var camposClonados = clone.getElementsByTagName('input');
    
    for(i = 0; i < camposClonados.length; i++)
    {
        camposClonados[i].value = '';
    }

}

function duplicarCampo()
{
    var clone   = document.getElementById('experiencia profissional').cloneNode(true);

    var destino = document.getElementById('clone');

    destino.appendChild (clone);
    
    var camposClonados = clone.getElementsByTagName('input');
    
    for(i = 0; i < camposClonados.length; i++)
    {
        camposClonados[i].value = '';
    }

}

function removerCampos(id)
{

    var node1 = document.getElementById('destino');

    node1.removeChild(node1.childNodes[0]);

}

function removerCampo(id)
{

    var node1 = document.getElementById('clone');

    node1.removeChild(node1.childNodes[0]);

}

// FIM DUPLICADOR DE CAMPOS

function mascara(el,masc){
    el.value=masc(el.value)
    }
    function soNumeros(d){
     return d.replace(/\D/g,"")
    }
    function semNumeros(d){
     return d.replace(/\d/g,"")
    }
    function soMinusculas(d){
     return d.toLowerCase()
    }
    function soMaiusculas(d){
     return d.toUpperCase()
    }
    function cep(d){
        d = soNumeros(d)
        d=d.replace(/^(\d{5})(\d)/,"$1-$2")
        return d
    }
    function cnpj(d){
        d = soNumeros(d)
        d=d.replace(/^(\d{2})(\d)/,"$1.$2")
        d=d.replace(/^(\d{2})\.(\d{3})(\d)/,"$1.$2.$3")
        d=d.replace(/\.(\d{3})(\d)/,".$1/$2")
        d=d.replace(/(\d{4})(\d)/,"$1-$2")
        return d
    }
    function cpf(d){
        d = soNumeros(d)
        d=d.replace(/(\d{3})(\d)/,"$1.$2")
        d=d.replace(/(\d{3})(\d)/,"$1.$2")
    
        d=d.replace(/(\d{3})(\d{1,2})$/,"$1-$2")
        return d
    }
    function url(d){
        d=d.replace(/http:\/\/?/,"")
     d = soMinusculas(d)
        dominio=d
        d="http://"+dominio
        return d
    }
    function telefone(d){
        d = soNumeros(d)
        d=d.replace(/^(\d\d)(\d)/g,"($1) $2")
        d=d.replace(/(\d{4})(\d)/,"$1-$2")
        return d
    }
    function data(d){
        d = soNumeros(d)
        d=d.replace(/(\d{2})(\d)/,"$1/$2")
     d=d.replace(/(\d{2})(\d)/,"$1/$2")
        return d
    }

    function mostrarSenha()
    {
        var Type = document.getElementById("Senha");
        var Eye = document.getElementById("Olho");
                
        if(Type.type == "password")
        {
            Type.type = "text";
            Eye.title = "Ocultar Senha";
            Eye.innerHTML = "<i class= \"fas fa-eye-slash\"></i>";
        }
        else
        {
            Type.type = "password";
            Eye.title = "Mostrar Senha";
            Eye.innerHTML = "<i class= \"fas fa-eye\" ></i>";
        }

    }

    function mostrarConfirmaSenha()
    {
        var TypeC = document.getElementById("ConfirmaSenha");
        var EyeC = document.getElementById("OlhoConfirma");

        if(TypeC.type == "password")
        {
            TypeC.type = "text";
            EyeC.title = "Ocultar Senha";
            EyeC.innerHTML = "<i class= \"fas fa-eye-slash\"></i>";
        }
        else
        {
            TypeC.type = "password";
            EyeC.title = "Mostrar Senha";
            EyeC.innerHTML = "<i class= \"fas fa-eye\" ></i>";
        }
    }