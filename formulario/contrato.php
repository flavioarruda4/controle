<head>
    <?php  
        session_start();
        include_once ("../dm/config.php");
        if((!isset ($_SESSION['email']) == true) and (!isset ($_SESSION['senha']) == true))
                {
	               unset($_SESSION['email']);
	               unset($_SESSION['senha']);
	               header('location:../index.html');
        	    }
        switch ($_SESSION['privilegio']){
             case 1: 
                    $descPerfil = "Operação";
                    unset($_SESSION['email']);
                    unset($_SESSION['senha']);
                    header('location:../index.html');
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
    <img id="logotipo" src="../imagens/webemail.png"></img>
    <div id="wrap">
        <!-- Título da página --!>
        <div id="header">
            <h1><a href="#">Controle de Telefonia Móvel</a></h1>
            <h2>Quem não mede, não conhece<br>
                Quem não conhece, não controla -
                Quem não controla, não melhora</h2> 
        </div>
         <div id="mensa">
		    <?php
				if(isset($_GET['m'])){
					echo $_GET['m'];
			    	}
            ?>
		 </div>	
        <!-- Conteúdo a ser apresentado --!>
        <div id="content">
            <!-- Espaço para Formularios --!>
            <h2>Cadastro de Contratos</h2>
              <form method="post" action="../dm/insContrato.php">
                 <table id="tabela">       
                    <tr> 
                        <th colspan= "5" align="center">Contratos</th> 
                    </tr>
                    <tr>
                        <td>Nº Contrato:</td>
                        <td><input type="text" name="cod_contrato" size="10" disabled /></td>
                        <td> </td>
                        <td>Dta cadastro:</td>
                        <td><input type="text" name="data_lanca" size="10" disabled /></td>
                    </tr>

                    <tr>
                        <td>Operadora:</td>
                        <td>
   		                    <select name="cod_operadora">
                                <?php
                                     $consulta = "Select cod_operadora, desc_operadora FROM operadora Where situacao = 0 Order by desc_operadora";
                                     $resultado = mysql_query($consulta) or die("Falha na execução da consulta");
                                     while ($linha = mysql_fetch_array($resultado))
                                              {
                                               $cod_operadora  = $linha["cod_operadora"];
                                               $desc_operadora = $linha["desc_operadora"];
                                               echo  "<option name =cod_operadora selected value=$cod_operadora> $cod_operadora - $desc_operadora  </option>";
                                     }
                                ?>
                            </select>                        
                        </td>
                        <td> </td>
                        <td>Dta Inicial(Contrato):</td>
                        <td><input class="dateTxt" type="text" name="data_inicial_contrato" size="10" /></td>
                    </tr>                    
                    <tr>
                        <td>Situação:</td>
					    <td>
					       <select name="situacao">
					           <option name="situacao" value=0>Ativo</option>
					           <option name="situacao" value=1>Inativo</option>
                               <option name="situacao" value=2>Cancelado</option>
					       </select>					                 
					    </td>                            
                        <td> </td>
                        <td>Dta Final(Contrato):</td>
                        <td><input class="dateTxt" type="text" name="data_final_contrato" size="10" /></td>
                    </tr>
                    <tr>
                        <td>Custo Megabyte(R$):</td>
                        <td><input class="valores" type="text" name="valor_mb" size="10" /></td>
                        <td> </td>
                        <td>Custo Sms(R$):</td>
                        <td><input type="text" name="valor_sms" size="10" /></td>
                    </tr>
                    <tr>
                        <td>Custo Minutagem - excedente(R$):</td>
                        <td><input type="text" name="valor_minutagem" size="10" /></td>
                        <td> </td>
                        <td>Minutos Compartilhados:</td>
                        <td><input type="text" name="min_compartilhados" size="10" /></td>
                    </tr>
                    <tr>
                        <td colspan=5 align="center"><input name="submit" id="btnSubmit" type="submit" value="  Enviar  "/></td>
                    </tr>
                 </table>   
              </form>
                    
            <!-- Espaço para montar uma grade com dados a serem informados --!>
            <h2>Contratos</h2>
	           <?php
                    $consulta = "Select c.cod_contrato, c.data_lanca,
                                        case when c.situacao = 0 then 'Ativo'
		                                  when c.situacao = 1 then 'Inativo' 
                                          when c.situacao = 2 then 'Cancelada' end as situacao,
                                        o.desc_operadora, c.data_inicial_contrato , c.data_final_contrato
                                 From contrato c  
                                 Left join operadora o on o.cod_operadora = c.cod_operadora
                                 ";
	                $resultado = mysql_query($consulta) or die("Falha na execução da consulta");
		            echo "<table border = 1 width=700>";
		                   echo "<tr>";
		                   echo "	<td><strong>Código</strong></td>";
		                   echo "	<td><strong>Dta Lança</strong></td>";
		                   echo "	<td><strong>Situação</strong></td>";
                           echo "	<td><strong>Operadora</strong></td>";
                           echo "	<td><strong>Dta Inicial</strong></td>";
                           echo "	<td><strong>Dta Final</strong></td>";
		                   echo "</tr>";
                	while ($linha = mysql_fetch_assoc($resultado)) 
		 	               {
		 	                    $cod_contrato = $linha["cod_contrato"];
			                    $data_lanca   = $linha["data_lanca"];
			                    $situacao     = $linha["situacao"];
                                $operadora    = $linha["desc_operadora"];
                                $data_inicial = $linha["data_inicial_contrato"];
                                $data_final   = $linha["data_final_contrato"];
		                   echo "<tr>";
		                   echo "	<td>$cod_contrato</td>";
		                   echo "	<td>$data_lanca</td>";
                           echo "	<td>$situacao</td>";
		                   echo "	<td>$operadora</td>";
                           echo "	<td>$data_inicial</td>";
                           echo "	<td>$data_final</td>";
		                   echo "</tr>";
			               }
                    echo "</table>";                    
               ?>        
        </div>

        <!-- Menu a apresentar e ultimas noticias sobre site --!>
        <div id="leftmenu"> 
            <!-- Menu --!>
            <h2>Usu&aacuterio Conectado</h2>
               <ul>
                   <li><?php echo "<h4><a href=#>Bem vindo ! ($logado)<br />$descPerfil</a><h4>";?></li>
               </ul>           
            <h2>Categorias</h2>
                <ul>
                    <li><a href="../principal.php">Página Inicial</a></li>
                       <?php
                          $consulta = "Select descricao, pagina, informacao from categoria where privilegio <= $privilegio ";
                          $resultado = mysql_query($consulta) or die("Falha na execucao da consulta");
	      		       	  while ($linha = mysql_fetch_assoc($resultado)){
                                  $descricao  = $linha["descricao"];
                                  $pagina       = $linha["pagina"];
                                  $informacao       = $linha["informacao"];
					              echo "<li><a href='$pagina'>$descricao</a></li>";
                                }
                        ?>
                </ul>
                
            <!-- Noticias --!>    
            <h2>Últimas noticias</h2>
                <ul>
      				<?php
					    $consulta = "Select data_noticia, noticia,cod_noticia from noticia order by data_noticia desc limit 3";
                        $resultado = mysql_query($consulta) or die("Falha na execucao da consulta");
	      			    while ($linha = mysql_fetch_assoc($resultado)){
                            $data_noticia  = $linha["data_noticia"];
                            $noticia       = utf8_encode($linha["noticia"]);
                            $cod_noticia   = $linha["cod_noticia"];
					        echo "<li><a href=javascript:abrir('noticiavar.php?cod_noticia=$cod_noticia');>$noticia</a></li>";
                            }
                     ?>
                </ul>  
                              
            <!-- Documentação do trabalho --!>
            <h2>Documentação</h2>
                <ul>
       				<?php
					    $consulta = "Select descricao,endereco from documentacao order by cod_documentacao";
                        $resultado = mysql_query($consulta) or die("Falha na execucao da consulta");
	      			    while ($linha = mysql_fetch_assoc($resultado)){
                            $descricao       = utf8_encode($linha["descricao"]);
                            $endereco       = utf8_encode($linha["endereco"]);
					        echo "<li><a href='$endereco' target='_blank'> $descricao</a></li>";
                            }
                     ?>                
                </ul>

            <!-- Login / Logout --!>    
            <h2>Login / Logout</h2>
               <center> 
                    <form method="post" action="../logout.php">
                        <input class="btnLogout" name="sair" type="submit" value=" Sair "/>
                    </form>
               </center>
        </div>

        <!-- Rodape --!>
        <div style="clear: both;"> </div>
            <div id="footer"> <?php echo $design ; ?> </div>
        </div>
</body>
</html>

