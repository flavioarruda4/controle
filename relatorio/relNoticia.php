<html>
<head>
    <?php  
        session_start();
        include_once ("../dm/config.php");
        include_once ("../dm/funcoes.php");
        if((!isset ($_SESSION['email']) == true) and (!isset ($_SESSION['senha']) == true))
                {
	               unset($_SESSION['email']);
	               unset($_SESSION['senha']);
	               header('location:index.html');
        	    }
        $logado = ucfirst($_SESSION['login']);
        switch ($_SESSION['privilegio']){
             case 1: 
                    $descPerfil = "Operação";
                    break;
             case 2: 
                    $descPerfil = "Gerencial";
                    break;
             case 3: 
                    $descPerfil = "Estratégico";
                    break;                                                                        
        }
        $logado     = ucfirst($_SESSION['login']);
        $design     = $_SESSION['design'];
        $privilegio = $_SESSION['privilegio']; 
    ?> 
    <?php include ("../js/header.php");?>
    <title>Controle de Telefonia</title>
    <!-- Script para que seja exibido um calendário nos campos que estiverem setadas para que recebam class=dateTxt -->
    <script>
        $( function() {
            $(function(){$('.dateTxt').datepicker({ dateFormat: 'yy-mm-dd' }); }); 
        } );

    </script>    

</head>

<body>
    <h1 id="tituloPop">Controle de Telefonia</h1>
	<?php
        $consulta ="
                     Select cod_noticia,data_noticia,
                            convert(noticia using utf8)as noticia, convert(descricao using utf8)as descricao
                     From noticia 
                     Order by data_noticia desc
                   ";
        $resultado = mysql_query($consulta) or die("Falha na execucao da consulta");            
        $i = 1;
        
        echo "<table align ='center' width=700 border = 1>";
        echo "  <tr>";
        echo "     <th>Id</th>";
        echo "     <th>Dta Noticia</th>";
        echo "     <th>Noticia</th>";
        echo "     <th>Detalhamento</th>";
        echo "  </tr>";
        while ($linha = mysql_fetch_assoc($resultado))
                  {
                   $cod_noticia  = $linha["cod_noticia"];
                   $data_noticia = $linha["data_noticia"];
                   $noticia      = utf8_encode($linha["noticia"]);
                   $descricao    = utf8_encode($linha["descricao"]);
                   echo( "<tr>
                             <td width = 6 align ='center'>$cod_noticia</td>
                             <td width = 8>$data_noticia</td>
                             <td width = 45>$noticia</td>
                             <td width = 60>$descricao</td>
                          </tr>");
                  $i++;
              }        
       echo "<img src='../imagens/logocmb.png'>"; 
    ?> 
    
</body>

</html>