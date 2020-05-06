<?php

	//~ formato moneda
	setlocale(LC_MONETARY, 'es_CO');

	if ($_SERVER['REQUEST_METHOD']=='POST') {

		$reference = $_POST['reference_sale'];

		// Insert details in db
		$status_transaccion 	= $_POST['state_pol'];
		$status_description		= $_POST['response_code_pol'];	
		$payment_method_id 		= $_POST['payment_method_id'];
		$transaction_id 		= $_POST['transaction_id'];
		$payment_method_name 	= $_POST['payment_method_name'];
		$authorization_code 	= $_POST['authorization_code'];

		// Send confirmation email
		$email 					= $_POST['email_buyer'];
		$cantidad 				= $_POST['value'];
		$description 			= $_POST['description'];
		$frecuencia				= $_POST['extra1'];
		$nombre					= $_POST['extra2'];
		$otrosDatos				= $_POST['extra3'];
		
		$otrosDatos = htmlspecialchars_decode($otrosDatos);
		$otrosDatos = json_decode ($otrosDatos);

	//~ ---------------------------------------------
	//~ DECODIFICACIÓN INFORMACIÓN RECIBIDA POR POST
	//~ ---------------------------------------------
		
		$quiereCertificado = $otrosDatos->certificado==0?"No":"Sí";
		
		$frecuenciaDonacion = "";
		switch ($frecuencia){
			case 2:
				$frecuenciaDonacion = "Mensual";
			break;
			
			case 3:
				$frecuenciaDonacion = "Trimestral";
			break;
			
			case 4:
				$frecuenciaDonacion = "Semestral";
			break;
		
			case 5:
				$frecuenciaDonacion = "Anual";
			break;
			
			case 1:
				$frecuenciaDonacion = "Una sola vez";
			break;
			
			default:
				echo "Hubo un error al registrar la frecuencia de la donación";
		}
		
		$estadoTransaccion = "";
		if (($status_transaccion == 4) && ($status_description == 1)) {
			$estadoTransaccion = "Transacción Aprobada";	
		}elseif (($status_transaccion == 5) && ($status_description == 20))  {
				$estadoTransaccion = "La transacción expiró";
		}elseif ($status_transaccion == 6){
				switch ($status_description){
					case 4:
						$estadoTransaccion = "Transacción rechazada por la entidad financiera";
					break;
					
					case 5:
						$estadoTransaccion = "Transacción rechazada por el banco";
					break;
					
					case 6:
						$estadoTransaccion = "Fondos insuficientes";
					break;
					
					case 7:
						$estadoTransaccion = "Tarjeta inválida";
					break;
				
					case 8:
						$estadoTransaccion = "Débito automático no autorizado";
					break;
					
					case 9:
						$estadoTransaccion = "Tarjeta expirada";
					break;
					
					case 10:
						$estadoTransaccion = "Tarjeta restringida";
					break;
					
					case 12:
						$estadoTransaccion = "Fecha de vencimiento o código de seguridad inválidos";
					break;
					
					case 13:
						$estadoTransaccion = "Repetir transacción";
					break;
					
					case 14:
						$estadoTransaccion = "Transacción inválida";
					break;
					
					case 17:
						$estadoTransaccion = "El valor excede el máximo permitido por la entidad";
					break;
				
					case 19:
						$estadoTransaccion = "Transacción abandonada por el donante";
					break;
					
					case 22:
						$estadoTransaccion = "La tarjeta no está autorizada para compras en línea";
					break;
					
					case 23:
						$estadoTransaccion = "Transacción rechazada por sospecha de fraude";
					break;
					
					case 9995:
						$estadoTransaccion = "No se ha encontrado el certificado digital";
					break;
					
					case 9996:
						$estadoTransaccion = "No hay comunicación con la entidad financiera";
					break;
					
					case 9997:
						$estadoTransaccion = "Error al comunicarse con la entidad financiera";
					break;
					
					case 9998:
						$estadoTransaccion = "Transacción no permitida";
					break;
					
					case 9999:
						$estadoTransaccion = "Error";
					break;
					
					default:
						$estadoTransaccion = "Hubo un error en el procesamiento de la transacción";
				}
		}else{
				$estadoTransaccion = "Hubo un error en el procesamiento de la transacción";
			}
	//~ ---------------------------------------------
	//~ FIN
	//~ ---------------------------------------------			
		
		$web 				 	= 'https://sutitio.org/dona/dona.php';
		$myemail  				= "shoesoffsas@gmail.com";
		$myemail2  				= $email; 
		
		$emailsBCC = array( 'shoesoffsas@gmail.com'
						, 'shoesoffsas@gmail.com');	

		
		// email subject
		$subject_admin   = "Nombre de fundación> Alguien ha hecho una nueva donación";
		$subject_donante = "Nombre de fundación > Gracias por tu Donación";

// success email message for admin		
		$message_success_admin = file_get_contents ("../envioMensajeDonacion/notifDona.xhtml");
				
		if($message_success_admin==false){
				echo "El archivo de la plantilla no cargó";
			}else{
				$message_success_admin = str_replace("..::WEB::..", $web, $message_success_admin);
				$message_success_admin = str_replace("..::NOMBRE::..", $nombre, $message_success_admin);
				$message_success_admin = str_replace("..::TELEFONO::..", $otrosDatos->telefono, $message_success_admin);
				$message_success_admin = str_replace("..::CORREO ELECTRONICO::..", $email, $message_success_admin);
				$message_success_admin = str_replace("..::DONACION::..", money_format('%.0i', $cantidad), $message_success_admin);
				$message_success_admin = str_replace("..::PAIS::..", $otrosDatos->country, $message_success_admin);
				$message_success_admin = str_replace("..::REFERENCIA::..", $reference, $message_success_admin);
				$message_success_admin = str_replace("..::TRANSACCION ID::..", $transaction_id, $message_success_admin);
				$message_success_admin = str_replace("..::TIPO TARJETA::..", $payment_method_name, $message_success_admin);
				$message_success_admin = str_replace("..::FRECUENCIA::..", $frecuenciaDonacion, $message_success_admin);
				$message_success_admin = str_replace("..::ESTADO TRANSACCION::..", $estadoTransaccion, $message_success_admin);
				$message_success_admin = str_replace("..::CERTIFICADODONACION::..", $quiereCertificado, $message_success_admin);		
			}			

		// Additional headers
		$headers = 'From: Club Michín <donativos@hogaresclubmichin.com>'. "\r\n";
		$headers  = 'MIME-Version: 1.0' . "\r\n";
		$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
		$headers .= 'Bcc: '.join(',', $emailsBCC)." \r\n";
		
		//~ Envío del mensaje a la organización
		mail($myemail, $subject_admin, $message_success_admin, $headers);
		
		
		//~ envío de mensaje al donante con el detalle de la misma
		$mensajeDonante = file_get_contents ("../envioMensajeDonacion/notifDonaPuntual.xhtml");
		
			if($mensajeDonante==false){
				echo "El archivo no cargó";
			}else{ 
				$mensajeDonante = str_replace("..::DONACION::..", money_format('%.0i', $cantidad), $mensajeDonante);
				$mensajeDonante = str_replace("..::FRECUENCIA::..", $frecuenciaDonacion, $mensajeDonante);	
				$mensajeDonante = str_replace("..::ESTADO TRANSACCION::..", $estadoTransaccion, $mensajeDonante);	
				$mensajeDonante = str_replace("..::TRANSACCION ID::..", $transaction_id , $mensajeDonante);			
			}
			
		//~ Envío del mensaje al donante
		mail($myemail2, $subject_donante, $mensajeDonante, $headers);
	}
?>


















