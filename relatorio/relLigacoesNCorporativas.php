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
    <!-- Espaço para Formularios --!>
          <form method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">
               <input type="radio" name="sel_telefone" value="0" checked /> Num Telefone 
               <input type="radio" name="sel_telefone" value="1" /> Usu&aacuterio<br />
               <input type="text" name="usuario" size=35 placeholder="Selecione tipo de pesquisa e insira texto "/><br />
               
               De:<input class="dateTxt" type="text" name="de" size="10" />
               At&eacute:<input class="dateTxt" type="text" name="ate" size="10" />
               
               <input type="submit" value="  Pesquisar " />
          </form>           

        <?php
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                    $name    = $_REQUEST['usuario'];
                    $selecao = $_REQUEST['sel_telefone'];
                    $de = $_REQUEST['de'];
                    $ate = $_REQUEST['ate'];
                    
                    $consulta = "select c.*, o.descricao from conta_online c 
                                 Left join operadora o on o.cod_operadora = c.cod_operadora  
                                 Where c.data between '$de' and '$ate' and c.num_telefone not in (select num_telefone from telefone) 
                                 and num_discado is not null and valor > 0 
                                 and c.num_telefone = '61993335893'
                                 ";
                    
                    if ($name == " "){
                        echo "Sem critérios de pesquisa";
                    }else{
                        
                        
                        
                    }
                    
                                     
                }
        ?>

</body>

</html>