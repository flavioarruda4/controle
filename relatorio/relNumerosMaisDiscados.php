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
        <h5 id="tituloPop">Maior numero de Liga&ccedil&otildees </h5>
    <!-- Espaço para Formularios --!>
          <br />
          <form method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">
               <table id="tabelapop">
                    <tr>
                        <th colspan="2">Tipo de pesquisa</th>
                    </tr>

                    <tr>
                        <td>M&ecircs:</td>
                        <td>
                            <select name="mes"> 
                               <?php
                                  $consulta = "Select distinct mes from conta_online";
                                  $resultado = mysql_query($consulta) or die("Falha na execucao da consulta");
        	      		       	  while ($linha = mysql_fetch_assoc($resultado)) 
        			     	            { $mes       = $linha["mes"];
                                          switch ($mes) {
                                               case 1:
                                                    $desc_mes ="Janeiro";
                                                    break;
                                               case 2:
                                                    $desc_mes ="Fevereiro";
                                                    break;                                                        
                                               case 3:
                                                    $desc_mes ="Março";
                                                    break;
                                               case 4:
                                                    $desc_mes ="Abril";
                                                    break;
                                               case 5:
                                                    $desc_mes ="Maio";
                                                    break;
                                               case 6:
                                                    $desc_mes ="Junho";
                                                    break;
                                               case 7:
                                                    $desc_mes ="Julho";
                                                    break;
                                               case 8:
                                                    $desc_mes ="Agosto";
                                                    break;
                                               case 9:
                                                    $desc_mes ="Setembro";
                                                    break;
                                               case 10:
                                                    $desc_mes ="Outubro";
                                                    break;
                                               case 11:
                                                    $desc_mes ="Novembro";
                                                    break;
                                               case 12:
                                                    $desc_mes ="Dezembro";
                                                    break;                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                         
                                          }  
        					              echo "<option name=mes value=$mes>$desc_mes</option>";
                                        }
                                ?>                                
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td>Ano:</td>
                        <td>
                            <select name="ano"> 
                               <?php
                                  $consulta = "Select distinct ano from conta_online";
                                  $resultado = mysql_query($consulta) or die("Falha na execucao da consulta");
        	      		       	  while ($linha = mysql_fetch_assoc($resultado)) 
        			     	            { $ano       = $linha["ano"];
        					              echo "<option name=ano value =$ano>$ano</option>";
                                        }
                                ?>                                
                            </select>
                        </td>
                    </tr>
                    <tr> <td colspan="2" align="center"><input type="submit" value="  Pesquisar " /></td> </tr>                                                  
               </table>
          </form>           

        <?php
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                    $mes = $_REQUEST['mes'];
                    $ano = $_REQUEST['ano'];
                    $consulta = "select c.num_telefone , t.nome_usr, c.num_discado, count(c.num_telefone)as qtd \n 
                                 from conta_online c \n  
                                 Left join telefone t on t.num_telefone = c.num_telefone \n
                                 ";  
                    if ($mes == " "){
                        echo "Campo Obrigatorio nao preenchido!";
                    }else{
                      $consulta = $consulta." 
                                 where c.mes = $mes and c.ano = $ano and c.num_discado is not null and c.num_discado <> ''
                                 Group by c.num_telefone, t.nome_usr, c.num_discado
                                 Order by count(c.num_telefone) desc"; 
                      $resultado = mysql_query($consulta) or die("Falha na execucao da consulta");
                     // echo $consulta;
                      $i = 1;
                      
                      echo "<br /><br /><br /><br /><br /><br /><br /><br /><br /><br />";
                      echo "<table align ='center' width=700 border = 1>";
                      echo "  <tr>";
                      echo "     <th>Num Telefone</th>";
                      echo "     <th>Usuario</th>";
                      echo "     <th>Num Discado</th>";
                      echo "     <th>Identificacao</th>";                                          
                      echo "     <th>Qtd</th>";
                      while ($linha = mysql_fetch_assoc($resultado))
                                  {
                                   $num_telefone= $linha["num_telefone"];
                                   $num_discado = $linha["num_discado"];
                                   $descricao = utf8_encode($linha["nome_usr"]);
                                   $qtd   = $linha["qtd"];
                                   echo( "<tr>
                                             <td align ='center'>$num_telefone</td>
                                             <td>$descricao</td>
                                             <td align ='center'>$num_discado</td>
                                             <td align ='center'> </td>
                                             <td>$qtd</td>
                                          </tr>");
                                  $i++;
                              }
                     //                      
                        
                    }
                    
                                     
                }
        ?>

</body>

</html>