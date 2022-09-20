<?php
    
    include 'Include/Cabecalho.php';
    
    header("Content-type: text/html; charset=utf-8");

    $DSN    = "mysql:dbname=trabalho;host=127.0.0.1";
    $DBUser = "root";
    $DBPass = "";

    $CNPJ = $_SESSION["CNPJ"];

    try
    {
        $Conexao = new PDO($DSN, $DBUser, $DBPass, array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
        $Conexao->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $Select = $Conexao->prepare("SELECT email FROM empresas WHERE cnpj = '$CNPJ'");
        $Select->execute();
        $Resultado = $Select->fetch();

        $EmailInteiro    = $Resultado["email"];
        $Pedacos         = explode('@', $EmailInteiro);
        $Texto           = $Pedacos[0];
        $Provedor        = $Pedacos[1];
        $QuantidadeTexto = strlen($Texto);
        $Metade = $QuantidadeTexto / 2;
        $QuantidadeApresentada = substr($Texto, 0, $Metade);
        $QuantidadeApresentada = $QuantidadeApresentada."******".$Provedor;

    }
    catch(PDOException $e)
    {
        Echo "Falhou".$e->getMessage();
    }

?>

        <section class = "titulo">

            <h1 class = "titulo">DEU CERTO!</h1>

        </section>  

        <div class = "container">

            <br><br>

            <p style = "text-align: center; font-weight: bold; font-size: 15px;">Enviamos um email para <?php Echo($QuantidadeApresentada) ?></p>
            <p style = "text-align: center; font-weight: bold; font-size: 15px;">Verifique sua caixa de entrada para obter mais informações sobre como redefinir sua senha.</p>
            <p style = "text-align: center; font-weight: bold; font-size: 15px;">O link enviado terá uma validade de 30 minutos, após esse tempo será necessário refazer o procedimento.</p>

            <br><br>

        </div>    

        <?php 

        include 'Include/Rodape.php';

        ?>

    </body>

</html>