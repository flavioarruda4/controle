<html>
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
            <h2>Cadastro de Funcionários</h2>
              <form method="post" action="../dm/insFuncionario.php">
                 <table id="tabela">       
                    <tr> 
                        <th colspan="5" align="center">Cadastro</th> 
                    </tr>
                    <tr>
                        <td>Código:</td>
                        <td><input type="text" name="cod_funcionarios" size="5" disabled /></td>
                        <td> </td>
                        <td>Dta Cadastro:</td>
                        <td><input type="text" name="data_cadastro" size="10" disabled /></td>
                    </tr>
                    <tr>
                        <td>Matricula:</td>
                        <td><input type="text" name="matricula" size="10" /></td>
                        <td> </td>
                        <td>Situação:</td>
                        <td>
					       <select name="situacao">
					           <option name="situacao" value=0>Ativo</option>
					           <option name="situacao" value=1>Inativo</option>
                               <option name="situacao" value=2>Cancelado</option>
					       </select>                      
                        </td>
                    </tr>
                    <tr>
                        <td>Nome:</td>
                        <td><input type="text" name="nome" size="50" /></td>
                        <td> </td>
                        <td>Telefone:</td>
                        <td><input type="text" name="telefone" size="10" /></td>
                    </tr>
                 </table>
                 <br />
                 <table id="tabela" >       
                    <tr> <th colspan="8" align="center">Acesso ao Sistema</th> </tr>
                    <tr>
                        <td>Email:</td>
                        <td><input type="text" name="email" size="40" /></td>
                        <td> </td>
                        <td>Login:</td>
                        <td><input type="text" name="login" size="10" /></td>
                        <td> </td>
                        <td>Privilégio:</td>
                        <td>
					       <select name="privilegio">
					           <option name="privilegio" value=1>Operacional</option>
					           <option name="privilegio" value=2>Gerencial</option>
                               <option name="privilegio" value=3>Estratégico</option>
					       </select>                      
                        </td>
                    </tr>
                    <tr>
                        <td>Senha:</td>
                        <td><input type="password" name="senha" size="10" placeholder="Digite senha"/></td>
                        <td> </td>
                        <td>Re-senha:</td>
                        <td><input type="password" name="re_senha" size="10" placeholder="Re-Digite senha" /></td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>                    
                 </table>
                 <br />
                 <table id="tabela">
                    <tr align=center>
                        <td colspan= 2> <input name="submit" id="btnSubmit"  type="submit" value="  Enviar  " /> </td>
                    </tr>
                 </table>
              </form>
                   
            <!-- Espaço para montar uma grade com dados a serem informados --!>
            <h2>Funcionários Cadastrados</h2>
	           <?php
                   
                   $sql = "SELECT * FROM `conta_online6-7_2016` WHERE `Tel` LIKE \'%58%\'";
                    
                    $consulta = "Select cod_funcionario,nome,matricula,
                            	 telefone,data_cadastro,email,
                                 case when situacao = 0 then 'Ativo'
		                              when situacao = 1 then 'Inativo' 
                                      when situacao = 2 then 'Cancelada' end as situacao
                                 From funcionario";
	                $resultado = mysql_query($consulta) or die("Falha na execução da consulta");
		            echo "<table border = 1 width=700>";
		                   echo "<tr>";
		                   echo "	<td><strong>Código</strong></td>";
		                   echo "	<td><strong>nome</strong></td>";
		                   echo "	<td><strong>matricula</strong></td>";
                           echo "	<td><strong>email</strong></td>";
                           echo "	<td><strong>situação</strong></td>";
                           echo "	<td><strong>Operações</strong></td>";
		                   echo "</tr>";
                	while ($linha = mysql_fetch_assoc($resultado)) 
		 	               {
		 	                    $cod_funcionario = $linha["cod_funcionario"];
			                    $nome            = $linha["nome"];
			                    $matricula       = $linha["matricula"];
                                $data_cadastro   = $linha["data_cadastro"];
                                $email           = $linha["email"];
                                $situacao        = $linha["situacao"];
		                   echo "<tr>";
		                   echo "	<td>$cod_funcionario</td>";
		                   echo "	<td>$nome</td>";
		                   echo "	<td>$matricula</td>";
                           echo "	<td>$email</td>";
                           echo "	<td>$situacao</td>";
                           echo "   <td align=center><a href=javascript:abrir('funcionariovar.php?cod_funcionario=$cod_funcionario');> editar</a></td>";
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

