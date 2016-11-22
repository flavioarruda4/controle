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
</head>

<body>
    <div id="mensa">
	   <?php
			if(isset($_GET['m'])){
				echo $_GET['m'];
			}
	   ?>
	</div>	
         
    <h1 id="tituloPop">Controle de Telefonia</h1>
    <h5 id="tituloPop">Altera&ccedil&otildees de Funcion&aacuterio</h5>
	<?php
	// Extrai o valor da variável name
	$cod_funcionario = $_GET["cod_funcionario"];
    $consulta = "Select * from funcionario where cod_funcionario = $cod_funcionario ";    
    $resultado = mysql_query($consulta) or die("Falha na execucao da consulta");
        while ($linha = mysql_fetch_assoc($resultado)) 
		        {
                 $cod_funcionario  = $linha["cod_funcionario"];
                 $nome = $linha["nome"];
                 $matricula = $linha["matricula"];
                 $telefone = $linha["telefone"];
                 $situacao = $linha["situacao"];
                 
                 $privilegio = $linha["privilegio"];
                 $login = $linha["login"];
                 $senha = $linha["senha"];
                 $email = $linha["email"];
                 echo "<form method='post' action='../dm/updFuncionario.php?cod_funcionario=$cod_funcionario'>";                                  
                 echo "<br /><br /><br />";   
                 echo "<table id='tabelapop'>";
                 echo "<tr>";
                 echo "     <td colspan=3>Cod. Func.:<input type='text' size=3 value=$cod_funcionario disabled />
                            <input type=hidden name=cod_func value=$cod_funcionario>
                            <input type=hidden name=login value=$login>
                            </td>";
                 echo "     <td colspan=3>Nome.: $nome
                            <input type=hidden name=nome value=$nome>
                            </td>";
                 echo "     <td colspan=3>Matricula.: $matricula
                            <input type=hidden name=matricula value=$matricula>
                            </td>";
                 echo "</tr>";

                 echo "<tr>";
                 echo "     <td colspan=8 align=center>  </td>";
                 echo "</tr>";
                 
                 echo "<tr>";
                 echo "     <td colspan=4>Telefone.:<input type='text' name='telefone' size=8 value=$telefone></td>";
                 echo "     <td colspan=4>
                            Situacao.:
     					       <select name='situacao'>
                                   <option name='situacao' > - </option>
                                   <option name='situacao' value=0>Ativo</option>
    					           <option name='situacao' value=1>Inativo</option>
                                   <option name='situacao' value=2>Cancelado</option>
    					       </select>                   
                            </td>";
                 echo "</tr>";                 

                 echo "<tr>";
                 echo "     <td colspan=4>
                            Privilegio.:
     					       <select name='privilegio'>
                                   <option name='privilegio' > - </option> 
                                   <option name='privilegio' value=1>Operacional</option>
    					           <option name='privilegio' value=2>Gerencial</option>
                                   <option name='privilegio' value=3>Estrat&eacutegico</option>
    					       </select>                            
                            </td>";
                 echo "     <td colspan=4>Email.:<input type='text' name='email' size=30 value=$email></td>";
                 
                 echo "</tr>";

                 echo "<tr>";
                 echo "     <td colspan=4>Senha.:<input type='password' name='senha' size=35 value=$senha></td>";
                 echo "     <td colspan=4>Resenha.:<input type='password' name='resenha' size=35 ></td>";
                 echo "</tr>";

                 echo "<tr>";
                 echo "     <td colspan=8 align=center><input name='submit' id='btnSubmit'  type='submit' value='  Alterar Cadastro  ' /></td>";
                 echo "</tr>";
                 echo "</table>";
                 echo "</form>";
                 echo "<img id='imgRodapePop' src='../imagens/logocmb.png'>";
                }   
	?> 
</body>

</html>