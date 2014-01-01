<?php include_once(DIR_INCLUDE . "head.php"); ?>


<section id="miolo_internos"><!-- Miolo Internos ( Tudo abaixo do banner principal está dentro dessa Section )-->

   <figure> 
        <img src="<?php echo DIR_IMG; ?>/barra_agenddiarios_ordem.gif" alt="Agendamento de Exames" 
             height="79" title="O Hospital">   
    </figure> 

    <section class="informacoes_internos"><!-- Informações referente a page acessada ( conteúdo )-->
        <img src="<?php echo DIR_IMG; ?>/alerta.gif" title="" />
        <b>Aqui lista os agendamentos ordenados por ordem de chegada</b>
        <br>
        <br>


        <?php
        $cont=1;
        if (count($listagem) == 0) {
            echo '<h3><img src="'.DIR_IMG.'/alertaErro.gif" title="" /> Não há agendamentos de consulta para hoje!</h3>';
        } else {
            foreach ($listagem as $lista):
                ?>              
                <section class="conj_imprensa">
                    <section class="data_imprensa"> Hora de chegada - <?php echo date("H:i:s",strtotime($lista->data_hora_chegada)); ?>  </section>                     
                    <section class="descricao_imprensa">
                        <?php echo $cont; ?> - 
                        <a href="/listaAgendamentos/agendamentoDetalhado/id/<?php echo $lista->agend_id; ?>" class="noticiasl">
                        <?php echo strtoupper($lista->nome); ?>
                        </a>
                    </section>

                    <section class="linha_imprensa">  

                        <figure> <img src="<?php echo DIR_IMG; ?>linha_imprensa.gif" alt="Sala de Imprensa" title="Sala de Imprensa">   </figure> 

                    </section>

                </section>

                <?php
                $cont++;
            endforeach;
        }
        ?>  


    </section><!-- FIM das Informações referente a page acessada ( conteúdo )-->

</section><!--FIM do  Miolo Internos ( Tudo abaixo do banner principal está dentro dessa Section )-->

<?php include_once DIR_INCLUDE . 'rodape.php'; ?>

</div><!--FIM do CORPO SITE ( Tudo do site está dentro dessa div )-->


</body>
</html>