<?php
    include ("config.php");
    $i = 0;
    $arquivo = fopen("D:\FtpBrowser\downloadTXT(2)\teste_csv.csv","r");
    
    while (!feof ($arquivo)){
        
        if ($i == 10)
        
        print_r(fgetcsv($arquivo));
        $i ++;
        
    }
    
    
    fclose($arquivo);
    header("Location:../formulario/conta_online.php");
?>
	
