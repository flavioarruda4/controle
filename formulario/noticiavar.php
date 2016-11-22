<html>
<head>
    <?php  
        session_start();
            if((!isset ($_SESSION['email']) == true) and (!isset ($_SESSION['senha']) == true))
                {
	               unset($_SESSION['email']);
	               unset($_SESSION['senha']);
	               header('location:../index.html');
        	    }
        $logado = $_SESSION['email'];
    ?>
    <?php 
        include_once ("../dm/config.php"); 
        include_once ("../dm/funcoes.php");
    ?> 
    <title>Controle de Telefonia</title>
    
    <!-- Head padrão para página -->
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <link href="../css/stylein.css " rel="stylesheet" type="text/css" />
    
    <!-- Funções atreladas ao Google para exibir Calendários no campo data deste formulario -->
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.0/themes/base/jquery-ui.css">
    <link rel="stylesheet" href="/resources/demos/style.css">
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.0/jquery-ui.js"></script>

    <!-- Script para que seja exibido um calendário nos campos que estiverem setadas para que recebam class=dateTxt -->
    <script>
        $( function() {
            $(function(){$('.dateTxt').datepicker({ dateFormat: 'yy-mm-dd' }); }); 
        } );

    </script>
    <!-- Script para que seja executado um pop-up nos link's Notícias da página -->
    <script language="JavaScript">
        function abrir(URL) {
                 window.open(URL,'janela', 'width=800, height=500, top=99, left=99, scrollbars=yes,'+ 
                                           'status=no, toolbar=no, location=no, directories=no,'+ 
                                           'menubar=no, resizable=no, fullscreen=no');
                            }
    </script> 

</head>


<body>
    <h1 id="tituloPop">Controle de Telefonia</h1>
    <h5 id="tituloPop">&Uacuteltimas Noticias</h5>
	<?php
	// Extrai o valor da variável name
	$cod_noticia = $_GET["cod_noticia"];
    $consulta = "Select cod_noticia, data_noticia,convert(noticia using utf8)as noticia ,convert(descricao using utf8)as descricao from noticia where cod_noticia = $cod_noticia";    
    $resultado = mysql_query($consulta) or die("Falha na execucao da consulta");
        while ($linha = mysql_fetch_assoc($resultado)) 
		        {
                 $cod_noticia   = $linha["cod_noticia"];
                 $data_noticia  = $linha["data_noticia"];
                 $noticia = utf8_encode($linha["noticia"]);
                 $descricao = utf8_encode($linha["descricao"]);
                 
                 echo "<br /><br /><br />";   
                 echo "<table id='tabelapop'>";
                 echo "<tr>";
                 echo "     <td colspan=3>Num.: $cod_noticia</td>";
                 echo "</tr>";

                 echo "<tr>";
                 echo "     <td>Dta Noticia.: $data_noticia</td>";
                 echo "     <td>Tema.: $noticia</td>";
                 echo "</tr>";

                 echo "<tr>";
                 echo "     <td colspan=3>Detalhamento.:<br /> $descricao</td>";
                 echo "</tr>";

                 echo "</table>";
                 echo "<img id='imgRodapePop' src='../imagens/logocmb.png'>";
                }   
	?>    
</body>

</html>