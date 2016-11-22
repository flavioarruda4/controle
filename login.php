<?php
    session_start();
	$login = $_POST["email"];
	$pass = md5($_POST["pass"]);
	$connect = mysql_connect('localhost','admin','facil123');
	$db = mysql_select_db('controle',$connect);
    $consulta = "select * from funcionario where email = '$login' and situacao = 0";
    $resultado = mysql_query($consulta) or die("Falha na execucao da consulta");
    $linha = mysql_fetch_assoc($resultado);
    if ($pass == $linha["senha"]) {
        //Caso a senha esteja correta com verificação do md5
        if (mysql_num_rows ($resultado)> 0){
            $_SESSION['email']      = $login;
            $_SESSION['senha']      = $pass;
            $_SESSION['privilegio'] = $linha["privilegio"];
            $_SESSION['login']      = $linha["login"];
            $_SESSION['design']     = " Desenvolvido Grupo Aplica&ccedil&otildees Web ";
		    header("Location:principal.php");
        }else{
           unset ($_SESSION['email']);
           unset ($_SESSION['senha']);
           unset ($_SESSION['privilegio']);
           unset ($_SESSION['design']);
           echo "<script language='javascript' type='text/javascript'> alert('Login e/ou senha incorretos'); window.location.href='index.html';</script>";
           die();        
        }
    }else{
        //caso senha esteja incorreta com verificação do md5
        unset ($_SESSION['email']);
        unset ($_SESSION['senha']);
        unset ($_SESSION['privilegio']);
        unset ($_SESSION['design']);
        echo "<script language='javascript' type='text/javascript'> alert('Login e/ou senha incorretos'); window.location.href='index.html';</script>";
        die();        
    }    
?>
