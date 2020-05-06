var Validate = function() {

	return {
		init: function() {

			jQuery.validator.addMethod("cc", function(value, element) {
				var isValid;

				$(element).validateCreditCard(function(result){
					isValid = result.valid && result.length_valid && result.luhn_valid;
				});

  				return isValid;

			}, "Por favor introduce una tarjeta de crédito válida");

			jQuery.validator.addMethod("cc_date", function(value, element) {
				var today 	= new Date();
				var mm 		= today.getMonth()+1; //January is 0!
				var yyyy 	= today.getFullYear();

				if (value.length < 7) {
					return false;
				}

				var date = value.split('/'); //["2017","11"]

				if (date[1] === undefined) { // If you write too quick, / does not get added
					return false;
				}
				var year = parseInt(date[0]);
				var month = parseInt(date[1])

				var reg = new RegExp('^[0-9]*$'); // check there are only numbers

				if ( !reg.test(year) || !reg.test(month) ) {
					return false;
				}

				if ( year < yyyy || year > 2999 || month > 12 ) {
					return false;
				} else if ( year === yyyy && month < mm) {
					return false;
				}

				return true;

			}, "Introduce una fecha correcta, con formato YYYY/MM");

			jQuery.validator.addMethod("cc_year", function(value, element) {

				return yyyy <= value;
			}, "Mayor que este año");

			$('.validate').validate({
			    rules: {
			        name:
			        {
			            required: true
			        },
			        lastname:
			        {
			            required: true
			        },        
			        email:
			        {
			            required: true,
			            email: true
			        },
			        phone:
			        {
			            required: true,
			            minlength: 6
			        },
			        cc_name: {
			        	required: true
			        },
			        cc_number: {
			        	required: true,
			        	cc: true
			        },
			        cc_date: {
			        	required: true,
			        	cc_date: true
			        },
			        cc_type: {
			        	required: true
			        },
			        cc_cvc: {
			        	required: true
			        },
			        cc_document: {
						required: true
					},
					country: {
						required: true
					},
					certificado: {
						required: true
					},
					boletin: {
						required: true
					},
					montoDonacion: {
						required: true
					}
				},	
			    messages: {
			        email: {
			            required:   "Necesitamos tu email para poder contactarte de vuelta",
			            email:      "Necesitamos un email válido"
			        },
			        name: "Déjanos tu nombre, por favor",
			        lastname: "Déjanos tu apellido, por favor",
			        phone: "Déjanos tu teléfono, por favor",
			        cc_name: "Pon el nombre y apellidos que aparecen en la tarjeta",
			        cc_number:"Pon un número de tarjeta correcto",
			        cc_type: "Tipo",
			        cc_cvc: "Pon el cvc de la tarjeta",
			        cc_document: "Ingresa el nombre de la entidad Bancaria",
			        cc_date: "Ingresa una fecha válida",
			        country: "Dinos el país, por favor",
			        certificado: "Dinos si deseas Certificado de Donación",
			        boletin: "Dinos si te podemos enviar nuestro boletín",
			        montoDonacion: "Dinos el valor que deseas donar"
			    },

			});
		}
	}
}();
