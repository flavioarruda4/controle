<html>
    <head>
        <meta charset="utf-8">
        <title>Importa&ccedil&atildeo de Conta On line</title>
    <?php  
        session_start();
        include_once ("config.php"); 
        include_once ("funcoes.php");
        if((!isset ($_SESSION['email']) == true) and (!isset ($_SESSION['senha']) == true))
                {
	               unset($_SESSION['email']);
	               unset($_SESSION['senha']);
	               header('location:../index.html');
        	    }
        $logado = ucfirst($_SESSION['login']);
        switch ($_SESSION['privilegio']){
             case 1: 
                    $descPerfil = "Operação";
                    unset($_SESSION['email']);
                    unset($_SESSION['senha']);
                    header('location:../index.html');
                    break;
             case 2: 
                    $descPerfil = "Gerencial";
                    unset($_SESSION['email']);
                    unset($_SESSION['senha']);
                    header('location:../index.html');
                    break;
             case 3: 
                    $descPerfil = "Estratégico";
                    break;                                                                        
        }
    ?>        
    </head>
    <body>
    <?php 
       if ($_SERVER["REQUEST_METHOD"] == "POST") {
        //inicio do insert
        $consulta = "SELECT * FROM `conta_online9_2016`" ;
        $resultado = mysql_query($consulta) or die("Falha na execucao da consulta");
        $iQtdRegistros = mysql_num_rows($resultado);
        $i = 0;
        while ($linha = mysql_fetch_assoc($resultado)){
               //utilizar explode mais enquanto isso forçar variável
               $i++;
               echo "foram inseridos ".$i." de ".$iQtdRegistros." registros" ;
               $mes = 9;
               $ano = 2016;
               $cod_operadora = 2;
               $telefone = str_replace(' ','',str_replace('-','', $linha["Tel"]));
               $secao = $linha["secao"];
               $data = $linha["Data"];
               $hora = $linha["Hora"];
               $origem_destino = $linha["Origem_Destino"];
               $num_discado = $linha["Numero"];
               
               if (($linha["Duracao_Quantidade"] < 0)or($linha["Duracao_Quantidade"]=" ")){
                 $duracao = "null";
               }else {
                 $duracao = $linha["Duracao_Quantidade"]; 
               };
               
               if (($linha["Tarifa"] < 0)or($linha["Tarifa"]=" ")){
                 $tarifa = "null";
               }else {
                 $tarifa = $linha["Tarifa"]; 
               };
               
               $valor = str_replace(",",".",$linha["Valor"]);
               $valor_cobrado = str_replace(",",".",$linha["Valor_Cobrado"]);
               $nome = $linha["Nome"];
               $centro_custo = $linha["CC"];
               $matricula = $linha["Matricula"];
               $sub_secao = $linha["Sub_Secao"];
               $tipo_imposto = $linha["Tipo_Imposto"];
               $descricao = $linha["Descricao"];
               $cargo = $linha["Cargo"];
               $nome_local_origem = $linha["Nome_Local_Origem"];
               $nome_local_destino = $linha["Nome_Local_Destino"];
               
               if (($linha["Codigo_Local_Origem"] < 0)or($linha["Codigo_Local_Origem"]=" ")){
                 $cod_local_origem = "null";
               }else {
                 $cod_local_origem = $linha["Codigo_Local_Origem"];
               };               

               if (($linha["Codigo_Local_Destino"] < 0)or($linha["Codigo_Local_Destino"]=" ")){
                 $cod_local_destino = "null";
               }else {
                 $cod_local_destino = $linha["Codigo_Local_Destino"];
               };
               $inserConta = "insert conta_online(mes,ano,cod_operadora,num_telefone,secao,data,hora,origem_destino,num_discado,duracao,tarifa,valor,valor_cobrado,
                              nome,centro_custo,matricula,sub_secao,tipo_imposto,descricao,cargo,nome_local_origem,nome_local_destino,
                              cod_local_origem,cod_local_destino) 
                              values($mes,$ano,$cod_operadora,'$telefone','$secao','$data','$hora','$origem_destino','$num_discado',$duracao,$tarifa,$valor,$valor_cobrado,
                              '$nome','$centro_custo','$matricula','$sub_secao','$tipo_imposto','$descricao','$cargo','$nome_local_origem','$nome_local_destino',
                              $cod_local_origem,$cod_local_destino)";
               echo "<br>".$inserConta."<br>" ;                
               $resultInsere = mysql_query($inserConta) or die("Falha na execução da consulta");
        }
        echo "Dados adicionados com sucesso";       
        
        //Fim do insert
       
         }
    ?>
    <h2>Usu&aacuterio Conectado</h2>
        <ul>
            <li><?php echo "<h4><a href=#>Bem vindo ! ($logado)<br />$descPerfil</a><h4>";?></li>
        </ul> 
    <form method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">
            <input type="submit" value="Importar" />
    </form> 
</body>
</html>