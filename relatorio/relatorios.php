<?php

/**
 * @author Flavio de Arruda Ribeiro
 * @copyright 2016
 * 
 * 
 
 SELECT c.* 
 FROM conta_online c
 where c.data between '16/06/2016' and '20/06/2016' and c.num_telefone = '61993335893'
 and c.num_telefone not in (select num_telefone from telefone) and num_discado is not null and valor > 0
   
   
select c.num_telefone, count(num_discado)as qtd_ocorr, o.desc_operadora 
from conta_online c 
Left join operadora o on o.cod_operadora = c.cod_operadora  
Where c.ano = 2016 and c.mes = 8 and c.num_telefone not in (select num_telefone from telefone) 
      and c.num_discado is not null and c.valor > 0 and c.num_discado <> ''
      and c.num_telefone = '61993335893' and o.cod_operadora = 2 
      
      
select distinct c.num_telefone, t.nome_usr , count(c.num_telefone)as qtd_ligacao, 
       sum(valor_cobrado) as valor_cobrado,sum(valor)as valor,o.desc_operadora 
from conta_online c
Left join telefone t on c.num_telefone = t.num_telefone
Left join operadora o on c.cod_operadora = o.cod_operadora
where ano = 2016 and mes = 8 and c.cod_operadora = 2
group by c.num_telefone, o.desc_operadora
order by sum(valor) desc      
   
 * 
 */

?>