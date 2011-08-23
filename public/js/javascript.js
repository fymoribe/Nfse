function mascara(){
//	jQuery(function($){
	   $("#cepTomador").mask("99999-999");
	   $("#telefoneTomador").mask("(99) 9999-9999");
	//});
}

$(document).ready(function() { 
	$("#confirm_button").click(function() {
		jConfirm('Deseja Deletar?', 'Confirmation', function(r) {
			if (r == true){
				jAlert('Confirmed: ' + r, 'Confirmation Results');
			}			
		});
	});
	
    $("table") 
    .tablesorter({widthFixed: true, widgets: ['zebra']}) 
    .tablesorterPager({container: $("#pager")}); 
}); 


/*
$().ready(function() {	
	// validate signup form on keyup and submit
	$("#clientesAdd").validate({
		rules: {
			cpfCnpjTomador: "required",
			inscricaoMunicipalTomador: "required",
			razaoSocialTomador: "required",
			enderecoTomador: "required",
			numeroEnderecoTomador: "required",
			complementoEnderecoTomador: "required",
			bairroTomador: "required",
			paisTomador: "required",
			cepTomador: "required",
			emailTomador: "required",
			telefoneTomador: "required"
		},
		messages: {
			cpfCnpjTomador: "Digite um CPF/CNPJ ",
			inscricaoMunicipalTomador: "Digite o CNPJ",
			razaoSocialTomador: "Digite a Razao Social",
			enderecoTomador: "Digite o endere�o",
			numeroEnderecoTomador: "Digite o numero",
			complementoEnderecoTomador: "Digite o complemento",
			bairroTomador: "Digite o bairro",
			paisTomador: "Digite o Pais",
			cepTomador: "Digite o CEP",
			emailTomador: "Digite o email",
			telefoneTomador: "Digite o telefone"
		}
	});
});
*/

//carrega cidade no form
$(document).ready(function() {
	var uf = $('#ufTomador').val();
	if(typeof uf != "undefined"){
	   if (uf != ""){
		   var cid = $('#cidHiddenTomador').val();
		   carregarCidadesByEstado(uf, cid);
	   }	   
	}   
});

//carrega cidade no form
$(document).ready(function() {
	var uf = $('#ufPrestador').val();
	if(typeof uf != "undefined"){
	   if (uf != ""){
		   var cid = $('#cidHiddenPrestador').val();
		   carregarCidadesByEstado(uf, cid);
	   }	   
	}   
});

//$(document).ready(function() {
//	try {
//		for ( var form in $('#empresaInfo').chidren()) {
//			form.attr("disabled", "disabled");
//		}
//	} catch (e) {
//		// TODO: handle exception
//	}
//});



//function habilitarForm(id) { 
//    var form = document.getElementById(id);
//    for (var i=0; i < form.elements.length; i++) {
//        if ( (form.elements[i].type != 'hidden')
//          || (form.elements[i].type != 'button')
//          || (form.elements[i].type != 'reset')
//          || (form.elements[i].type != 'submit') ) {
//        		//form.elements[i].removeAttr("disabled");
//                form.elements[i].disabled = false;
//          }
//    }
//}

