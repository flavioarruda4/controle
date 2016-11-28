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
        <h5 id="tituloPop">Liga&ccedil&otildees Obtativas</h5>
    <!-- Espaço para Formularios --!>
          <br />
          <form method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">
               <table id="tabelapop">
                    <tr>
                        <th colspan="2">Tipo de pesquisa</th>
                    </tr>
                    <tr>
                        <td>Seleciona Linha:</td>
                        <td>
                            <select name="desc_utilizacao"> 
                               <?php
                                  $consulta = "select distinct descricao from conta_online order by descricao";
                                  $resultado = mysql_query($consulta) or die("Falha na execucao da consulta");
        	      		       	  while ($linha = mysql_fetch_assoc($resultado)) 
        			     	            { $desc_utilizacao       = utf8_encode($linha["descricao"]);
        					              echo "<option name=telefone value =$desc_utilizacao >$desc_utilizacao</option>";
                                        }
                                ?>                                
                            </select>                            
                                         
                        </td>
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
                                          
                                         // $mes_desc = descricaoMes($linha["mes"]);
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
                    <tr>
                        <td colspan="2" align="center"><input type="submit" value="  Pesquisar " /></td>
                    </tr>                                                  
               </table>
          </form>           

        <?php
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                    $desc_utilizacao    = $_REQUEST['desc_utilizacao'];
                    $mes = $_REQUEST['mes'];
                    $ano = $_REQUEST['ano'];
                    
                    $consulta = "Select distinct (c.num_telefone)as num_telefone, c.descricao,sum(c.valor)as valor, sum(c.valor_cobrado)as valor_cobrado \n 
                                 From conta_online c \n  
                                 Left join operadora o on o.cod_operadora = c.cod_operadora \n
                                 Left join telefone t on c.num_telefone = t.num_telefone";  
                    if ($desc_utilizacao == " "){
                        echo "Campo Obrigatorio nao preenchido!";
                    }else{
                      $consulta = $consulta." Where c.mes = $mes and c.ano = $ano and c.descricao like '$desc_utilizacao%' and o.cod_operadora = 2
                                            Group by c.num_telefone, t.nome_usr, c.descricao, c.data
                                            Order by sum(c.valor) desc"; 
                      $resultado = mysql_query($consulta) or die("Falha na execucao da consulta");
                      //echo $consulta;
                      $i = 1;
                      
                      echo "<br /><br /><br /><br /><br /><br /><br /><br /><br /><br />";
                      echo "<table align ='center' width=700 border = 1>";
                      echo "  <tr>";
                      echo "     <th>Num Telefone</th>";
                      echo "     <th>Opcao      </th>";
                      echo "     <th>Valor</th>";                      
                      echo "     <th>Valor_cobrado</th>";
                      while ($linha = mysql_fetch_assoc($resultado))
                                  {
                                   $num_telefone= $linha["num_telefone"];
                                   $descricao = utf8_encode($linha["descricao"]);
                                   $valor    = $linha["valor"];
                                   $valor_cobrado    = $linha["valor_cobrado"];
                                   echo( "<tr>
                                             <td align ='center'>$num_telefone</td>
                                             <td align ='center'>$descricao</td>
                                             <td>$valor</td>
                                             <td>$valor_cobrado</td>
                                          </tr>");
                                  $i++;
                              }
                     //                      
                        
                    }
                    
                                     
                }
        ?>

</body>

</html>