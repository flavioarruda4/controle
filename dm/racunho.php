                    echo "<table border='1'>";
                    // abrir ficheiro csv em modo de leitura
                    $handle = fopen('D:\FtpBrowser\downloadTXT\799632038_113149734_2016_7_12_1.txt', "r");
                    // obter os dados em cada linha
                    while (($data = fgetcsv($handle, 1000, ";")) !== FALSE) {
                            echo "<tr>";
                            if($n_linha == 0){
	                        // escreve dados do cabeçalho se for a primeira linha do ficheiro
	                           echo "<th>inc</th>";//Incremento de linha
                               echo "<th>mês</th>";//Mes
                               echo "<th>ano</th>";//Ano
                               echo "<th>num_telefone</th>";//Numero Telefone Corporativo
	                           echo "<th>seção</th>";//Seção
                               echo "<th>data</th>";//Data
                               echo "<th>hora</th>";//Hora
                               echo "<th>origem_destino</th>";//Origem - Destino
                               echo "<th>num_discado</th>";//Numero Discado
                               echo "<th>duracao</th>";//Duração
                               echo "<th>tarifa</th>";//Tarifa
                               echo "<th>valor</th>";//Valor
                               echo "<th>valor_cobrado</th>";//Valor Cobrado
                               echo "<th>nome</th>";//Nome
                               echo "<th>Centro de Custo</th>";//Centro de Custo
                               echo "<th>matricula</th>";//Matricula
                               echo "<th>sub_secao</th>";//Sub Seção
                               echo "<th>tipo_imposto</th>";//Tipo imposto
                               echo "<th>descricao</th>";//Descrição
                               echo "<th>cargo</th>";//Cargo
                               echo "<th>local origem</th>";//Nome Local Origem
                               echo "<th>local destino</th>";//Nome Local Destino
                               echo "<th>cod origem lig</th>";//Cod Origem Ligacao
                               echo "<th>cod destino lig</th>";//Cod Destino Ligacao
                            }else{
	                        // escreve os valores de cada linha
	                           echo "<td>".$n_linha."</td>";//Incremento de linha
                               echo "<td>".$mes."</td>";//Mes
                               echo "<td>".$ano."</td>";//Ano
                               echo "<td>".$data[0]."</td>";//Numero Telefone Corporativo
	                           echo "<td>".$data[1]."</td>";//Seção
                               echo "<td>".$data[2]."</td>";//Data
                               echo "<td>".$data[3]."</td>";//Hora
                               echo "<td>".$data[4]."</td>";//Origem - Destino
                               echo "<td>".$data[5]."</td>";//Numero Discado
                               echo "<td>".$data[6]."</td>";//Duração 
                               echo "<td>".$data[7]."</td>";//Tarifa
	                           echo "<td>".$data[8]."</td>";//Valor
	                           echo "<td>".$data[9]."</td>";//Valor Cobrado
                               echo "<td>".$data[10]."</td>";//Nome
                               echo "<td>".$data[11]."</td>";//Centro Custo
                               echo "<td>".$data[12]."</td>";//Matricula
                               echo "<td>".$data[13]."</td>";//Sub Seção
                               echo "<td>".$data[14]."</td>";//Tipo imposto
                               echo "<td>".$data[15]."</td>";//Descrição
                               echo "<td>".$data[16]."</td>";//Cargo
                               //Nome Local Origem
                               if ($data[17]!= ''){ 
                                      echo "<td>".$data[17]."</td>"; 
                               }else{ echo "<td>sem registro </td>";}
                               //Nome Local Destino
                               if ($data[18]!= ''){ echo "<td>".$data[18]."</td>"; }else{ echo "<td> sem registro </td>";}
                               //Cod Origem ligacao
                               if ($data[19]!= ''){ echo "<td>".$data[19]."</td>"; }else{ echo "<td> sem registro </td>";}
                               //Cod Destino ligacao
                               if ($data[20]!= ''){ echo "<td>".$data[20]."</td>"; }else{ echo "<td> sem registro </td>";}                               
                               
                            }
                            echo "</tr>";
                        $n_linha ++;
                        }
                    echo "</table>";
                    fclose($handle);
