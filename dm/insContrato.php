<?php
     include ("../dm/config.php");
     if (isset($_POST["submit"]))
        {
         $cod_operadora       = $_POST["cod_operadora"];
         $data_inicial_contrato  = $_POST["data_inicial_contrato"];
         $situacao            = $_POST["situacao"];
         $data_final_contrato = $_POST["data_final_contrato"];
         $valor_mb            = $_POST["valor_mb"];
         $valor_sms           = $_POST["valor_sms"];
         $valor_minutagem     = $_POST["valor_minutagem"];
         $min_compartilhados  = $_POST["min_compartilhados"];

         }
		 if ($valor_mb == "" OR $valor_sms == "" OR $valor_minutagem == "" OR $situacao == "" OR $min_compartilhados == "" OR $data_inicial_contrato == "" OR $data_final_contrato == ""){
            $msg = "<p>Campo sem preenchimento. Verifique!</p>";
            header("Location:../formulario/contrato.php?m=$msg");
			
            exit;
         }         
         $consulta = "INSERT INTO contrato (cod_operadora,data_inicial_contrato,data_final_contrato,valor_mb,valor_sms,valor_minutagem,min_compartilhados,situacao) 
                      VALUES ('$cod_operadora','$data_inicial_contrato','$data_final_contrato','$valor_mb','$valor_sms','$valor_minutagem','$min_compartilhados','$situacao')";
         $resultado = mysql_query($consulta) or die("Falha na execução da consulta");
         echo "Dados adicionados com sucesso";
?>
<?php header("Location:../formulario/contrato.php"); ?>	
