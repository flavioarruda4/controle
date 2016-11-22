<?php
   //0 - Include no banco
     include ("../dm/config.php");
   //1 - Recuperar dados formulario principal     
     if (isset($_POST["submit"])){
        // $cod_funcionario =     $_GET["cod_funcionario"];
         $cod_funcionario =     $_POST["cod_func"];
         $matricula = $_POST["matricula"];
         $telefone = $_POST["telefone"];
         $situacao = $_POST["situacao"];
         $privilegio = $_POST["privilegio"];
         $login = strtolower($_POST["login"]);
         $senha = md5($_POST["senha"]);
         $re_senha = md5($_POST["resenha"]);
         $email = strtolower($_POST["email"]);
         }
    //2 - Tratar Variaveis
        if ($situacao == "-"){
            $msg = "Campo sem preenchimento(situacao). Verifique!";
            header("Location:../formulario/funcionariovar.php?cod_funcionario=$cod_funcionario&m=$msg");
            exit();
        }
        if ($privilegio == "-"){
            $msg = "Campo sem preenchimento(privilegio). Verifique!";
            header("Location:../formulario/funcionariovar.php?cod_funcionario=$cod_funcionario&m=$msg");
            exit();
        }
        if ($senha != $re_senha){
            $msg = "Senhas diferentes favor Verifique!";
            header("Location:../formulario/funcionariovar.php?cod_funcionario=$cod_funcionario&m=$msg");
            exit();
        }                
    //5 - Criar Script SQL 
    $consulta = "Update funcionario set 
                    telefone='$telefone',
                    situacao=$situacao,
                    privilegio=$privilegio,
                    senha='$senha',
                    email='$email'
                    Where cod_funcionario = $cod_funcionario";
    //6 - Executar script no DB             
    $resultado = mysql_query($consulta) or die("Falha na execução da consulta");
    //7 - Retornar pagina pricipal    
    $msg = "Dados alterados com sucesso";
    echo "<script> window.close()</script>";
    
?>
	
