/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
$(function(){
    $("#dataAgendamento").change(function(){
        beforeSend:
            var data = $("#dataAgendamento").val()
        if(data != ""){
            //Envia para o arquivo php a categoria selecionada e retorna o resultado da pesquisa
            $.post("/agendamentoConsulta/verificaLimite",{
                data:data
            },function(retorno){	
                if(retorno!=''){
                    alert(retorno);
                    $("#dataAgendamento").val("");
                    $("#dataAgendamento").focus();
                }            
            })
        }
    });
})

