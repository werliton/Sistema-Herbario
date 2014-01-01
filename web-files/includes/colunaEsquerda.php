<section id="coluna_esquerda_index"><!--Coluna Esqueda   ( Tudo da coluna esquerda da page index está dentro dessa section )-->

    <section id="busca_site">              

        <form action="/listaAgendamentos/pesquisa" method="post" enctype="multipart/form-data" name="BuscaHome" id="BuscaHome">
            <input name="campobusca" id="pesquisar" class="campos" type="text">
            <input type="submit" name="btnBuscar" title="Buscar" value="" class="bt_submit_find">
        </form>

    </section>

    <section id="conj_noticias"> <!--Conj Blocos de Noticias ( Bloco noticia 1 - 2 - 3 ) -->             

        <header id="titulo_noticias" > 

            <figure> <img src="<?php echo DIR_IMG; ?>titu_ultconsultas.png" alt="Últimas Consultas" title="Últimas Notícias">   </figure>    

        </header> 

        <?php 
        if(count($ultConsultas)<=0){
            echo '<h3 class="bloco_dianoticia" style="padding-left:30px">Sem agendamentos cadastrados</h3>';
        }else{
        
        foreach ($ultConsultas as $uc): ?>

            <article id="conj_bloco_noticia" class="noticias"><!--Bloco 1 noticias ( data + descrição da noticia ) -->

                <section id="bloco_data" class="bloco_datas"> 
                    <span class="numeros"><?php echo date('d', strtotime($uc->data)); ?></span> 
                </section>

                <section id="bloco_dianoticia" class="bloco_dianoticia"><?php echo date('m/Y', strtotime($uc->data)); ?></section>

                <section id="bloco_noticia" class="bloco_noticia"> 
                    <a href="/listaAgendamentos/agendamentoDetalhado/id/<?php echo $uc->agend_id; ?>" class="noticiasl"><?php echo substr($uc->nome, 0, 50); ?> </a>
                </section>

                <section id="bloco_linha"> 

                    <figure> <img src="<?php echo DIR_IMG; ?>linha_noticias.png" alt="Últimas Notícias" title="Últimas Notícias">   </figure>    

                </section>

            </article><!--FIM do Bloco 1 noticias ( data + descrição da noticia ) -->

        <?php endforeach; }?>

        <section id="bloco_bt"> 

            <figure> 
                <a href="/listaAgendamentos">
                    <img src="<?php echo DIR_IMG; ?>bt_vejamais.png" border="0" alt="Últimas Consultas" title="Últimas Consultas">
                </a> 
            </figure>   
            <br>
        </section>


        </article><!--FIM do Bloco 3 noticias ( data + descrição da noticia ) -->



    </section><!--FIM do Conj Blocos de Noticias ( Bloco noticia 1 - 2 - 3 ) -->


</section><!--FIM da Coluna Esqueda   ( Tudo da coluna esquerda da page index está dentro dessa section )-->
