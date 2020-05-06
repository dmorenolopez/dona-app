<?php
	// descomentar estas dos líneas para que aparezcan los errores en la página, debugging purposes
	error_reporting(E_ALL);
	ini_set('display_errors', 'On');
	
	//~ formato moneda
	setlocale(LC_MONETARY, 'es_CO');
	
	$EN_PRODUCCION = true;
	//~ $EN_PRODUCCION = false;
	
	require_once 'sdk_recurrentes/lib/PayU.php';
	
	if ($EN_PRODUCCION) 
	{
		//~ en producción
			PayU::$apiKey = "13f16610c65"; //Ingrese aquí su propio apiKey // real
			PayU::$apiLogin = "YO981R086Y6d63R"; //Ingrese aquí su propio apiLogin. // real
			PayU::$merchantId = "102590"; //Ingrese aquí su Id de Comercio. // real
			PayU::$language = SupportedLanguages::ES; //Seleccione el idioma.
			PayU::$isTest = false; //Dejarlo True cuando sean pruebas.
		//~ URL de Pagos
			Environment::setPaymentsCustomUrl("https://api.payulatam.com/payments-api/4.0/service.cgi");  // real
		//~ URL de Consultas
			Environment::setReportsCustomUrl("https://api.payulatam.com/reports-api/4.0/service.cgi"); // real
		//~ URL de Suscripciones para Pagos Recurrentes
			Environment::setSubscriptionsCustomUrl("https://api.payulatam.com/payments-api/rest/v4.3/"); // real
			$account_id = "106633"; // real
	}
	else 
	{
		//~ en pruebas
			PayU::$apiKey = "4Vj8eK4rloUd272L48hsrarnUA"; //Ingrese aquí su propio apiKey. // test
			PayU::$apiLogin = "pRRXKOl8ikMmt9u"; //Ingrese aquí su propio apiLogin. // test
			PayU::$merchantId = "508029"; //Ingrese aquí su Id de Comercio.		// test
			PayU::$language = SupportedLanguages::ES; //Seleccione el idioma.
			PayU::$isTest = true; //Dejarlo True cuando sean pruebas.
		//~ URL de Pagos
			Environment::setPaymentsCustomUrl("https://sandbox.api.payulatam.com/payments-api/4.0/service.cgi"); // test
		//~ URL de Consultas
			Environment::setReportsCustomUrl("https://sandbox.api.payulatam.com/reports-api/4.0/service.cgi"); // test
		//~ URL de Suscripciones para Pagos Recurrentes
			Environment::setSubscriptionsCustomUrl("https://sandbox.api.payulatam.com/payments-api/rest/v4.3/"); // test
			$account_id = "512321"; // test
	}


	// Donation details:
    $name           = $_POST['name'] . " " . $_POST['lastname'];
    $phone          = $_POST['phone'] ?: '-';
    // $address        = '-';
    $email          = $_POST['email'];
    $donacion       = $_POST['amount_to_donate'];
    $donacion_libre = $_POST['free_amount_to_donate'];
    $value = $donacion === 'otra_cantidad' ? $donacion_libre : $donacion;
    $frecuencia_elegida = $_POST['frecuency'];
    $frecuencia = null;
    $frecuencia_plan = null;
    $intervalo_plan = 1;
	
	//~ // genera un arreglo con los datos adicionales
	$otrosDatos = array("country" => $_POST['country']
						, "certificado" => $_POST['certificado']);
    
    
    $organizacion = 'Hogares_Club_Michin';

	if ($frecuencia_elegida === "2") {
    	$frecuencia = "mensual";
		$frecuencia_plan = "MONTH";
    } else if ($frecuencia_elegida === "3") {
    	$frecuencia = "trimestral";
		$frecuencia_plan = "MONTH";
		$intervalo_plan = "3";
    } else if ($frecuencia_elegida === "4") {
    	$frecuencia = "semestral";
		$frecuencia_plan = "MONTH";
		$intervalo_plan = "6";
    } else if ($frecuencia_elegida === "5") {
    	$frecuencia = "anual";
		$frecuencia_plan = "YEAR";
    } else {
    	$frecuencia = "una sola vez";
    } 

    $cc_name     = $_POST['cc_name'];
    $cc_number   = $_POST['cc_number'];
    $cc_date     = $_POST['cc_date'];
    $cc_type     = $_POST['cc_type'];
    $cc_cvc     = $_POST['cc_cvc'];
    $cc_document = $_POST['cc_document'];
    $devide_session_id = $_POST['devide_session_id'];
	// $cookie = $_POST['cookie'];
	$cookie ="pt1t38347bs6jc9ruv2ecpv7o2";

    $reference = "_donacion_recurrente_" . $organizacion . time();
    
    try {

		$parameters = array(
				// Ingresa aquí el número de cuotas a pagar.
			PayUParameters::INSTALLMENTS_NUMBER => "1",
			// Ingresa aquí la cantidad de días de prueba
			PayUParameters::TRIAL_DAYS => "3",

			// -- Parámetros del cliente --
			// Ingresa aquí el nombre del cliente
			PayUParameters::CUSTOMER_NAME => $name,
			// Ingresa aquí el email del cliente
			PayUParameters::CUSTOMER_EMAIL => $email,

			// -- Parámetros de la tarjeta de crédito --
			// Ingresa aquí el nombre del pagador.
			PayUParameters::PAYER_NAME => $cc_name,
			// Ingresa aquí el número de la tarjeta de crédito
			PayUParameters::CREDIT_CARD_NUMBER => $cc_number,
			PayUParameters::CREDIT_CARD_SECURITY_CODE => $cc_cvc,
			// Ingresa aquí la fecha de expiración de la tarjeta de crédito en formato AAAA/MM
			PayUParameters::CREDIT_CARD_EXPIRATION_DATE => $cc_date,
			// Ingresa aquí el nombre de la franquicia de la tarjeta de crédito
			PayUParameters::PAYMENT_METHOD => $cc_type,
			// Ingresa aquí el documento de identificación asociado a la tarjeta VISA||MASTERCARD||AMEX||DINERS
			PayUParameters::CREDIT_CARD_DOCUMENT => $cc_document,
			// (OPCIONAL) Ingresa aquí el documento de identificación del pagador
			PayUParameters::PAYER_DNI => $cc_document,
			// (OPCIONAL) Ingresa aquí la primera línea de la dirección del pagador
			// PayUParameters::PAYER_STREET => $address,
			// (OPCIONAL) Ingresa aquí la segunda línea de la dirección del pagador
			// PayUParameters::PAYER_STREET_2 => "17 25",
			// (OPCIONAL) Ingresa aquí la tercera línea de la dirección del pagador
			// PayUParameters::PAYER_STREET_3 => "Of 301",
			// (OPCIONAL) Ingresa aquí la ciudad de la dirección del pagador
			// PayUParameters::PAYER_CITY => "City Name",
			// (OPCIONAL) Ingresa aquí el estado o departamento de la dirección del pagador
			// PayUParameters::PAYER_STATE => "State Name",
			// (OPCIONAL) Ingresa aquí el código del país de la dirección del pagador
			// PayUParameters::PAYER_COUNTRY => "CO",
			// (OPCIONAL) Ingresa aquí el código postal de la dirección del pagador
			// PayUParameters::PAYER_POSTAL_CODE => "00000",
			// (OPCIONAL) Ingresa aquí el número telefónico del pagador
			// PayUParameters::PAYER_PHONE => $phone,

			// -- Parámetros del plan --
			// Ingresa aquí la descripción del plan
			PayUParameters::PLAN_DESCRIPTION => "Plan " . $reference,
			// Ingresa aquí el código de identificación para el plan
			PayUParameters::PLAN_CODE => "plan-code" . $reference,
			// Ingresa aquí el intervalo del plan
			PayUParameters::PLAN_INTERVAL => $frecuencia_plan,
			// Ingresa aquí la cantidad de intervalos DAY||WEEK||MONTH||YEAR
			PayUParameters::PLAN_INTERVAL_COUNT => $intervalo_plan,
			// Ingresa aquí la moneda para el plan
			PayUParameters::PLAN_CURRENCY => "COP",
			// Ingresa aquí el valor del plan
			PayUParameters::PLAN_VALUE => $value,

			PayUParameters::REFERENCE_CODE => $reference,
			//(OPCIONAL) Ingresa aquí el valor del impuesto
			// PayUParameters::PLAN_TAX => "1600",
			//(OPCIONAL) Ingresa aquí la base de devolución sobre el impuesto
			// PayUParameters::PLAN_TAX_RETURN_BASE => "8400",
			// Ingresa aquí la cuenta Id del plan
			PayUParameters::ACCOUNT_ID => $account_id,
			// Ingresa aquí el intervalo de reintentos
			PayUParameters::PLAN_ATTEMPTS_DELAY => "1",
			// Ingresa aquí la cantidad de cobros que componen el plan
			PayUParameters::PLAN_MAX_PAYMENTS => "-1",
			// Ingresa aquí la cantidad total de reintentos para cada pago rechazado de la suscripción
			PayUParameters::PLAN_MAX_PAYMENT_ATTEMPTS => "3",
			// Ingresa aquí la cantidad máxima de pagos pendientes que puede tener una suscripción antes de ser cancelada.
			PayUParameters::PLAN_MAX_PENDING_PAYMENTS => "3",
			// Ingresa aquí la cantidad de días de prueba de la suscripción.
			PayUParameters::TRIAL_DAYS => "3",

			PayUParameters::DEVICE_SESSION_ID => $devide_session_id,
			//IP del pagadador
			PayUParameters::IP_ADDRESS => "127.0.0.1",
			//Cookie de la sesión actual.
			PayUParameters::PAYER_COOKIE=> $cookie,
			//Cookie de la sesión actual.        
			PayUParameters::USER_AGENT=>"Mozilla/5.0 (Windows NT 5.1; rv:18.0) Gecko/20100101 Firefox/18.0"
		);

		//~ ---------------------------------------------
		//~ DECODIFICACIÓN INFORMACIÓN RECIBIDA POR POST
		//~ ---------------------------------------------
		
		$quiereCertificado = $otrosDatos['certificado']==0?"No":"Sí";
	   
		//~ ---------------------------------------------
		//~ FIN
		//~ ---------------------------------------------
		
			$web 				= 'https://www.hogaresclubmichin.org/dona/dona.php';
			$myemail  		= "donativos@hogaresclubmichin.com"; 
			//$myemail  			= "lipolsan@gmail.com"; 
			$myemail2  			= $email;
			
			$emailsBCC		= array('administracion@socialmass.co'
									,'lindeliaps@socialmass.co ');	 
			 		
			// email subject
			$subject_admin   = "Club Michin > Alguien ha hecho una nurva donación";
			$subject_donante   = "Club Michin> Gracias por tu donación";

			//~ envío de mensaje a la organización con el detalle de la donación
			$message_success_admin = file_get_contents ("../envioMensajeDonacion/notifDonaRecurrente.xhtml");

			if($message_success_admin==false){
				echo "El archivo no cargó";
			}else{
				$message_success_admin = str_replace("..::WEB::..", $web, $message_success_admin);
				$message_success_admin = str_replace("..::NOMBRE::..", $name, $message_success_admin);
				$message_success_admin = str_replace("..::TELEFONO::..", $phone, $message_success_admin);
				$message_success_admin = str_replace("..::CORREOELECTRONICO::..", $email, $message_success_admin);
				$message_success_admin = str_replace("..::DONACION::..", money_format('%.0i', $value), $message_success_admin);
				$message_success_admin = str_replace("..::PAIS::..", $otrosDatos['country'], $message_success_admin);
				$message_success_admin = str_replace("..::FRECUENCIA::..", $frecuencia , $message_success_admin);
				$message_success_admin = str_replace("..::CERTIFICADODONACION::..", $quiereCertificado, $message_success_admin);
				}

			// Additional headers
			$headers = 'From: Hogares Club Michín <donativos@hogaresclubmichin.com>'. "\r\n";
			$headers  = 'MIME-Version: 1.0' . "\r\n";
			$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
			$headers .= 'Bcc: '.join(',', $emailsBCC)." \r\n";
			
			$response = PayUSubscriptions::createSubscription($parameters);

			if ($response) {

				$fecha_inicio 	= explode("T", $response->currentPeriodStart); //DD-MM-YYTHH:MM
				$fecha_fin 		= explode("T", $response->currentPeriodEnd);
			
				$nueva_url = "Location: dona.php?status=donated&inicio=" . $fecha_inicio[0] . "&frecuencia=" . $frecuencia . "&nombre=" . $name . "&id=" . $response->id . "&plan=Plan " . $reference;
				header($nueva_url);

				//~ Envío del mensaje a la organización
				mail($myemail, $subject_admin, $message_success_admin, $headers);	

				//~ envío de mensaje al donante con el detalle de la misma
				$mensajeDonante = file_get_contents ("../envioMensajeDonacion/notifDonaDonante.xhtml");
				
				if($mensajeDonante==false){
					echo "El archivo no cargó";
				}else{ 
					$mensajeDonante = str_replace("..::DONACION::..", money_format('%.0i', $value), $mensajeDonante);
					$mensajeDonante = str_replace("..::FRECUENCIA::..", $frecuencia , $mensajeDonante);	
					$mensajeDonante = str_replace("..::FECHADESCUENTO::..", $fecha_inicio[0], $mensajeDonante);	
					$mensajeDonante = str_replace("..::ID::..", $response->id, $mensajeDonante);		
				}
				
				//~ Envío del mensaje al donante
				mail($myemail2, $subject_donante, $mensajeDonante, $headers);
			}
			
	} catch (PayUException $e) {
        header("Location: dona.php?status=error&error={$e->getMessage()}&nombre=" . $name);
    }
?>
