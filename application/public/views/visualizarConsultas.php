<?php include_once(DIR_INCLUDE . "head.php"); ?>


<section id="miolo_internos"><!-- Miolo Internos ( Tudo abaixo do banner principal está dentro dessa Section )-->

    <figure> 
        <img src="<?php echo DIR_IMG; ?>/barra_verconsultas.gif" alt="Agendamento de Exames" 
             height="79" title="O Hospital">   
    </figure> 
    <section class="informacoes_internos"><!-- Informações referente a page acessada ( conteúdo )-->
        </br><img src="<?php echo DIR_IMG; ?>/alerta.gif" title="" />
        <b>Nesta seção é possível visualizar todos agendamentos de consultas dentro de um determinado período</b>
        <br>
        <?php echo form_open('../verConsultas'); ?> 
        <div class="demo">
            <table width="100%" border="0" cellpadding="4" cellspacing="4">
                <tr>
                    <td colspan="2" class="data_imprensa"></td>
                    <td>&nbsp;</td>
                </tr>
                <tr>
                    <td>INFORME UM PERÍODO DE BUSCA</td>
                    <td align="left">&nbsp;</td>
                    <td>&nbsp;</td>
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
                        <input name="df" type="text" class="data" size="20" maxlength="50">
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
        </div>

        </form>

        <!--  asd  -->

        <?php
        if (isset($listagem)) {
            if (count($listagem) == 0) {
                echo '<h3><img src="'.DIR_IMG.'/alertaErro.gif" title="" /> Não há consultas marcadas no período informado!</h3>';
            } else {
                echo '<h3>RESULTADO DA BUSCA</h3><br>';
              
                foreach ($listagem as $lista):
                    ?>              
                    <section class="conj_imprensa">

                        <section class="data_imprensa"> <?php echo date("d/m", strtotime($lista->data)) . ' - ' . $lista->horario; ?>  </section>

                        <section class="descricao_imprensa">
                            <a href="/listaAgendamentos/agendamentoDetalhado/id/<?php echo $lista->agend_id; ?>" class="noticiasl">
            <?php echo strtoupper($lista->nome); ?>
                            </a>
                        </section>

                        <section class="linha_imprensa">  

                            <figure> <img src="<?php echo DIR_IMG; ?>linha_imprensa.gif" alt="Sala de Imprensa" title="Sala de Imprensa">   </figure> 

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

<?php include_once DIR_INCLUDE . 'rodape.php'; ?>

</div><!--FIM do CORPO SITE ( Tudo do site está dentro dessa div )-->


</body>
</html>