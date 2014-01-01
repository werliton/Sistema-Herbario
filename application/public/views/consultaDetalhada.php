<?php include_once(DIR_INCLUDE . "head.php"); ?>


<section id="miolo_internos"><!-- Miolo Internos ( Tudo abaixo do banner principal está dentro dessa Section )-->

    <header class="titulos_internos"> 

        <figure> <img src="<?php echo DIR_IMG; ?>/barra_agendamentoexame.gif" alt="Agendamento de Exames" width="648" height="79" title="O Hospital">   </figure> 

    </header>

    <?php include_once(DIR_INCLUDE . "colunaEsquerda.php"); ?>

    <section class="informacoes_internos"><!-- Informações referente a page acessada ( conteúdo )-->

        A data e horário solicitados serão previamente confirmados em um prazo máximo de 24h, nos seguintes dias e horários: Segunda a sexta das 8h às 19h.
        <br>
        <br>
        <br>
        <form name="agendamento" id="agendamento" method="post" action="">

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

                        <input name="nome" type="text" id="nome" size="50" maxlength="50">

                    </td>
                    <td width="85">&nbsp;</td>
                </tr>
                <tr>
                    <td>E-mail:</td>
                    <td align="left"><label for="email"></label>
                        <input name="email" type="text" id="email" size="50" maxlength="50">
                    </td>
                    <td>&nbsp;</td>
                </tr>
                <tr>
                    <td>Telefone Fixo:</td>
                    <td align="left"><label for="ddd"></label>
                        <label for="telFixo"></label>
                        <input name="telFixo" type="text" id="telFixo" size="30" maxlength="20">
                    </td>
                    <td>&nbsp;</td>
                </tr>
                <tr>
                    <td>Celular:</td>
                    <td>
                        <label for="textfield"></label> 
                        <input name="celular" type="text" id="celular" size="30" maxlength="20">

                    </td>
                    <td>&nbsp;</td>
                </tr>
                
                <tr>
                    <td>Endereço:</td>
                    <td><label for="endereco"></label>
                        <input name="endereco" type="text" id="endereco" size="50" maxlength="50">
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
                <tr>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                </tr>
                
                <tr>
                    <td>Data de preferência:</td>
                    <td><label for="data"></label>
                        <input name="dataPreferencia" type="text" id="dataPreferencia" size="20">
                    </td>
                    <td>&nbsp;</td>
                </tr>
                <tr>
                    <td>Horário:</td>
                    <td><label for="horario"></label>
                        <select name="horario" size="1" id="horario">
                            <option value="" selected="true">Escolha um horário</option>
                            <option value="8:00">8:00</option>
                            <option value="9:00">9:00</option>
                            <option value="10:00">10:00</option>
                            <option value="11:00">11:00</option>
                            <option value="12:00">12:00</option>
                            <option value="13:00">13:00</option>
                            <option value="14:00">14:00</option>
                            <option value="15:00">15:00</option>
                            <option value="16:00">16:00</option>
                            <option value="17:00">17:00</option>
                            <option value="18:00">18:00</option>
                        </select>
                    </td>
                    <td>&nbsp;</td>
                </tr>
                <tr>
                    <td>Pedido enviado por:</td>
                    <td>
                        <input type="radio" name="tipoEnvio" id="radio" value="email">
                        E-mail 
                        <input type="radio" name="tipoEnvio" id="radio2" value="TelefoneFixo">
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
                    <td align="left"><input type="submit" name="button" id="button" value="Enviar pedido de Agendamento"></td>
                    <td>&nbsp;</td>
                </tr>
                <tr>
                    <td colspan="3">&nbsp;</td>
                </tr>
                <tr>
                    <td colspan="3">Este é um Pré-agendamento do seu exame ou consulta. Em breve a nossa Central de Atendimento entrará em contato para confirmação. Se preferir, agende sua consulta diretamente pela Central: (98) 3034-4532</td>
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

<?php include_once DIR_INCLUDE.'rodape.php';?>

</div><!--FIM do CORPO SITE ( Tudo do site está dentro dessa div )-->


</body>
</html>