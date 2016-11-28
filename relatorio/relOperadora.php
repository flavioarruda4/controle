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

    <title>Controle de Telefonia</title>
    
    <!-- Head padrão para página -->
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <link href="../css/stylein.css " rel="stylesheet" type="text/css" />
    
    <!-- Funções atreladas ao Google para exibir Calendários no campo data deste formulario -->
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.0/themes/base/jquery-ui.css">
    <link rel="stylesheet" href="/resources/demos/style.css">
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.0/jquery-ui.js"></script>
</head>


<body>
    <h1 id="tituloPop">Controle de Telefonia</h1>
	<?php
        $consulta =" Select cod_operadora, desc_operadora, situacao
                     From operadora
                     Order by desc_operadora desc";
        $resultado = mysql_query($consulta) or die("Falha na execucao da consulta");            
        $i = 1;
        
        echo "<table align ='center' width=700 border = 1>";
        echo "  <tr>";
        echo "     <th>Id</th>";
        echo "     <th>Operadora</th>";
        echo "     <th>Situacao</th>";
        echo "  </tr>";
        while ($linha = mysql_fetch_assoc($resultado))
                  {
                   $cod_operadora  = $linha["cod_operadora"];
                   $desc_operadora = $linha["desc_operadora"];
                   $situacao       = $linha["situacao"];
                   echo( "<tr>
                             <td>$cod_operadora</td>
                             <td>$desc_operadora</td>
                             <td>$situacao</td>
                          </tr>");
                  $i++;
              }        
       echo "<img src='../imagens/logocmb.png'>"; 
    ?> 
    
</body>

</html>