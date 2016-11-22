<?php
   //0 - Include no banco
     date_default_timezone_set('America/Sao_Paulo');
     include ("../dm/config.php");
   //1 - Recuperar dados formulario principal     
     if (isset($_POST["submit"])){
        // $cod_funcionario =     $_GET["cod_funcionario"];
         $cod_noticia  = $_POST["cod_noticia"];
         $data_noticia = $_POST["data_noticia"];
         $noticia      = $_POST["noticia"];
         $descricao    = $_POST["descricao"];

         }
    //2 - Tratar Variaveis
        $data_noticia = date('Y-m-d H:i');
        if ($noticia == " "){
            $msg = "Campo sem preenchimento(Noticia). Verifique!";
            header("Location:../formulario/noticiaalt.php?cod_noticia=$cod_noticia&m=$msg");
            exit();
        }
        if ($descricao == " "){
            $msg = "Campo sem preenchimento(Detalhamento). Verifique!";
            header("Location:../formulario/noticiaalt.php?cod_noticia=$cod_noticia&m=$msg");
            exit();
        }
               
    //5 - Criar Script SQL 
    $consulta = "Update noticia set 
                    data_noticia='$data_noticia',
                    noticia='$noticia',
                    descricao='$descricao'
                    Where cod_noticia = $cod_noticia";
    echo $consulta;
    //6 - Executar script no DB             
    $resultado = mysql_query($consulta) or die("Falha na execução da consulta");
    //7 - Retornar pagina pricipal    
    $msg = "Dados alterados com sucesso";
    echo "<script> window.close()</script>";
    
?>
	
