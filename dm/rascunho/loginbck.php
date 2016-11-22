<?php
    session_start();
	$login = $_POST["email"];
	$entrar = $_POST["entrar"];
	$pass = $_POST["pass"];
	$connect = mysql_connect('localhost','admin','facil123');
	$db = mysql_select_db('controle');
	if ( isset ($entrar) ){
	$verifica = mysql_query("Select * from funcionario where email = '$login' and senha ='$pass'")
				or die ("Falha na execucao da consulta");
	$linha = mysql_fetch_assoc($verifica);
		if ( mysql_num_rows ($verifica)<= 0 ){
            unset ($_SESSION['email']);
            unset ($_SESSION['senha']);
            unset ($_SESSION['privilegio']);
            unset ($_SESSION['design']);
            echo "<script language='javascript' type='text/javascript'> alert('Login e/ou senha incorretos'); window.location.href='index.html';</script>";
            die();
			}
		else{
            $_SESSION['email']      = $login;
            $_SESSION['senha']      = $pass;
            $_SESSION['privilegio'] = $linha["privilegio"];
            $_SESSION['design']     = " Desenvolvido Grupo Aplica&ccedil&otildees Web ";
		header("Location:principal.php");
		}
	}
?>
