<?php
    $total = rand(1,5000);  
    $corrente = rand(1,$total);
    $percentual = round(( $corrente / $total) * 100,1);
    echo " $corrente  é $percentual% de um total de $total"."<p />";
?>

<style type="text/css">
.outter{
    height: 25px;
    width: 500px;
    border: solid 1px #000;
}
.inner{
    height: 25px;
    width: <?php echo $percentual ; ?>%;
    border-right: solid 1px #000;
    background-color: lightblue;
}
</style>
<div class="outter">
    <div class="inner"><?php echo $percentual ; ?>%</div>
</div>