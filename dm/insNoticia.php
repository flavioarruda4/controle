<?php
     include ("../dm/config.php");
     if (isset($_POST["noticia"]))
        {
         $noticia = utf8_encode($_POST["noticia"]);
         $detalhamento = utf8_encode($_POST["detalhamento"]);
         }
		 if ($noticia == "" OR $detalhamento == ""){
            $msg = "<p>Campo sem preenchimento. Verifique!</p>";
            header("Location:../formulario/noticia.php?m=$msg");
			
            exit;
         }         
         $consulta = "Insert into noticia(noticia,descricao) values ('$noticia','$detalhamento')";
         $resultado = mysql_query($consulta) or die("Falha na execução da consulta");
         echo "Dados adicionados com sucesso";
?>
<?php header("Location:../formulario/noticia.php"); ?>	
