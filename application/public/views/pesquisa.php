<?php include_once(DIR_INCLUDE . "head.php"); ?>


<section id="miolo_internos"><!-- Miolo Internos ( Tudo abaixo do banner principal está dentro dessa Section )-->

   
        <figure> 
            
        <img src="<?php echo DIR_IMG; ?>/barra_pesquisa.png"  height="79" title="O Hospital">   </figure> 

    
        <section class="informacoes_internos"><!-- Informações referente a page acessada ( conteúdo )-->
     Listagem de Agendamentos de Consulta do dia <?php echo date("d/m/Y");?>
<br>
     <br>
     
      
<?php   
    if(count($listagem) == 0){
        echo '<h2>Nada encontrado para esta pesquisa!</h2>';        
    }else{
        foreach ($listagem as $lista): ?>              
             <section class="conj_imprensa">
                 <section class="data_imprensa"> <?php echo date("d/m",  strtotime($lista->data)).'-'.$lista->horario;?>  </section>                     
                    <section class="descricao_imprensa">
                        <a href="/listaAgendamentos/agendamentoDetalhado/id/<?php echo $lista->agend_id;?>" class="noticiasl">
                        <?php echo strtoupper($lista->nome);?>
                        </a>
                    </section>

                    <section class="linha_imprensa">  

                     <figure> <img src="<?php echo DIR_IMG;?>linha_imprensa.gif" alt="Sala de Imprensa" title="Sala de Imprensa">   </figure> 

                    </section>


            </section>

<?php
	endforeach;
        
        }
?>  


    </section><!-- FIM das Informações referente a page acessada ( conteúdo )-->

</section><!--FIM do  Miolo Internos ( Tudo abaixo do banner principal está dentro dessa Section )-->

<?php include_once DIR_INCLUDE.'rodape.php';?>

</div><!--FIM do CORPO SITE ( Tudo do site está dentro dessa div )-->


</body>
</html>