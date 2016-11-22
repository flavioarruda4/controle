<?php
	$conecta = @mysql_connect('localhost','admin','facil123') or die (mysql_error());
	$selBanco = mysql_select_db('controle') or die (mysql_error());
?>

