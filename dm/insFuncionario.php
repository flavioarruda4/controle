<?php
/**
 * 0 - Include no banco 
 * 1 - Recuperar dados formulario principal
 * 2 - Tratar Variaveis
 * 3 - Conectar DB
 * 4 - Selecionar DB
 * 5 - Criar Script SQL 
 * 6 - Executar script no DB
 * 7 - Retornar pagina pricipal
 * 
 */
   //0 - Include no banco
     include ("../dm/config.php");
   //1 - Recuperar dados formulario principal     
     if (isset($_POST["submit"])){
         $nome = strtoupper($_POST["nome"]);
         $matricula = $_POST["matricula"];
         $telefone = $_POST["telefone"];
         $situacao = $_POST["situacao"];
         $privilegio = $_POST["privilegio"];
         $login = strtolower($_POST["login"]);
         $senha = md5($_POST["senha"]);
         $re_senha = md5($_POST["re_senha"]);
         $email = strtolower($_POST["email"]);
         }
    //2 - Tratar Variaveis
        if ($nome == "" OR $matricula == "" OR $telefone == "" OR $situacao == "" OR $privilegio == "" OR $login == "" OR $senha == "" OR $re_senha == "" OR $email == ""){
            $msg = "Campo sem preenchimento. Verifique!";
            header("Location:../formulario/funcionario.php?m=$msg");
			
            exit;
        }
    //5 - Criar Script SQL 
    $consulta = "INSERT INTO funcionario (nome,matricula,telefone,situacao,privilegio,login,senha,email) 
                 VALUES ('$nome','$matricula','$telefone','$situacao','$privilegio','$login','$senha','$email')";
    //6 - Executar script no DB             
    $resultado = mysql_query($consulta) or die("Falha na execução da consulta");
    //7 - Retornar pagina pricipal    
    $msg = "Dados adicionados com sucesso";
    header("Location:../formulario/funcionario.php?m=$msg");
?>
	
