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
    <?php include ("../js/header.php");?>

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
            <h2>Cadastro de Operadoras</h2>
              <form method="post" action="../dm/insOperadora.php">
                 <table id="tabela">       
                    <tr> 
                        <th colspan= 2 align="center">Operadora</th> 
                    </tr>
                    <tr>
                        <td>Descrição:</td>
                        <td><input type="text" name="descOperadora" size="20" placeholder="Nome da operadora." /></td>
                    </tr>
                    <tr>
                        <td>Situação:</td>
                        <td>
                            <input type="radio" name="situacao" value="0" checked /> Ativo 
                            <input type="radio" name="situacao" value="1" /> Inativo
                            <input type="radio" name="situacao" value="2" /> Cancelado                        
                        </td>
                    </tr>
                    
                    <tr>
                        <td colspan= 2 align="center"><input id="btnSubmit" type="submit" value="  Enviar  "></td>
                    </tr>
                 </table>   
              </form>
                    
            <!-- Espaço para montar uma grade com dados a serem informados --!>
            <h2>Operadoras Cadastradas</h2>
               <?php
                    $consulta = "Select cod_operadora, desc_operadora,
		                                case when situacao = 0 then 'Ativo'
		                                     when situacao = 1 then 'Inativo' 
                                             when situacao = 2 then 'Cancelada' end as situacao
                                 from operadora";
	                $resultado = mysql_query($consulta) or die("Falha na execução da consulta");
		            echo "<table border = 1 width=700>";
		                   echo "<tr>";
		                   echo "	<td><strong>Código</strong></td>";
		                   echo "	<td><strong>Operadora</strong></td>";
		                   echo "	<td><strong>Situação</strong></td>";
		                   echo "</tr>";
                	while ($linha = mysql_fetch_assoc($resultado)) 
		 	               {
		 	                    $cod_operadora  = $linha["cod_operadora"];
			                    $desc_operadora = $linha["desc_operadora"];
			                    $situacao       = $linha["situacao"];
		                   echo "<tr>";
		                   echo "	<td>$cod_operadora</td>";
		                   echo "	<td>$desc_operadora</td>";
		                   echo "	<td>$situacao</td>";
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
	      		       	  while ($linha = mysql_fetch_assoc($resultado)) 
			     	            {
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
	      			    while ($linha = mysql_fetch_assoc($resultado)) 
			     	        {
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
	      			    while ($linha = mysql_fetch_assoc($resultado)) 
			     	        {
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

