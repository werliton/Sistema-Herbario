<?php include_once(DIR_INCLUDE . "head.php"); ?>


<section id="miolo_internos"><!-- Miolo Internos ( Tudo abaixo do banner principal está dentro dessa Section )-->

        <figure> 
            <img src="<?php echo DIR_IMG; ?>/barra_agendDetail.gif"  height="79" title="O Hospital">   </figure> 


    <section class="informacoes_internos"><!-- Informações referente a page acessada ( conteúdo )-->
<img src="<?php echo DIR_IMG; ?>/alerta.gif" title="" />
<b>Nesta seção estão todos os dados do agendamento detalhadamente!</b>
        <br>
        <br>
        <?php echo form_open('../agendamentoConsulta'); ?> 
        <?php
        if (isset($listagem)) {
            foreach ($listagem as $lista) {
                $agend_id = $lista->agend_id;
                $paciente_id = $lista->id_paciente;
                $nome = $lista->nome;
                $cpf = $lista->cpf;
                $email = $lista->email;
                $fixo = $lista->fone;
                $celular = $lista->celular;
                $endereco = $lista->endereco;
                $dataAgend = $lista->data;
                $horario = $lista->horario;
                $idade = $lista->nascimento;
                $tipoEnvio = $lista->tipoEnvio;
            }
        }
        ?>
        <table width="100%" border="0" cellpadding="4" cellspacing="4">
            <tr>
                <td colspan="2" class="data_imprensa">DADOS DO PACIENTE:</td>
                <td>&nbsp;</td>
            </tr>
            <tr>
                <td>&nbsp;</td>
                <td align="left">&nbsp;</td>
                <td>&nbsp;</td>
            </tr>
            <tr>
                <td width="131">Nome Completo:</td>
                <td width="397" align="left" colspan="2">

                    <?php echo strtoupper($nome); ?>

                </td>
            </tr>
            <tr>
                <td>CPF:</td>
                <td align="left">

                    <?php echo empty($cpf) ? "Não possui CPF" : $cpf; ?>

                </td>
                <td width="85">&nbsp;</td>
            </tr>
            <tr>
                <td width="131">Data de nascimento:</td>
                <td width="397" align="left">
                    <?php echo date("d/m/Y", strtotime($idade)); ?>
                </td>
                <td width="85">&nbsp;</td>
            </tr>
            <tr>
                <td>E-mail:</td>
                <td align="left"><label for="email"></label>
                    <?php echo $email; ?>
                </td>
                <td>&nbsp;</td>
            </tr>
            <tr>
                <td>Telefone Fixo:</td>
                <td align="left"><label for="ddd"></label>
                    <label for="telFixo"></label>
                    <?php echo $fixo; ?>
                </td>
                <td>&nbsp;</td>
            </tr>
            <tr>
                <td>Celular:</td>
                <td>
                    <label for="textfield"></label> 
                    <?php echo $celular; ?>
                </td>
                <td>&nbsp;</td>
            </tr>

            <tr>
                <td>Endereço:</td>
                <td><label for="endereco"></label>
                    <?php echo $endereco; ?>
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
                        <a href="/paciente/pacienteEdit/id/<?php echo $paciente_id; ?>/aid/<?php echo $agend_id; ?>">
                            <img src="<?php echo DIR_IMG; ?>/icones/alterarDados.png" alt="Já cadastrado"/> 
                        </a>
                    </figure>
                </td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
            </tr>
            <tr>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
            </tr>
            <tr>
                <td colspan="2" class="data_imprensa">DADOS DO AGENDAMENTO:</td>
                <td>&nbsp;</td>
            </tr>
            <tr>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
            </tr>

            <tr>
                <td>Data de preferência:</td>
                <td><label for="data"></label>
                    <?php echo date("d/m/Y", strtotime($dataAgend)); ?>
                </td>
                <td>&nbsp;</td>
            </tr>
            <tr>
                <td>Horário:</td>
                <td><label for="horario"></label>
                    <?php echo $horario; ?>
                </td>
                <td>&nbsp;</td>
            </tr>
            <tr>
                <td>Pedido enviado por:</td>
                <td>
                    <?php echo $tipoEnvio; ?>
                </td>
                <td>&nbsp;</td>
            </tr>
            <tr>
                <td>&nbsp;</td>
                <td align="left">&nbsp;</td>
                <td>&nbsp;</td>
            </tr>

            <tr>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
            </tr>
            <?php
            if ($lista->status == 0 && $lista->data >= date('Y-m-d')):
                ?>
                <tr>
                    <td>
                        <figure> 
                            <a href="/agendamentoConsulta/atendimento/pid/<?php echo $paciente_id; ?>/aid/<?php echo $agend_id; ?>">
                                <img src="<?php echo DIR_IMG; ?>/icones/confirma.png" alt="Confirmar"/> 
                            </a>
                        </figure>
                    </td>
                    <td>
                        <figure> 
                            <a href="/listaAgendamentos/agendamentoEdit/id/<?php echo $agend_id; ?>">
                                <img src="<?php echo DIR_IMG; ?>/icones/editaAgendamento.png" alt="Confirmar"/> 
                            </a>
                        </figure>
                    </td>
                    <td>
                        &nbsp;
                    </td>
                    <td>
                        <figure> 
                            <a href="/agendamentoConsulta/cancelarAgendamento/id/<?php echo $agend_id; ?>" onclick="return confirm('Deseja realmente cancelar consulta?')">
                                <img src="<?php echo DIR_IMG; ?>/icones/cancelAgendamento.png" alt="Confirmar"/> 
                            </a>
                        </figure>
                    </td>
                </tr>
                <?php
            endif;
            ?>
            <tr>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
            </tr>
        </table>


        </form>
    </section>
    <!-- FIM das informações referente a page acessada ( conteúdo )-->


</section><!--FIM do  Miolo Internos ( Tudo abaixo do banner principal está dentro dessa Section )-->

<?php include_once DIR_INCLUDE . 'rodape.php'; ?>

</div><!--FIM do CORPO SITE ( Tudo do site está dentro dessa div )-->


</body>
</html>