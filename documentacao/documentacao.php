<head>
    <?php  
        session_start();
            if((!isset ($_SESSION['email']) == true) and (!isset ($_SESSION['senha']) == true))
                {
	               unset($_SESSION['email']);
	               unset($_SESSION['senha']);
	               header('location:../index.html');
        	    }
        $logado = $_SESSION['email'];
    ?>
    <?php include ("../dm/config.php"); ?> 
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
                 window.open(URL,'janela', 'width=800, height=600, top=99, left=99, scrollbars=yes,'+ 
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

        <!-- Conteúdo a ser apresentado --!>
        <div id="content">
            <!-- Documentação sobre utilização do Sistema de Controle --!>
            <h2>Documentação</h2>
              <ul>
                <li><a href="#integra">Integrantes do trabalho</a></li>
                <li><a href="#controller">Conceito de Controller(Cargo/Função)</a></li>
                <li><a href="#cronograma">Cronograma</a></li>
                <li><a href="#objetivo">Objetivo</a></li>
                <li><a href="#retorno">Retorno Financeiro</a></li>
                <li><a href="#plano">Plano de ação</a></li>
                <li><a href="#conceitual">Modelo Conceitual</a></li>
                <li><a href="#brModelo">Modelagem de dados(brModelo)</a></li>
                <li><a href="#observacao">Observações</a></li>
                <li><a href="#sistema">Como utilizar o Sistema</a></li>
                <li><a href="#bibliografia">Bibliografia / Referência</a></li>
              </ul>
              
              <hr />
              <ul>
                <li><a name="integra">Integrantes do trabalho</a></li>

                    Flávio de Arruda Ribeiro - flavio.arruda@intrasupermaia.com.br
                    Rayane Marques - rayanemarquesbb@gmail.com
                    Anderson - andersongamamix@gmail.com
                
                <li><a name="controller">Conceito de Controller(Cargo/Função)</a></li>
                        “Pessoa , administrativo contábil ,controladoria é na atualidade uma importante 
                         ferramenta administrativa, utilizada para a tomada de decisão nas modernas organizações. 
                         Com o surgimento, desenvolvimento das civilizações e a ascensão industrial a Contabilidade 
                         Gerencial passou a ter maior importância devido ao aparecimento das grandes empresas 
                         comerciais e industriais, e como resultado do advento da globalização, a partir dos anos 90. 
                         Na atual dinâmica da economia mundial, as empresas são obrigadas a estar sempre em compasso 
                         de mudança. Nesse contexto, a Controladoria tem um papel importante dentro das organizações, 
                         gerando informações confiáveis, supervisionando os setores de contabilidade, finanças, 
                         administração, informática e recursos humanos, auxiliando a tomada de decisões, que 
                         envolvem a todos, e principalmente, monitorar constantemente as mudanças tecnológicas, 
                         de mercado , de sistemas de gestão, apontando os melhores caminhos a serem seguidos pelas empresas”.
                                        
                <li><a name="cronograma">Cronograma</a></li>
                        o 09/08/2016
                             Levantamento dos objetivos do projeto
                             Retorno Financeiro
                             Plano de Ação
                             Modelo Conceitual
                             Apresentação do Escopo
                        o 12/08/2016 ( A combinar)
                             Diagrama (brModelo)
                        o 16/08/2016 ( A combinar)
                             Inicio desenvolvimento
                        o xx - meio ( A combinar normal que seja 2 semanas)
                        o xx - meio ( avaliação antes da apresentação )
                        o xx- fim ( Apresentação do projeto)
                
                <li><a name="objetivo">Objetivo</a></li>
                        Controle das Contas Telefônicas da Empresa Paulo & Maia Supermercados Ltda (Supermaia), onde :
                        o Custo de Gestão de telefonia - A gestão terceirizada é um dos pilares da administração moderna e permite 
                        usufruir o máximo da especialização de pessoal e da produtividade
                        o O desvio de função de um colaborador para cuidar dos assuntos referentes a telecomunicações pode custar 
                        mais do que contratar uma empresa especializada.
                        o A carêcia de profissionais com expertise na área de Gestão de Gastos em telefonia fragiliza o relacionamento 
                        da empresa junto a Operadora.
                        o As contas serão processadas por nosso software, que garante 100% de precisão e fidelidade às informações, 
                        além de agilidade na inspeção dos pequenos detalhes como:
                     Analisar as contas telefônicas da empresa, mediante uso de software próprio, buscando identificar excedentes, 
                    franquia ociosa e cobranças indevidas.
                     Identificar o perfil de consumo (minuto, mensagens, interurbanos, internet)
                     Simular o tráfego registrado nos meses analisados em todos os planos disponíveis no mercado, mediante proposta 
                    realizadas pelo cliente.
                     Apresentar ao cliente, as alternativas de menor custo em cada operadora para a escolha do plano mais adequado 
                    às suas necessidades.
                    o Por meio de método descrito anteriormente, apresentamos análise resumida do perfil da empresa, como, minutos 
                    locais utilizados, minutos interurbanos.
                    o Nosso sistema averigua quanto custaria a mesma conta processada anteriormente, com os ajustes sugeridos em 
                    cada operadora, em caso do cliente apresentar propostas de outras operadoras de telefonia movel.
                    o Nosso sistema apresenta o rank de cada operador de telefonia perante a Anatel.
             
                <li><a name="retorno">Retorno Financeiro</a></li>
                    Plano OurtSourcing - Contrato para controle e gestão tercerizada da conta de telefonia móvel empresarial, 
                    como valorização do trabalho, o cliente pagará R$ 1.800,00 por mês + 10% da economia efetiva do trimestre + 25% das contestações.
                    Plano Controller - Entrega de cartilha com resultados completos demonstrando perfil do cliente, como 
                    valorização do trabalho, o cliente pagará R$ 3.700,00 e auxilio não presencial para configuração, sendo que o 
                    atendimento é remoto , não impossibilitando auxilio presencial, e neste caso, arcará com o valor de visita 
                    técnica no valor de R$ 150,00 a hora. 
                                   
                <li><a name="plano">Plano de ação</a></li>
o Análise mensal da fatura para perfeita setorização de custos, acompanhamento de uso dos colaboradores e aplicação da melhor tarifação.
 Contestação de valores indevidos, com o ressarcimento dobrado, incluindo faturas vencidas, conforme Anatel, Resolução 632, Capítulo V(DA DEVOLUÇÃO DE VALORES) Art. 85 ( Art. 85. O Consumidor que efetuar pagamento de quantia cobrada indevidamente tem direito à devolução do valor igual ao dobro do que pagou em excesso, acrescido de correção monetária e juros de 1% (um por cento) ao mês pro rata die). http://www.anatel.gov.br/legislacao/resolucoes/2014/750-resolucao-632.
o Acompanhamento das solicitações do cliente junto à operadora, para execução nos prazos regulamentados pela Resolução 477, da Anatel no que tange( adição de linhas, trocas de aparelhos)                
                <li><a name="conceitual">Modelo Conceitual</a></li>
o funcionario - tabela criada para guardar funcionarios que irão manipular dados a serem inseridos na plataforma web.
 cod_funcionario (pkey)
 matricula
 nome
 telefone
 situacao
 privilegio
 login
 senha
 data_cadastro
o operadora - tabela criada para guardar dados referentes as operadoras de telefonia celular, assim como sua abragência dentro do território nacional.
 cod_operadora (pkey)
 desc_operadora
 status
 rank_anatel
o ranking_anatel - tabela criada para guardar dados referentes a posicionamento de cada operadora de telefonia , quando a indice de reclamações .
 cod_ranking_anatel (pkey)
 data_pesquisa
 cod_operadora
 serviço
o telefone - tabela criada para guardar dados referentes a linha telefônica , e pessoa responsável pela sua utilização interna , onde , será feita referência se os telefones utilizados são de fato , nºs corporativos ou pessoais , sendo neste caso feita a cobrança por uso pessoal.
 num_telefone (pkey)
 nome_usr
 situacao
 internet
 minutagem
 sms
o conta_online - tabela criada para guardar dados referentes a consumo utilizado no mês corrente será populado com aproximadamente 46000 registros ao mês, será populada apenas quando , antes do insert o select discriminar que não existe importação realizada para este mês e ano , sendo portanto esses atributos as chaves desta entidade.
 mes (pkey)
 ano (pkey)
 num_telefone
 secao
 data
 hora
 origem_destino
 num_discado
 duracao(time)
 tarifa(float)
 valor(float)
 valor_cobrado(float)
 nome
 centro_custo
 matricula
 sub_secao
 tipo_imposto
 descricao
 cargo
 nome_local_origem
 nome_local_destino
 cod_local_origem
 cod_local_destino
o contrato - tabela criada para guardar dados referentes a contratos efetuados pelo cliente junto a operadora de telefonia nela serão
armazenados dados de contratos atuais , passados afim de setar e ter paramêtros de analise para valores pagos.
 cod_contrato (pkey)
 data_lanca
 cod_operadora
 data_inicial
 data_final
 valor_mb
 valor_sms
 valor_minutagem
o manutencao - tabela criada para guardar possiveis trocas de aparelhos assim como idas para manutenção dos mesmos, apenas poderá ser inserida se data_aprovação não tiver sido preenchida.
 num_telefone (pkey)
 data_manutencao (pkey)
 defeito_apresentado
 data_orçamento
 defeito_constatado
 data_aprovacao
 cod_funcionario_ap
 cod_funcionario_lanca
 Observação                
                <li><a name="brModelo">Modelagem de dados(brModelo)</a></li>
                    <img src="../imagens/ControleTelefonia.jpg" width="700" height="600"/>
                <li><a name="observacao">Observações</li>
                <li><a name="sistema">Como utilizar o Sistema</a></li>
                <li><a name="bibliografia">Bibliografia / Referência</a></li>
              </ul>              
              
        </div>

        <!-- Menu e Notícias que serão lançadas no banco de dados afim de serem apresentadas neste ponto do site --!>
        <div id="leftmenu"> 
            <!-- Menu --!>
            <h2>Categorias</h2>
                <ul>
                    <li><a href="../principal.php">Página Principal</a></li>
                       <?php
                          $privilegio = $_SESSION['privilegio'];
                          $consulta = "Select descricao, pagina, informacao from categoria where privilegio <= $privilegio ";
                          $resultado = mysql_query($consulta) or die("Falha na execucao da consulta");
	      		       	  while ($linha = mysql_fetch_assoc($resultado)) 
			     	            {
                                  $descricao  = $linha["descricao"];
                                  $pagina     = $linha["pagina"];
                                  $informacao = $linha["informacao"];
					              echo "<li><a href='../formulario/$pagina'>$descricao</a></li>";
                                }
                        ?>
                </ul> 

            <!-- Noticias --!>    
            <h2>Últimas noticias</h2>
                <ul>
      				<?php
					    $consulta = "Select data_noticia, noticia,cod_noticia from noticia order by data_noticia desc limit 4";
                        $resultado = mysql_query($consulta) or die("Falha na execucao da consulta");
	      			    while ($linha = mysql_fetch_assoc($resultado)) 
			     	        {
                            $data_noticia  = $linha["data_noticia"];
                            $noticia       = utf8_encode($linha["noticia"]);
                            $cod_noticia   = $linha["cod_noticia"];
					        echo "<li><a href=javascript:abrir('../formulario/noticiavar.php?cod_noticia=$cod_noticia');>$noticia</a></li>";
                            }
                     ?>
                </ul>
                
            <!-- Documentação do trabalho --!>
            <h2>Documentação</h2>
                <ul>
                    <li><a href="../arquivos/ProjetoSemestre.pdf" target="_blank">Documentação PDF</a></li>
                    <li><a href="documentacao.php" target="_blank" >Tutorial da aplicação - WEB</a></li>
                </ul>

            <!-- Login / Logout --!>    
            <h2>Login / Logout</h2>
               <center> 
                    <form method="post" action="../logout.php">
                        <input id="sair" name="sair" type="submit" value=" Sair " disabled />
                    </form>
               </center>
        </div>

        <!-- Rodape --!>
        <div style="clear: both;"> </div>
            <div id="footer"> <?php  $design = $_SESSION['design']; echo $design ; ?> </div>
        </div>
</body>
</html>

