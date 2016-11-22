<html>
<head>
    <?php 
        include_once ("../dm/config.php"); 
        include_once ("../dm/funcoes.php");
        
        session_start();
            if((!isset ($_SESSION['email']) == true) and (!isset ($_SESSION['senha']) == true))
                {
	               unset($_SESSION['email']);
	               unset($_SESSION['senha']);
	               header('location:../index.html');
        	    }
        $logado = $_SESSION['email'];        
    ?> 
    <title>Controle de Telefonia</title>
    <?php include ("../js/header.php");?>
</head>

<body>
    <h1 id="tituloPop">Controle de Telefonia</h1>
    <h5 id="tituloPop">Altera&ccedil&otildees de Funcion&aacuterio</h5>
   

	<?php
		if(isset($_GET['m'])){
				echo $_GET['m'];
		}
	// Extrai o valor da variável name
	$cod_noticia = $_GET["cod_noticia"];
    $consulta = "Select * from noticia where cod_noticia = $cod_noticia ";    
    $resultado = mysql_query($consulta) or die("Falha na execucao da consulta");
        while ($linha = mysql_fetch_assoc($resultado)) 
		        {
                 $cod_noticia  = $linha["cod_noticia"];
                 $data_noticia = $linha["data_noticia"];
                 $noticia = utf8_encode($linha["noticia"]);
                 $descricao = utf8_encode($linha["descricao"]);

                 echo "<form method='post' action='../dm/updNoticia.php?cod_noticia=$cod_noticia'>";                                  
                 echo "<br /><br /><br />";   
                 echo "<table  border = 1 id='tabelapop'>";
                 
                 echo "<tr>";
                 echo "  <td colspan=1>Id.:$cod_noticia<input type=hidden name=cod_noticia value=$cod_noticia></td>";
                 echo "  <td colspan=4>Dta Noticia.: $data_noticia<input type=hidden name=data_noticia value=$data_noticia></td>";
                 echo "</tr>";
                 
                 echo "   <tr>";
                 echo "       <td>Resumo:</td>";
                 echo "       <td><textarea name='noticia' rows='3' cols='65' onkeypress=LimiteTema()' />$noticia </textarea></td>
                              <td> </td>";
                 echo "   </tr>";                 

                 echo "   <tr>";
                 echo "       <td>Detalhamento:</td>";
                 echo "       <td><textarea name='descricao' rows='4' cols='65' onkeypress='LimiteDetalhamento()' /> $descricao </textarea><td>";
                 echo "   </tr>";                 

                 echo "<tr>";
                 echo "     <td colspan=8 align=center><input name='submit' id='btnSubmit'  type='submit' value='  Alterar Noticia  ' /></td>";
                 echo "</tr>";
                 echo "</table>";
                 echo "</form>";
                 echo "<img id='imgRodapePop' src='../imagens/logocmb.png'>";
                }
	?> 
</body>

</html>