/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
$(function(){
    $("#btnMarca").click(function(){
       
        var data = $("#dataAgendamento").val();
        var hora = $("#horaAgend").val();
        alert('Aqui1');
        if(data != "" && hora != ""){
            alert('Aqui2');
            
            $.post("../agendamentoConsulta/validaAgendamento",{
                data:data
            },function(retorno){                
                if(retorno){
                    alert('Aqui3');
                    alert(retorno);
                    $("#dataAgendamento").val("");
                    $("#dataAgendamento").focus();
                    $("#horaAgend").val("");
                    $("#horaAgend").focus();
                }            
            });
        }
    });
})

