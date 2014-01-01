/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
$(document).ready(function(){
    $("#pesquisar").autocomplete("../paciente/buscaPacientesAutoComplete", {
            width:280,
            selectFirst: false
    });
});