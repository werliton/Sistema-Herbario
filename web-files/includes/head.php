<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <title>HERBÁRIO - UFMA</title>

        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

        <link href="/web-files/css/regra_index.css" rel="stylesheet" type="text/css">
        <link href="/web-files/css/style.css" rel="stylesheet" type="text/css">
        <link href="/web-files/css/jquery.ui.all.css" rel="stylesheet" type="text/css">
        
        <link href="/web-files/css/jquery.ui.datepicker.css" rel="stylesheet" type="text/css">
        <!-- SLIDE SHOW NIVO -->
        <link rel="stylesheet" type="text/css" href="/web-files/js/nivo-slider/nivo-slider.css" media="screen"/>
        <!-- TEMA DO SLIDE SHOW -->
        <link rel="stylesheet" type="text/css" href="/web-files/js/nivo-slider/themes/default/default.css" media="screen"/>

        <script src="/web-files/js/jquery-1.8.0.min.js" type="text/javascript"></script>
        <script src="/web-files/js/jmask.js" type="text/javascript"></script>
        <script src="/web-files/js/jquery-ui-1.8.22.custom.js" type="text/javascript"></script>
        <script src="/web-files/js/jquery.ui.datepicker-pt-BR.js" type="text/javascript"></script>
        
<!-- VALIDATE      -->
        <script src="/web-files/js/jquery_validate.js" type="text/javascript"></script>
        <script src="/web-files/js/validate_func.js" type="text/javascript"></script>

<!-- FIM VALIDATE        -->
<!--   AUTOCOMPLETE     -->
        <script src="/web-files/js/jquery.autocomplete.js" type="text/javascript"></script> 
        <script src="/web-files/js/func_autocomplete.js" type="text/javascript"></script>
        <link rel="stylesheet" type="text/css" href="/web-files/css/jquery.autocomplete.css"/>
<!--   AUTOCOMPLETE     -->

        <script src="/web-files/js/mascaras.js" type="text/javascript"></script>
        <script src="/web-files/js/functions_date.js" type="text/javascript"></script>
        
        <script src="/web-files/js/func_limiteAgendamentos.js" type="text/javascript"></script>
        <script src="/web-files/js/func_regrasAgendamentos.js" type="text/javascript"></script>
        <!-- -->
        
        <script type="text/javascript" src="/web-files/js/nivo-slider/jquery.nivo.slider.js"></script>
        <script type="text/javascript" src="/web-files/js/nivo-slider/jquery.nivo.slider.pack.js"></script>
        <script type="text/javascript" src="/web-files/js/func-nivo.js"></script>
        <!--        -->
        <script type="text/javascript">
            var htmlshim='abbr,article,aside,audio,canvas,details,figcaption,figure,footer,header,mark,meter,nav,output,progress,section,summary,time,video'.split(',');
            var htmlshimtotal=htmlshim.length;
            for(var i=0;i<htmlshimtotal;i++) document.createElement(htmlshim[i]);
        </script>

    </head>

    <body>

        <div id="corpo_site"><!--CORPO SITE ( Tudo do site está dentro dessa Section )-->

            <section id="conj_topo">  
                <section id="logo_inicio"> 

                    <figure> 
                        <a href="/layout2">
                            <img src="<?php echo DIR_IMG; ?>logo/logo.png" alt="Estrutura Física" width="232" height="103" border="0" title="O Hospital">
                        </a> 
                    </figure> 

                </section>   

                <section id="menu_parte1">  
                    <figure> 
                        <a href="/index.php">
                            <img src="<?php echo DIR_IMG; ?>icones/logado.png" alt="Estrutura Física" border="0" title="O Hospital">
                       </a> 
                    </figure> 
                </section>

                <section id="menu_submenu">  
                    <?php include_once DIR_INCLUDE.'menuPrincipal.php';?>
                </section>
             </section><!--FIM do Conjunto Topo ( Marca + links no topo)-->
             
             <section id="conj_banner_menu"><!--Conjunto composto de  ( Menu acesso rápido e Banner em destaque )-->

    <?php include_once DIR_INCLUDE.'menuRapido.php';?>

    <section id="banner_destaque"> 

<!--        <div class="slider-wrapper theme-default">
            <div id="slider" class="nivo-slider">
                    <img src="<?php //echo DIR_IMG?>/banner-main.jpg" alt="" title="Aqui você encontrará os melhores códigos de programação" height="303" width="657"/>
                    <img src="<?php //echo DIR_IMG?>/banner-main2.jpg" alt="" height="303" width="657"/>-->
                    <img src="<?php echo DIR_IMG?>/banner-main3.jpg" alt="" height="303" width="657"/>
<!--            </div>
        </div>-->
    </section>

</section><!--FIM do Conjunto composto de  ( Menu acesso rápido e Banner em destaque )-->
