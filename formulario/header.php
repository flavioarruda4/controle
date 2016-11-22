<!DOCTYPE html>

<html>
    <head>
        <title>Summer OS</title>

        <meta content="text/html; charset=UTF-8" http-equiv="content-type" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
        <meta name="viewport" content="width=device-width,initial-scale=1" />

        <!-- Jquery -->
        <script src="/prj_summer/js/jquery.js"></script>
        <script src="/prj_summer/js/jquery-ui.js"></script> 
        <link rel="stylesheet" href="/prj_summer/css/jquery-ui.min.css">   
        <!-- Latest compiled and minified JavaScript -->

        <script src="/prj_summer/css/bootstrap-3.3.7-dist/js/bootstrap.min.js"></script>

        <script src="/prj_summer/js/jquery.dataTables.min.js"></script>

        <link rel="stylesheet" href="/prj_summer/css/bootstrap-3.3.7-dist/css/bootstrap.min.css">

        <link rel="stylesheet" href="/prj_summer/css/bootstrap-3.3.7-dist/fonts">

        <link rel="stylesheet" href="/prj_summer/css/dataTable.min.css">
        
        
        <link rel="stylesheet" href="/prj_summer/css/bootstrap-datepicker.min.css">

        <!-- Slider -->
       
        <script>
            $( "#slider" ).slider({
                  range: true,
                  min: -10,
                  max: 10,
                  values: [ 2, 4 ],
                  slide: function( event, ui ) {
                    $( ".longEsfOd" ).val( "" + ui.values[ 0 ] + " - " + ui.values[ 1 ] );
                  }
                });
                $( ".longEsfOd" ).val( "" + $( "#slider" ).slider( "values", 0 ) +
                  " - " + $( "#slider" ).slider( "values", 1 ) );
        </script>        

        <!-- Validacao Campos maskedinput
        <script src="/prj_summer/js/jquery-1.8.3.min.js" type="text/javascript"></script> -->
        <script src="/prj_summer/js/jquery.maskedinput.min.js" type="text/javascript"></script>         
        <script type="text/javascript">
            $(function() {
                $.mask.definitions['~'] = "[+-]";
               // $("#dataEmissao").mask("99/99/9999",{completed:function(){alert("completed!");}});
               // $("#dataPrevEntrega").mask("99/99/9999",{completed:function(){alert("completed!");}});
               
                $("#dataVencLentes").mask("99/99/9999",{completed:function(){alert("completed!");}});
                $("#cpf").mask("999.999.999-99");
                $("#clienteOs").mask("999.999.999-99");
                $("input").blur(function() {
                    $("#info").html("Unmasked value: " + $(this).mask());
                }).dblclick(function() {
                    $(this).unmask();
                });
            });
        	
        </script>  
        
       <!-- Validacao de valore jquery.maskMoney   -->
       <!-- em conflito com demais jQuery -->
       <!-- <script src="/prj_summer/js/jquery.min.js" type="text/javascript"></script> -->
        <script src="/prj_summer/js/jquery.maskMoney.js" type="text/javascript"></script>
        <script type="text/javascript">
            $(function(){
                $("#valorOs").maskMoney(
                    {symbol:'R$', 
                     showSymbol:true, 
                     thousands:'.', 
                     decimal:',', 
                     symbolStay: true}
                );
                
                $(".graus").maskMoney(
                    {symbol:'R$', // Simbolo 
                     thousands:'.', 
                     decimal:'.', // Separador do decimal
                     precision:2,
                     allowZero:false, // Permite que o digito 0 seja o primeiro caractere 
                     showSymbol:false // Exibe/Oculta o símbolo
                     });                                      
            })
        </script> 

        
        <!-- css style principal -->
        <link rel="stylesheet" href="/prj_summer/css/style.css">


        <link rel="stylesheet" href="/prj_summer/css/menu.css">

        <script src="/prj_summer/js/table.js"></script>
        
        <!-- Datepicker -->
        
        <script src="/prj_summer/js/bootstrap-datepicker.min.js"></script>
        <script src="/prj_summer/js/bootstrap-datepicker.pt-BR.min.js"></script>

        <script src="/prj_summer/js/ajax-render.js"></script>

    </head>
    <body>
        <div class="" id="wrapper">
            <header class="summer-header">
                <div class="wrapper container">
                    <div class="span12" id="heading">

                        <div class="container">
                            <div class="logo__img span6">
                                <a href=""><h1> Summer OS</h1></a>
                            </div>
                        </div>

                    </div>
                </div>
            </header>