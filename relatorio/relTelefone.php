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
</head>


<body>
    <h1 id="tituloPop">Controle de Telefonia</h1>
	<?php
        $consulta =" Select num_telefone, nome_usr, internet, minutagem, sms, situacao 
                     From telefone
                     Order by nome_usr desc";
        $resultado = mysql_query($consulta) or die("Falha na execucao da consulta");            
        $i = 1;
        
        echo "<table align ='center' width=700 border = 1>";
        echo "  <tr>";
        echo "     <th>Num Telefone</th>";
        echo "     <th>Nome</th>";
        echo "     <th>Internet</th>";
        echo "     <th>Minutagem</th>";
        echo "     <th>SMS</th>";
        echo "     <th>Situacao</th>";
        echo "  </tr>";
        while ($linha = mysql_fetch_assoc($resultado))
                  {
                   $num_telefone= $linha["num_telefone"];
                   $nome_usr    = $linha["nome_usr"];
                   $internet    = $linha["internet"];
                   $minutagem   = $linha["minutagem"];
                   $sms         = $linha["sms"];
                   $situacao    = $linha["situacao"];
                   echo( "<tr>
                             <td align ='center'>61$num_telefone</td>
                             <td>$nome_usr</td>
                             <td>$internet</td>
                             <td>$minutagem</td>
                             <td>$sms</td>
                             <td>$situacao</td>
                          </tr>");
                  $i++;
              }        
       echo "<img src='../imagens/logocmb.png'>"; 
    ?> 
    
</body>

</html>