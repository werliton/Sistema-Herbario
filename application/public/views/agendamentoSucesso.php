<?php include_once(DIR_INCLUDE . "head.php"); ?>


<section id="miolo_internos"><!-- Miolo Internos ( Tudo abaixo do banner principal está dentro dessa Section )-->

    <section class="informacoes_internos"><!-- Informações referente a page acessada ( conteúdo )-->

        <br>
        <br>
        <span class="aviso">

        </span>
        <br>
<?php
if (isset ($listagem)) {
    $agend_id = $listagem;
}
?>
        <table width="100%" border="0" cellpadding="4" cellspacing="4">
           
            <tr>
                <td width="131"></td>
                <td width="397" align="left"></td>
                <td width="85">&nbsp;</td>
            </tr>
            <tr>
                <td></td>
                <td align="left"></td>
                <td width="85">&nbsp;</td>
            </tr>
            <tr>
                <td width="131"></td>
                <td width="397" align="left"></td>
                <td width="85">&nbsp;</td>
            </tr>
            <tr>
                <td align="left">
                    
                </td>
                <td>
                    
                </td>
                <td align="left">
                    
                </td>
                <td align="left">
                    
                </td>
                <td align="left">
                    
                </td>
                <td align="left">
                    
                </td>
                <td align="left">
                    
                </td>
                <td align="left">
                    <figure> 
                        <a href="/listaAgendamentos/agendamentoDetalhado/id/<?php echo $agend_id; ?>">
                        <img src="<?php echo DIR_IMG; ?>/icones/agendSucesso.png" alt="Sucesso"/> 
                        </a>
                    </figure> 
                </td>
                <td align="left">
                    
                </td>
                <td align="left">
                    
                </td>
                <td>
                    
                </td>
                <td align="left">
                    
                </td>
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

    </section>
    <!-- FIM das informações referente a page acessada ( conteúdo )-->


</section><!--FIM do  Miolo Internos ( Tudo abaixo do banner principal está dentro dessa Section )-->

<?php include_once DIR_INCLUDE . 'rodape.php'; ?>

</div><!--FIM do CORPO SITE ( Tudo do site está dentro dessa div )-->


</body>
</html>