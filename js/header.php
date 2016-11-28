<!-- Head padrão para página -->
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <link href="../css/stylein.css " rel="stylesheet" type="text/css" />
    
<!-- Funções atreladas ao Google para exibir Calendários no campo data deste formulario -->
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.0/themes/base/jquery-ui.css" />
    <link rel="stylesheet" href="/resources/demos/style.css" />
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.0/jquery-ui.js"></script>

<!-- Script para que seja exibido um calendário nos campos que estiverem setadas para que recebam class=dateTxt -->
    <script>
        $( function() {
            $(function(){
                $('.dateTxt').datepicker({ dateFormat: 'yy-mm-dd' }); 
                }); 
        } );
    </script>

<!-- Validacao Campos maskedinput -->
    <script src="https://code.jquery.com/jquery-1.8.3.min.js" type="text/javascript"></script>
    <script src="jquery.maskedinput.min.js" type="text/javascript"></script>  
    <script type="text/javascript">
          $(function() {
                $.mask.definitions['~'] = "[+-]";
               // $("#dataEmissao").mask("99/99/9999",{completed:function(){alert("completed!");}});
               // $("#dataPrevEntrega").mask("99/99/9999",{completed:function(){alert("completed!");}});
               
                $("#telefone").mask("(99) 99999-9999");
                
                $("input").blur(function() {
                    $("#info").html("Unmasked value: " + $(this).mask());
                }).dblclick(function() {
                    $(this).unmask();
                });
            });
        	
    </script> 
       
<!-- Script para que seja executado um pop-up nos link's Notícias da página -->
    <script language="JavaScript">        
       function abrirRelatorio(URL) {
                 window.open(URL,'janela', 'width=900, height=550, top=99, left=80, scrollbars=yes,'+ 
                                           'status=no, toolbar=no, location=no, directories=no,'+ 
                                           'menubar=no, resizable=no, fullscreen=no');
    </script>
        
<!-- Script para que seja executado um pop-up nos link's Notícias da página -->
    <script language="JavaScript">
        function abrir(URL) {
                 window.open(URL,'janela', 'width=800, height=500, top=99, left=99, scrollbars=yes,'+ 
                                           'status=no, toolbar=no, location=no, directories=no,'+ 
                                           'menubar=no, resizable=no, fullscreen=no');
                            }
    </script> 
<!-- Script para que seja Limitado a quantidade de caracter no campo textarea do tema -->
        <script>
        function LimiteTema(){
            // by internet100wm
            var form = document.formincluirnaturezaop;
            limite = 100;
            if( form.texto.value.length > limite )
               {form.texto.value = form.texto.value.substring( 0, limite );}
            form.lim.value = limite - form.texto.value.length - 1;
            }
        </script>
        
<!-- Script para que seja Limitado a quantidade de caracter no campo textarea do Detalhamento -->
        <script>
        function LimiteDetalhamento(){
            // by internet100wm
            var form = document.formincluirnaturezaop;
            limite = 255;
            if( form.texto.value.length > limite )
               {form.texto.value = form.texto.value.substring( 0, limite );}
            form.lim.value = limite - form.texto.value.length - 1;
            }
        </script>
        
        <script src="jquery.maskMoney.js" type="text/javascript"></script>
        <script type="text/javascript">
            $(function(){
                $(".valores").maskMoney(
                    {symbol:'R$', 
                     showSymbol:true, 
                     thousands:'.', 
                     decimal:',', 
                     symbolStay: true}
                );
            })
        </script>  
        
        <!-- -->
        <script>
            $(function descricaoMes($mes){
                switch ($mes) {
                    case 8:
                        return "Agosto";
                        break;
                    case 9:
                        return "Setembro";
                        break;                        
                }
                
                
            })
        
        </script>
        
        </script>
                    
            
            
                          