$(document).ready(function(){	 
        $("#formulario").validate({
            rules:{
                    nome:{required:true},
                    email:{required:true,email:true},
                    endereco:{required:true}
            },
            messages:{
                    nome:{required:"Informe o nome"},
                    email:{required:"Informe o e-mail",email:"E-mail inválido!"},                 
                    endereco:{required:"Digite o endereço."}
            }	
        });
        
        $("#formAgendamento").validate({
            rules:{
                data:{require:true}
            },
            messages:{
                data:{require:"Informe uma data."}
            }            
        });
		
})