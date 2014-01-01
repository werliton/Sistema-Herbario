<?php include_once(DIR_INCLUDE . "head.php"); ?>


<section id="miolo_internos"><!-- Miolo Internos ( Tudo abaixo do banner principal está dentro dessa Section )-->


    <figure> <img src="<?php echo DIR_IMG; ?>/barra_agendconsultas.gif" alt="Agendamento de Exames"  height="79" title="O Hospital">   </figure> 


    <section class="informacoes_internos"><!-- Informações referente a page acessada ( conteúdo )-->

       <img src="<?php echo DIR_IMG; ?>/alerta.gif" title="" /> A data e horário solicitados serão previamente confirmados em um prazo máximo de 24h, nos seguintes dias e horários: Segunda a sexta das 8h às 19h.
        <br>
        <br>
        <br>
        <?php echo form_open('/paciente/buscaPacientes'); ?> 

        <table width="100%" border="0" cellpadding="4" cellspacing="4">
            <tr>
                <td colspan="2" class="data_imprensa">BUSCAR PACIENTE:</td>
                <td>&nbsp;</td>
            </tr>
            <tr>
                <td>&nbsp;</td>
                <td align="left">&nbsp;</td>
                <td>&nbsp;</td>
            </tr>
            <tr>
                <td width="131">Digite aqui o nome ou CPF do paciente

                </td>
                <td width="397" align="left">

                    <input name="nome" type="text" id="pesquisar" size="50" maxlength="50">

                </td>
                <td width="85">
                    <input name="buscar" type="submit"  size="50" maxlength="50" value="Buscar Paciente" ></td>
            </tr>
            <tr>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
            </tr>
        </table>

        </form>

        <!--  LISTAGEM DE DADOS  -->

        <?php
        if (isset($listagem) && !empty($listagem)) {
            if (count($listagem) <= 0) {
                echo '<h3>Nenhum paciente encontrado!</h3>';
            } else {
                echo '<h3>RESULTADO DA BUSCA - ('.count($listagem).') Encontrado(s)</h3><br>';

                foreach ($listagem as $lista):
                    ?>              
                    <section class="conj_imprensa">

                        <section class="data_imprensa"></section>

                        <section class="descricao_imprensa">
                            <?php echo strtoupper($lista->nome); ?>
                        </section>

                        <div class="dados_paciente">
                            <table width="100%" border="0" cellpadding="4" cellspacing="4">

                                <tr>
                                    <td>CPF:</td>
                                    <td align="left">

                                        <?php echo empty($lista->cpf) ? "Não possui CPF" : $lista->cpf; ?>

                                    </td>
                                    <td width="85">&nbsp;</td>
                                </tr>
                                <tr>
                                    <td width="131">Data de nascimento:</td>
                                    <td width="397" align="left">
                                        <?php echo date("d/m/Y", strtotime($lista->nascimento)); ?>
                                    </td>
                                    <td width="85">&nbsp;</td>
                                </tr>
                                <tr>
                                    <td>E-mail:</td>
                                    <td align="left"><label for="email"></label>
                                        <?php echo $lista->email; ?>
                                    </td>
                                    <td>&nbsp;</td>
                                </tr>
                                <tr>
                                    <td>Telefone Fixo:</td>
                                    <td align="left"><label for="ddd"></label>
                                        <label for="telFixo"></label>
                                        <?php echo $lista->fone; ?>
                                    </td>
                                    <td>&nbsp;</td>
                                </tr>
                                <tr>
                                    <td>Celular:</td>
                                    <td>
                                        <label for="textfield"></label> 
                                        <?php echo $lista->celular; ?>
                                    </td>
                                    <td>&nbsp;</td>
                                </tr>

                                <tr>
                                    <td>Endereço:</td>
                                    <td><label for="endereco"></label>
                                        <?php echo $lista->endereco; ?>
                                    </td>
                                    <td>&nbsp;</td>
                                </tr>
                                <tr>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                </tr>
                                <tr>
                                    <td>
                                        <figure> 
                                            <a href="/paciente/marcarConsulta/id/<?php echo $lista->paciente_id; ?>">
                                                <img src="<?php echo DIR_IMG; ?>/icones/marcarConsulta.png" alt="Marcar consulta"/> 
                                            </a>
                                        </figure>
                                    </td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                </tr>
                            </table>
                        </div>

                        <section class="linha_imprensa">  

                            <figure> <img src="<?php echo DIR_IMG; ?>linha_imprensa.gif" alt="Sala de Imprensa" title="Sala de Imprensa">   </figure> 

                        </section>
                    </section>

                    <?php
                endforeach;
            }
        }
        ?>  

        <!--FIM DA LISTAGEM DE DADOS -->
    </section>
    <!-- FIM das informações referente a page acessada ( conteúdo )-->


</section><!--FIM do  Miolo Internos ( Tudo abaixo do banner principal está dentro dessa Section )-->

<?php include_once DIR_INCLUDE . 'rodape.php'; ?>

</div><!--FIM do CORPO SITE ( Tudo do site está dentro dessa div )-->


</body>
</html>