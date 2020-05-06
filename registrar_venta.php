<?php
    error_reporting(E_ALL);
    ini_set('display_errors', '1');

    if ($_SERVER['REQUEST_METHOD'] =='POST') {

        // Get last refventa to calculate new one
        $sql = "SELECT MAX(id) FROM tienda_ventas";
        // $result = $dbConnection->query($sql); 
        // $ultimo = $result->fetch();
        // $nuevo = $ultimo[0]+1;
        // $refventa = 'ref' . $nuevo;
        $descripcion = "Donación"; //descripción de la transacción

        // Insert details in db
        $name           = $_POST['name'] . " " . $_POST['lastname'];
        $address        = '-';
        $email          = $_POST['email'] ?: '-';
        $donacion       = $_POST['amount_to_donate'];
        $donacion_libre = $_POST['free_amount_to_donate'];
        $donacion_final = $donacion === 'otra_cantidad' ? $donacion_libre : $donacion;
        $frecuencia     = $_POST['frecuency'];
        $empty = 1;
        
        //~ // genera un arreglo con los datos adicionales
		$otrosDatos = array("country" => $_POST['country']
						, "certificado" => $_POST['certificado']
						, "telefono" => $_POST['phone']);

        
        // Prepara data needed for PayU
        $referenceCode          = time(); 
        $iva                    = 0; //impuestos calculados de la transacción
        $baseDevolucionIva      = 0; //el precio sin iva de los productos que tienen iva
        $valor                  = $donacion_final; //el valor total
        $moneda                 = "COP"; //la moneda con la que se realiza la compra
        $url_respuesta          = "https://www.hogaresclubmichin.org/dona/dona.php?status=donated";
        $url_confirmacion       = "https://www.hogaresclubmichin.org/dona/guardar_pago_datos.php";
        $emailComprador         = $email; //email al que llega confirmación del estado final de la transacción, forma de identificar al comprador

		$EN_PRODUCCION = true;
        //~ $EN_PRODUCCION = false;
        
        if ($EN_PRODUCCION)
        {
			//producción
			$merchantId       = "102590";                         // real
			$apiKey           = "13f16610c65";     					// real
			$accountId        = "106633";                         // real
			$prueba           = "0";                              // real 
			$url              = 'https://gateway.payulatam.com/ppp-web-gateway/'; // real
		}
		else
		{
			//prueba
			$merchantId          = "508029";                      // test     código único del cliente
			$apiKey              = "4Vj8eK4rloUd272L48hsrarnUA";  // test llave de encripción que se usa para generar la fima
			$accountId           = "512321";                      // test
			$prueba              = "1";                           // test variable para poder utilizar tarjetas de crédito de prueba
			$url                 = 'https://sandbox.gateway.payulatam.com/ppp-web-gateway/';   // test		
		}     
        $firma_cadena           = "$apiKey~$merchantId~$referenceCode~$valor~$moneda"; //concatenación para realizar la firma
        $firma                  = md5($firma_cadena); //creación de la firma con la cadena previamente hecha 
    }
    
		// crea un texto en formato json con los datos adicionles
		$otrosDatos = json_encode($otrosDatos);

		// los caracteres especiales son transformados para poderlos enviar en un hidden
		$otrosDatos = htmlspecialchars($otrosDatos, ENT_QUOTES);
    
?>
<form  name='formPago' id='formPago' method="post" action="<?php echo $url?>" target="_self">
    <input name="accountId"     type="hidden"  value="<?php echo $accountId?>" >
    <input name="merchantId" type="hidden" value="<?php echo $merchantId?>">
    <input name="description" type="hidden" value="<?php echo $descripcion ?>" >
    <input name="extra1" type="hidden" value="<?php echo $frecuencia ?>" >
    <input name="extra2" type="hidden" value="<?php echo $name ?>" >
    <input name="extra3" type="hidden" value="<?php echo $otrosDatos ?>" >
    <input name="referenceCode" type="hidden" value="<?php echo $referenceCode ?>">
    <input name="amount" type="hidden" value="<?php echo $valor ?>">
    <input name="tax" type="hidden" value="<?php echo $iva ?>">
    <input name="taxReturnBase" type="hidden" value="<?php echo $baseDevolucionIva ?>" >
    <input name="signature" type="hidden" value="<?php echo $firma?>">
    <input name="currency"      type="hidden"  value="<?php echo $moneda?>" >
    <input name="buyerEmail" type="hidden" value="<?php echo $emailComprador?>">
    <input name="test" type="hidden" value="<?php echo $prueba?>">
    <input name="responseUrl" type="hidden" value="<?php echo $url_respuesta?>">
    <input name="confirmationUrl"    type="hidden"  value="<?php echo $url_confirmacion?>">

</form>
<script type="text/javascript">
    document.getElementById('formPago').submit();
</script>




