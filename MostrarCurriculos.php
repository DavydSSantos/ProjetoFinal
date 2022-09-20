<?php 

    include 'Include/Cabecalho.php';
    include 'Include/LoginMySQL.php';

?>
 

        <?php

            try
            {

                $Conexao = new PDO($DSN, $DBUser, $DBPass, array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
                $Conexao->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                $Select = $Conexao->prepare("SELECT * FROM curriculo");
                $Select->execute();
                $Select->setFetchMode(PDO::FETCH_ASSOC); 

                Echo("<br><br><br><br>");

                while($Linha = $Select->fetch())
                {

                    Echo("<form class = 'col s12' style = 'margin-top: 100px;' method = 'POST' action = 'PostMostrarCurriculos.php' id = 'form' enctype = 'multipart/form-data'>");
                    Echo("<button type = 'submit' href = 'PostMostrarCurriculos.php'>Curriculo de ".$Linha['nome']." ".$Linha["sobrenome"]."<input type = 'hidden' name = 'ID' id = 'ID' value = ".$Linha["id"]."></button><br>");

                }

                Echo("</form>");


            }
            catch(PDOException $e)
            {
                Echo "Falhou".$e->getMessage();
            }

        ?>


        <?php

            include 'Include/Rodape.php';

        ?>