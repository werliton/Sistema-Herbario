<?php include_once(DIR_INCLUDE . "head.php"); ?>


<section id="miolo_internos"><!-- Miolo Internos ( Tudo abaixo do banner principal está dentro dessa Section )-->

     <figure> <img src="<?php echo DIR_IMG; ?>/barra_agendconsultas.gif" alt=""  height="79" title="O Hospital">   </figure> 


    <section class="informacoes_internos"><!-- Informações referente a page acessada ( conteúdo )-->

        <img src="<?php echo DIR_IMG; ?>/alerta.gif" title="" /> A data e horário solicitados serão previamente confirmados em um prazo máximo de 24h, nos seguintes dias e horários: Segunda a sexta das 8h às 19h.
        <br>
        <br>
        <span class="aviso">
            <?php
        if(isset ($msg)){
            echo '<h3><img src="'.DIR_IMG,'/alertaErro.gif" title="" />'.$msg.'</h3>';
        }
        ?>
        </span>
        <br>
        <?php echo form_open('../paciente/salvar',array('id'=>'formulario'));  ?> 

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
                    <td>CPF:</td>
                    <td align="left">

                        <input name="cpf" type="text" id="cpf" size="50" maxlength="50">

                    </td>
                    <td width="85">&nbsp;</td>
                </tr>
                <tr>
                    <td width="131">Data de nascimento:</td>
                    <td width="397" align="left">

                        <input name="nascimento" type="text" id="idade" class="data" size="20" maxlength="50">

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
                        <input name="fone" type="text" id="fone" size="30" maxlength="20">
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
                    <td align="left"><input type="submit" name="button" id="button" value="Salvar e Continuar"></td>
                    <td>&nbsp;</td>
                </tr>
                <tr>
                    <td colspan="3">&nbsp;</td>
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