<?php include_once(DIR_INCLUDE . "head.php"); ?>


<section id="miolo_internos"><!-- Miolo Internos ( Tudo abaixo do banner principal está dentro dessa Section )-->

   <figure> 
        <img src="<?php echo DIR_IMG; ?>/barra_atendidos.gif" alt="Agendamento de Exames" 
             height="79" title="O Hospital">   
    </figure> 
    
    <section class="informacoes_internos"><!-- Informações referente a page acessada ( conteúdo )-->
        <img src="<?php echo DIR_IMG; ?>/alerta.gif" title="" />
        <b>Aqui lista todos atendimentos realizados de acordo com o filtro escolhido</b>
        <br> <br>
        <?php echo form_open('../relatorioAtendimentos');  ?> 

            <table width="100%" border="0" cellpadding="4" cellspacing="4">
               
                <tr>
                    <td colspan="3">Informe o período da busca</td>
                </tr>
                <tr>
                    <td width="131">Data início:</td>
                    <td width="397" align="left">
                        <input name="di" type="text" class="data" size="20" maxlength="50">
                    </td>
                    <td width="85">&nbsp;</td>
                </tr>
                <tr>
                    <td>Data fim:</td>
                    <td align="left">
                        <input name="df" type="text" size="20" class="data" maxlength="50">
                    </td>
                    <td width="85">&nbsp;</td>
                </tr>
                <tr>
                    <td>&nbsp;</td>
                    <td align="left">
                        <input type="submit" name="button" id="button" value="Buscar consultas">
                    </td>
                    <td>&nbsp;</td>
                </tr>
                <tr>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                </tr>
                <tr>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                </tr>
            </table>


        </form>
            
<!--  asd  -->
   
<?php

if(isset ($listagem)){
   if(count($listagem) <= 0){
        echo '<h3><img src="'.DIR_IMG.'/alertaErro.gif" title="" /> Não há atendimentos neste período informado!</h3>';
    }else{
        echo '<h3>RESULTADO DA BUSCA</h3><br>';
        echo '<section class="linha_imprensa">';
        echo '<figure>
              <img src="'.DIR_IMG.'linha_imprensa.gif" alt="Sala de Imprensa" title="Sala de Imprensa">
              </figure>'; 
        echo '</section>';

        foreach ($listagem as $lista): ?>              
         <section class="conj_imprensa">

             <section class="data_imprensa"> <?php echo date("d/m",  strtotime($lista->data)).' - '.$lista->horario;?>  </section>

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
}
?>  

<!--s-->
    </section>
    <!-- FIM das informações referente a page acessada ( conteúdo )-->

</section><!--FIM do  Miolo Internos ( Tudo abaixo do banner principal está dentro dessa Section )-->

<?php include_once DIR_INCLUDE.'rodape.php';?>

</div><!--FIM do CORPO SITE ( Tudo do site está dentro dessa div )-->


</body>
</html>