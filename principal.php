<head>
    <?php  
        session_start();
        include_once ("dm/config.php");
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
    <title>Controle de Telefonia</title>
    
    <!-- Head padrão para página -->
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <link href="css/style.css" rel="stylesheet" type="text/css" />
    
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
    <img id="logotipo" src="imagens/webemail.png"></img>
    <div id="wrap">
        <!-- Título da página --!>
        <div id="header">
            <h1><a href="#">Controle de Telefonia Móvel</a></h1>
            <h2>Quem não mede, não conhece<br>
                Quem não conhece, não controla -
                Quem não controla, não melhora</h2> 
        </div>

        <!-- Conteúdo a ser apresentado --!>
        <div id="content">
            <h2><a href="#">L.S. + J.C.</a></h2>
                <center>"TODA MANHÃ NA ÁFRICA, A GAZELA SE LEVANTA.</br> ELA SABE QUE TERÁ QUE CORRER MAIS RÁPIDO DO QUE</br> O MAIS RÁPIDO DOS LEÕES OU ELA SERÁ MORTA!
                <p> TODA MANHÃ NA ÁFRICA, O LEÃO SE LEVANTA.</br>ELE SABE QUE TERÁ QUE CORRER MAIS RÁPIDO QUE A</br>MAIS LENTA DAS GAZELAS OU ELE MORRERÁ DE FOME!"</center>
                
            <h2>MORAL DA HISTÓRIA:</h2>
                <center>NÃO IMPORTA SER LEÃO OU GAZELA</br>
                AO AMANHECER SEJA O MAIS RÁPIDO!</center>
                
                    </br></br></br></br></br>
                    <h3>Atalhos para funcionalidades IntraSupermaia</h3>
    				<a href ="http://webmail.supermaia.eco.br" target="_blank">Webmail Supermaia</a></br>
                    <a href ="http://192.168.0.209/monitora" target="_blank">Monitoramento Internet - Proxy</a></br>
                    <a href ="//192.168.0.247" target="_blank">PepLink - Holding</a></br>
                    <a href ="//192.168.0.148" target="_blank">Siac Store - Principal</a></br>
                    <a href ="//192.168.0.149:8080/casi" target="_blank">Casi - OKI</a></br>
                    <a href ="//192.168.0.149:8080/siacnfe" target="_blank">Gateway Fiscal - NFCe</a></br>
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
                    <li><a href="principal.php">Página Inicial</a></li>
                       <?php
                          $consulta = "Select descricao, pagina, informacao from categoria where privilegio <= $privilegio ";
                          $resultado = mysql_query($consulta) or die("Falha na execucao da consulta");
	      		       	  while ($linha = mysql_fetch_assoc($resultado)) 
			     	            {
                                  $descricao  = $linha["descricao"];
                                  $pagina       = $linha["pagina"];
                                  $informacao       = $linha["informacao"];
					              echo "<li><a href='./formulario/$pagina'>$descricao</a></li>";
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
					        echo "<li><a href=javascript:abrir('./formulario/noticiavar.php?cod_noticia=$cod_noticia');>$noticia</a></li>";
                            }
                     ?>
                </ul>
            <!-- Documentação do trabalho --!>
            <h2>Documentação</h2>
                <ul>
                    <li><a href="./arquivos/ProjetoSemestre.pdf">Documentação</a></li>
                    <li><a href="./documentacao/documentacao.php">Tutorial da aplicação</a></li>
                </ul>

            <!-- Login / Logout --!>    
            <h2>Login / Logout</h2>
               <center> 
                    <form method="post" action="logout.php">
                        <input class="btnLogout" name="sair" type="submit" value=" Sair "/>
                    </form>
               </center>
        </div>

        <!-- Anuncios --!> 
        <div id="rightmenu"> 
            <h2>Controller</h2>
                <div style="color: #aaa; height: 340px; width: 220px; padding: 17px; font-size: 23px; font-weight: 600; text-align: center; border: 0px solid #aaa;">
                    <img src="imagens/LogoInicial.jpg" height="340px" width="220px"/>
                </div>
        </div>

        <!-- Rodape --!>
        <div style="clear: both;"> </div>
            <div id="footer"> <?php echo $design ; ?> </div>
        </div>
        </div>
</body>
</html>

