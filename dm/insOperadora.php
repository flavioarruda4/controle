<?php
     include ("../dm/config.php");
     if (isset($_POST["descOperadora"]))
        {
         $desc_operadora  = strtoupper($_POST["descOperadora"]);
         $situacao        = $_POST["situacao"];
         }
		 if ($desc_operadora == "" OR $situacao == ""){
            $msg = "<p>Campo sem preenchimento. Verifique!</p>";
            header("Location:../formulario/operadora.php?m=$msg");
			
            exit;
         }		 
         $consulta = "INSERT INTO operadora (desc_operadora, situacao) 
                      VALUES ('$desc_operadora','$situacao')";
         $resultado = mysql_query($consulta) or die("Falha na execução da consulta");
         echo "Dados adicionados com sucesso";
?>
<?php header("Location:../formulario/operadora.php"); ?>	
