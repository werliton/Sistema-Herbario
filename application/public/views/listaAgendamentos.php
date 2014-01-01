<?php include_once(DIR_INCLUDE . "head.php"); ?>


<section id="miolo_internos"><!-- Miolo Internos ( Tudo abaixo do banner principal está dentro dessa Section )-->

    <figure> 
        <img src="<?php echo DIR_IMG; ?>/barra_agenddiarios.gif" alt="Agendamento de Exames" 
             height="79" title="O Hospital">   
    </figure> 

    <section class="informacoes_internos"><!-- Informações referente a page acessada ( conteúdo )-->
        <br>
        <img src="<?php echo DIR_IMG; ?>/alerta.gif" title="" />
        <b>Aqui são exibidos, de acordo com o filtro, somente os agendamentos referente à data atual</b>
        <br>
        <br>
        <br>
        <?php echo form_open('../listaAgendamentos'); ?> 
        <div class="demo">
            <table width="70%" border="0" cellpadding="4" cellspacing="4">
                <tr>
                    <td colspan="3">Escolha o horário:</td>
                </tr>
                <tr>
                    <td width="131">Período</td>
                    <td width="300" align="left">
                        <select name="horario" size="1" id="horario">
                            <option value="" selected="true">Escolha um horário</option>
                            <option value="8:00">Manhã</option>
                            <option value="14:00">Tarde</option>
                        </select>
                    </td>
                    <td width="185">
                        <input type="submit" name="button" id="button" value="Visualizar">
                    </td>
                </tr>
                <tr>
                    <td>&nbsp;</td>
                    <td align="left">

                    </td>
                    <td>&nbsp;</td>
                </tr>
            </table>
        </div>

        </form>

        <?php
        if (isset($listagem)) {
            if (count($listagem) == 0) {
                echo '<h3><img src="'.DIR_IMG.'/alertaErro.gif" title="" /> Não há agendamentos de consulta para hoje!</h3>';
            } else {
                echo '<h3>Agendamentos de Consulta do dia '.date("d/m/Y").'</h3></br>';
                foreach ($listagem as $lista):
                    ?>              
                    <section class="conj_imprensa">
                        <section class="data_imprensa"> <?php echo $lista->horario; ?>  </section>                     
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


    </section><!-- FIM das Informações referente a page acessada ( conteúdo )-->

</section><!--FIM do  Miolo Internos ( Tudo abaixo do banner principal está dentro dessa Section )-->

<?php include_once DIR_INCLUDE . 'rodape.php'; ?>

</div><!--FIM do CORPO SITE ( Tudo do site está dentro dessa div )-->


</body>
</html>