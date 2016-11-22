<?php

/**
 * @author Flavio de Arruda Ribeiro
 * @copyright 2016
 * 
 * Ligações efetuadas por determinado numero num periodo
   SELECT c.* 
   FROM conta_online c
   where c.data between '16/06/2016' and '20/06/2016' and c.num_telefone = '61993335893'
   and c.num_telefone not in (select num_telefone from telefone) and num_discado is not null and valor > 0
 * 
 */

?>