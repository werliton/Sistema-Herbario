<?php include_once(DIR_INCLUDE . "head.php"); ?>


<section id="miolo_internos"><!-- Miolo Internos ( Tudo abaixo do banner principal está dentro dessa Section )-->

 
        <figure>
            <img src="<?php echo DIR_IMG; ?>/barra_agendconsultas.gif" height="79" title="O Hospital">   </figure> 


    <section class="informacoes_internos"><!-- Informações referente a page acessada ( conteúdo )-->

        
        <br>
        <?php echo form_open('../agendamentoConsulta/salvarAgendamento',array('id'=>'formAgendamento')); ?> 
        <?php
        if (isset($listagem)) {
            foreach ($listagem as $lista) {
                $nome = $lista->nome;
                $cpf = $lista->cpf;
                $email = $lista->email;
                $fixo = $lista->fone;
                $celular = $lista->celular;
                $endereco = $lista->endereco;
                $idade = $lista->nascimento;
                $paciente_id = $lista->paciente_id;
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
                <td width="131">Nome Completo:

                </td>
                <td width="397" align="left">

                    <?php echo $nome; ?>

                </td>
                <td width="85">&nbsp;</td>
            </tr>
            <tr>
                <td>CPF:</td>
                <td align="left">
                    <?php echo $cpf; ?>

                </td>
                <td width="85">&nbsp;</td>
            </tr>
            <tr>
                <td width="131">Data de nascimento:</td>
                <td width="397" align="left">
                    <?php echo date('d/m/Y',strtotime($idade)); ?>
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
                    <?php echo $endereco.date('H:i');?>
                </td>
                <td>&nbsp;</td>
            </tr>
            <tr>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
            </tr>
            <tr>
                <td colspan="2" class="data_imprensa">DADOS DO AGENDAMENTO</td>
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
                    <input name="data" type="text" id="data" class="data" size="20">
                </td>
                <td>&nbsp;</td>
            </tr>
            <tr>
                <td>Horário:</td>
                <td><label for="horario"></label>
                    <select name="horario" size="1" id="horario">
                        <option value="08:00">Manhã</option>
                        <option value="14:00">Tarde</option>
                    </select>
                </td>
                <td>&nbsp;</td>
            </tr>
            <tr>
                <td>Pedido enviado por:</td>
                <td>
                    <input type="radio" name="tipoEnvio" id="radio" value="email">
                        E-mail
                    <input type="radio" name="tipoEnvio" id="radio2" value="Telefone Fixo" >
                        Telefone Fixo
                    <input type="radio" name="tipoEnvio" id="radio3" value="Celular">
                        Celular
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
                <td align="left">
                    <input type="submit" name="button" id="button" value="Salvar Agendamento"></td>
                <td>&nbsp;</td>
            </tr>
            <tr>
                <td colspan="3"><input name="paciente_id" type="hidden" size="20" value="<?php echo $paciente_id; ?>"></td>
            </tr>
            <tr>
                <td colspan="3"></td>
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
<?php
                    $msg = $this->uri->segment(5);
                    if(isset ($msg) && $msg=='msg'){
                        $msg_val = $this->uri->segment(6);
                        if($msg_val == 1){
                            echo '<h3><img src="'.DIR_IMG,'/alertaErro.gif" title="" />EXCEDEU O LIMITE DE AGENDAMENTO PARA O PERÍODO INFORMADO!</h3>';
                        }elseif($msg_val == 0){
                            echo '<h3><img src="'.DIR_IMG,'/alertaErro.gif" title="" />Informe uma data e horário superior ao atual!</h3>';
                        }
                    }
                    ?>

        </form>
    </section>
    <!-- FIM das informações referente a page acessada ( conteúdo )-->


</section><!--FIM do  Miolo Internos ( Tudo abaixo do banner principal está dentro dessa Section )-->

<?php include_once DIR_INCLUDE . 'rodape.php'; ?>

</div><!--FIM do CORPO SITE ( Tudo do site está dentro dessa div )-->


</body>
</html>