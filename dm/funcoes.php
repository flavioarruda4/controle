<?php

    //converter uma String em data padrão do mysql
    function converteStringData($strTexto = null) {
	$format = '/^([0-9]{2})\/([0-9]{2})\/([0-9]{4})$/';
	if ($strTexto != null && preg_match($format, $strTexto, $partes)) {   
	    return $partes[3].'-'.$partes[2].'-'.$partes[1];
	    }
    return false;
    }


    
    //Limpa uma string de caracteres especiais
    function removeEspacosCaracter($strTexto){
        $strTexto = str_replace(' ', '', $strTexto );
        $strTexto = str_replace('-', '', $strTexto );
        return $strTexto;      
    }
      
?>

