$(document).ready(function() {

	$("#frecuency").change(seleccionarFrecuencia);
	
	$("[name='amount_to_donate']").click(otraCantidad);
	
	$('#cc_date').on('keyup', formatCreditCardExpirationDate);
	
	$('#cc_number').validateCreditCard(showValidationFeedback);
	$("#frecuency").change();
});
	function formatCreditCardExpirationDate(e) {
		if (event.keyCode === 8) { // do not do anything is deleting
			return;
		}

		var value = $('#cc_date').val(); 
		console.log(value);
		if (value.length === 4) {
			$('#cc_date').val(value + '/');
		}
	}

function seleccionarFrecuencia(e){
	var seleccion = $("#frecuency").val();
	
	if(seleccion == 1)
	{
		$("#donacion_recurrente").hide();
		$("#txt_recurrente_donacion").hide();
		$("#js-form").attr("action", 'registrar_venta.php');
	}
	else{
		$("#donacion_recurrente").show();
		$("#txt_recurrente_donacion").show();
		$("#js-form").attr("action", 'guardar_donacion_recurrente.php');
	}
}

function otraCantidad(e)
{
	var seleccionRadio = $(e.target).val();
		
	if(seleccionRadio == "otra_cantidad")
	{
		$("#js-other_amount_to_donate").show();
	}
	else
	{
		$("#js-other_amount_to_donate").hide();
	}
}

function showValidationFeedback(result) {
	var cc_input = $('#cc_number');
	var cc_input_parent = cc_input.parent('.has-feedback');
	var cc_type = $('#cc_type');
	var type = result.card_type == null ? '-' : result.card_type.name;
	var isValid = result.valid && result.length_valid && result.luhn_valid;
	cc_type.val(type.toUpperCase());
	cc_input_parent.toggleClass('has-success', isValid);
}
