<!DOCTYPE html>
<html lang="en">
<head>
	<?php include_once("analyticstracking.php") ?>
	<?php include('head.html') ?>


	<!-- CSS Implementing Plugins -->
	<link rel="stylesheet" href="assets/plugins/revolution-slider/rs-plugin/css/settings.css">
	<link rel="stylesheet" href="assets/plugins/sky-forms-pro/skyforms/css/sky-forms.css">
	<link rel="stylesheet" href="assets/plugins/sky-forms-pro/skyforms/custom/custom-sky-forms.css">
	<!-- CSS Theme -->
	<link rel="stylesheet" href="assets/css/theme-colors/default.css" id="style_color">
	<link rel="stylesheet" href="assets/css/shop.style.css">
	<!-- CSS Customization -->
	<link rel="stylesheet" href="assets/css/custom.css">
	<!-- Facebook Pixel Code -->
<script>
  !function(f,b,e,v,n,t,s)
  {if(f.fbq)return;n=f.fbq=function(){n.callMethod?
  n.callMethod.apply(n,arguments):n.queue.push(arguments)};
  if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';
  n.queue=[];t=b.createElement(e);t.async=!0;
  t.src=v;s=b.getElementsByTagName(e)[0];
  s.parentNode.insertBefore(t,s)}(window, document,'script',
  'https://connect.facebook.net/en_US/fbevents.js');
  fbq('init', '488218468562312');
  fbq('track', 'PageView');
</script>
<noscript><img height="1" width="1" style="display:none"
  src="https://www.facebook.com/tr?id=488218468562312&ev=PageView&noscript=1"
/></noscript>
<!-- End Facebook Pixel Code -->
</head>

<body>

<?php
	if ( isset($_GET['status']) ) {
		$status = $_GET['status'];
	} else {
		$status = 'start';
	}
?>
	<div class="wrapper">
		<?php include('header_simple.html') ?>

		<!-- donation when through correctly -->
		<?php if ( $status === 'donated') { 
			$nombre 		= $_GET['nombre'];
			$fecha_inicio 	= $_GET['inicio'];
			$fecha_fin 		= $_GET['fin'];
			$id 			= $_GET['id'];
			$frecuencia 	= $_GET['frecuencia'];
			$plan 			= $_GET['plan'];
		?>

		<div class="container" style="margin-top: 50px;">
			<div class="title-v1">
				<h2>Gracias por tu donación, <?php echo $nombre ?></h2>
				<p>Nuestra independencia de subvenciones gubernamentales hace que nuestra fundación viva gracias a tus donaciones y apoyo.</p>
				<p>Has elegido una <strong>donación <?php echo $frecuencia ?></strong>. Se te hará el primer cargo el <strong><?php echo $fecha_inicio ?></strong>.</p>
				<p>Recibirás un email de PayU, la compañía que se encarga de gestionar los cargos, cada vez que se realice la donación. </p>
				<p>Por si tuvieras alguna pregunta, toma nota de los siguientes datos:</p>
				<p> - Id: <strong><?php echo $id ?></strong></p>
				<p> - Plan: <strong><?php echo $plan ?></strong></p>
			</div>
		</div>

		<!-- donation was incorrect -->
		<?php } elseif ($status === 'error') { 

			$nombre 		= $_GET['nombre'];
			$error 			= $_GET['error'];

		?>

		<div class="container" style="margin-top: 50px;">
			<div class="title-v1">
				<h2>Lo sentimos, <?php echo $nombre ?></h2>
				<p>Ha habido un error en los datos que pusistes. Este es el error, por favor corrígelo:</p>
				<p><?php echo $error ?></p>
				<p> Sentimos las molestias </p>
			</div>
		</div>
		<?php } ?>


		<!--=== Slider ===-->
		<div class="tp-banner-container margin-bottom-40">
			<div class="tp-banner">
				<ul>
					<!-- SLIDE -->
					<li class="dani revolution-mch-1" data-transition="fade" data-slotamount="5" data-masterspeed="1000" data-title="Deserción escolar">
						<!-- MAIN IMAGE -->
						<img src="assets/img/sliders/1.jpg"  alt="darkblurbg"  data-bgfit="cover" data-bgposition="left top" data-bgrepeat="no-repeat">

						<div class="tp-caption revolution-ch1 sft start"
						data-x="center"
						data-hoffset="-30"
						data-y="100"
						data-speed="1500"
						data-start="500"
						data-easing="Back.easeInOut"
						data-endeasing="Power1.easeIn"
						data-endspeed="300">
						Ayúdanos a prevenir <br>
						<strong>la deserción escolar</strong><br>						
					</div>
			</li>
			<!-- END SLIDE -->

				<!-- SLIDE -->
				<li class="revolution-mch-1" data-transition="fade" data-slotamount="5" data-masterspeed="1000" data-title="Maltrato Infantil">
					<!-- MAIN IMAGE -->
					<img src="assets/img/sliders/3.jpg"  alt="darkblurbg"  data-bgfit="cover" data-bgposition="right top" data-bgrepeat="no-repeat">

					<div class="tp-caption revolution-ch1 sft start"
					data-x="center"
					data-hoffset="-30"
					data-y="100"
					data-speed="1500"
					data-start="500"
					data-easing="Back.easeInOut"
					data-endeasing="Power1.easeIn"
					data-endspeed="300">
					Súmate para que juntos prevengamos <br>
					<strong>el maltrato infantil</strong> 
				</div>

				</li>
				<!-- END SLIDE -->

				<!-- SLIDE -->
				<li class="revolution-mch-1" data-transition="fade" data-slotamount="5" data-masterspeed="1000" data-title="Slide 4">
					<!-- MAIN IMAGE -->
					<img src="assets/img/sliders/2.jpg"  alt="darkblurbg"  data-bgfit="cover" data-bgposition="left top" data-bgrepeat="no-repeat">

				<!-- LAYER -->
				<div class="tp-caption revolution-ch1 sft start"
				data-x="center"
				data-hoffset="-30"
				data-y="100"
				data-speed="1400"
				data-start="2000"
				data-easing="Back.easeInOut"
				data-endspeed="300"
				data-endeasing="Power1.easeIn"
				style="z-index: 6">
				Ayúdanos a seguir fortaleciendo <br> <strong>los vínculos familiares</strong>
				</div>
				<!-- END SLIDE -->
		</div>
	</div>
<!--=== End Slider ===-->



	<section id="dona" class="margin-bottom-40">
		<div class="container">
			<div class="title-v1">
				<h2 class="titulo">Súmate</h2>
				<p class="sub_titulo">Ahora puedes ayudarnos haciendo donaciones únicas o recurrentes. Puedes elegir qué valor donar y cada cuanto hacer esta donación usando tu tarjeta de crédito o por medio de PSE.</br>
					<br> Nuestra plataforma cuenta con la seguridad necesaria para que realices tu donación con confianza.</p>
			</div>

<!-- Needed to implement PayU SDK / Start--> 

<?php
	$deviceSessionId = md5( session_id().microtime() );
	$cookie = session_id();
?>

	<p style="background:url(https://maf.pagosonline.net/ws/fp?id=<?php echo $deviceSessionId ?>80200"></p>

  	<script src="https://maf.pagosonline.net/ws/fp/check.js?id=<?php echo $deviceSessionId ?>80200"></script>

  	<object type="application/x-shockwave-flash"

  data="https://maf.pagosonline.net/ws/fp/fp.swf?id=<?php echo $deviceSessionId ?>80200" width="1" height="1"

  id="thm_fp">
  		<param name="movie" value="https://maf.pagosonline.net/ws/fp/fp.swf?id=<?php echo $deviceSessionId ?>80200" />

	</object>

<!-- Needed to implement PayU SDK / End--> 

	<div class="product__shopping-cart col-md-12">

		<form id="js-form" class="shopping-cart validate sky-form" method="POST" action="" novalidate="novalidate">
			<div class="billing-info-inputs checkbox-list">
				<div class="row">
					<h2 class="title-type">
						Quiero aportar
						<p style="text-transform: initial;color: black;margin-bottom: 0px;">Cantidades en pesos colombianos</p>
					</h2>				

					<div id="montoDonacion" id="js-amount_to_donate" class="form-group col-sm-12 inline-group" style="margin-right: 0;">
						<div><label class="radio col-sm-2.3"><input type="radio" name="amount_to_donate" value="150000" checked=""><i class="rounded-x"></i>$150.000</label></div>
						<div><label class="radio col-sm-2.3"><input type="radio" name="amount_to_donate" value="300000"><i class="rounded-x"></i>$300.000</label></div>
						<div><label class="radio col-sm-2.3"><input type="radio" name="amount_to_donate" value="500000"><i class="rounded-x"></i>$500.000</label></div>
						<div><label class="radio "><input type="radio" name="amount_to_donate" id="js-button-other-amount" value="otra_cantidad"><i class="rounded-x"></i>Otro</label>
						<input type="number" onKeyPress="return soloNumeros( event )" name="free_amount_to_donate" id="js-other_amount_to_donate" class="form-control" style="width:auto; display: none" required></div>
					</div>
					
					<div class="frecuencia form-group col-sm-4 push-right js-donacion_recurrente">
						<label class="select" for="frecuency">
						<select type="text" class="form-control" name="frecuency" id="frecuency" onclick="ga('send', 'event', 'pagina donaciones', 'click', 'selector_frecuencia')">
							<option value="2">Al mes</option>
							<option value="3">Al trimestre</option>
							<option value="4">Al semestre</option>
							<option value="5">Al año</option>
							<option value="1">Una Sola Vez</option>
						</select>
						<i></i>
						</label>
					</div>
					 <div class="col-sm-12" id="txt_recurrente_donacion">
									<br>
                                        <p class="alert alert-success js-donacion_recurrente" style="clear:both;"><i class="glyphicon glyphicon-lock"></i><strong>Sitio Seguro</strong> <br>Esta página cuenta con un certificado de seguridad que hace que tu información esté mucho más segura.</p>
                                    </div>
					<div class="col-sm-12" id="txt_recurrente_donacion">
						<p class="alert alert-success js-donacion_recurrente" style="clear:both;">La opción de donación recurrente sólo es posible de momento con las principales tarjetas de crédito: <strong>Visa, Amex, Mastercard, Diners y Discover</strong>.</br> Si sólo dispones de otro medio de pago, todavía puedes ayudar eligiendo donación puntual.</p>
					</div>
					<div class="clearfix"></div>
					<h2 class="title-type">Mis datos personales</h2>

					<div class="col-sm-12">
						<div class="row">
							<div class="form-group col-sm-6">
								<label for="name">Nombre</label>
								<input type="text" class="form-control" name="name" id="name" placeholder="Juan" required>
							</div>
							<div class="form-group col-sm-6">
								<label for="lastname">Apellidos</label>
								<input type="text" class="form-control" name="lastname" id="lastname" placeholder="Rodriguez" required>
							</div>
						</div>
						<div class="row">
							<div class="form-group col-sm-6">
								<label for="email">Correo electrónico</label>
								<input type="email" class="form-control" name="email" id="email" placeholder="ejemplo@ejemplo.com" required>
							</div>
							<div class="form-group col-sm-6">
								<label for="phone">Teléfono</label>
								<input type="text" class="form-control" name="phone" id="phone" placeholder="3823323223" required>
							</div>
						</div>
						<div id="donacion_recurrente">
							<div class="row">
								
								<div class="form-group col-sm-6 js-donacion_recurrente">
									<label for="cc_name">Nombre en Tarjeta Credito</label>
									<input type="text" class="form-control" name="cc_name" id="cc_name" placeholder="" required>
								</div>								
								<div class="form-group col-sm-6 has-feedback js-donacion_recurrente">
									<label for="cc_number">Número tarjeta credito</label>
									<input type="text" class="form-control" name="cc_number" id="cc_number" placeholder="" maxlength="30" minlength="5" required>
									<span class="glyphicon glyphicon-ok form-control-feedback" aria-hidden="true"></span>
								</div>							
							</div>
							<div class="row">
								<div class="form-group col-sm-6 js-donacion_recurrente">
									<label for="cc_document">Número de cédula de ciudadanía</label>
									<input type="text" class="form-control" name="cc_document" id="cc_document" placeholder="" required>
								</div>								
								<div class="form-group col-sm-2 js-donacion_recurrente">
									<label style="display: block;" for="cc_date">Fecha caducidad</label>
									<input type="text" class="form-control" name="cc_date" id="cc_date" maxlength="7" minlength="7" placeholder="AAAA/MM" required>
								</div>
								<div class="form-group col-sm-2 js-donacion_recurrente">
									<label for="cc_type">Tipo tarjeta</label>
									<select type="text" class="form-control" name="cc_type" id="cc_type" required>
									  <option value="VISA">Visa</option>
									  <option value="AMEX">AMEX</option>
									  <option value="DINERS">Diners</option>
									  <option value="MASTERCARD">Mastercard</option>
									  <option value="DISCOVER">Discover</option>
									</select>
								</div>
								<div class="form-group col-sm-2 js-donacion_recurrente">
									<label for="cc_cvc">Código seguridad 
										<span 
											class="glyphicon glyphicon-info-sign" 
											data-toggle="tooltip" 
											style="cursor:pointer"
											title="Puedes ver este número en tu tarjeta. Consta de 3 o 4 dígitos."></span>
									</label>
									<input type="text" class="form-control" name="cc_cvc" id="cc_cvc" placeholder="" maxlength="4" minlength="3" required>
								</div>
							</div>
						</div>
						<div class="row tam_campo">
							<div class="form-group col-sm-6">
									<label for="country">País</label>
									<input type="input" class="form-control" name="country" id="country" placeholder="Colombia" required>
								</div>
								<div class="form-group col-sm-6">
									<label for="certificado" required>Desea un certificado de donación</label>
									<div id="certificado" class="form-group col-sm-12 inline-group" style="margin-right: 0;">
										<div><label class="radio col-sm-6"><input name="certificado" type="radio" value="1"required><i class="rounded-x"></i>Sí</label></div>
										<div><label class="radio col-sm-6"><input name="certificado" type="radio" value="0" required><i class="rounded-x"></i>No</label></div>
									</div>
								</div>
							</div>
						</div>			
					</div>

					<input type="hidden" name="devide_session_id" id="device_session_id" value="<?php echo $deviceSessionId ?>">
					<input type="hidden" name="cookie" id="cookie" value="<?php echo $cookie ?>">
				
					<button type="submit" class="btn-u btn-u-sea-shop btn-u-lg" onclick="ga('send', 'event', 'pagina donaciones', 'click', 'boton_dona')">Dona</button><br>
					 <br><p class="alert alert-success js-donacion_recurrente">
								<a href="https://www.payulatam.com/blog/dico-velit-delicata-vel-ealia-modus-cum-altera-copiosae/" target="_blank"><img src="https://ecommerce.payulatam.com/logos/PayU_107x51.png" alt="PayU" border="0" /></a><br>
								El pago se realiza de forma segura a través de la plataforma PayU, especializada en este tipo de transacciones.<br>Para tu mayor seguridad, no almacenamos ningún dato financiero en nuestros servidores.</p>
				</div>
			</div>
		</form>
		</div>
	</div>
</section>




<div class="wrapper">
	<!--=== Footer v4 ===-->
	<?php include('footer_simple.html') ?>
</div><!--/wrapper-->

<!-- JS Global Compulsory -->
<script src="assets/plugins/jquery/jquery.min.js"></script>
<script src="assets/plugins/jquery/jquery-migrate.min.js"></script>
<script src="assets/plugins/bootstrap/js/bootstrap.min.js"></script>
<!-- JS Implementing Plugins -->
<script src="assets/plugins/back-to-top.js"></script>
<script src="assets/plugins/smoothScroll.js"></script>
<script src="assets/plugins/revolution-slider/rs-plugin/js/jquery.themepunch.tools.min.js"></script>
<script src="assets/plugins/revolution-slider/rs-plugin/js/jquery.themepunch.revolution.min.js"></script>
<script src="assets/plugins/jquery.creditCardValidator.js"></script>
<script src="assets/js/forms_validation.js"></script>
<script src="assets/plugins/jquery.validate.min.js"></script>
<!-- JS Page Level -->
<script src="assets/js/pages/tienda_donacion.js"></script>
<script src="assets/js/plugins/revolution-slider.js"></script>

<script>
	jQuery(document).ready(function() {
		RevolutionSlider.initRSfullWidth();
		Validate.init();
	});
</script>

<script type="text/javascript">
	function soloNumeros( evt ) 
	{
		if ( window.event ) { // IE
			keyNum = evt.keyCode;
		} else {
			keyNum = evt.which;
		}

		if ( keyNum >= 48 && keyNum <= 57 ) {
			return true;
		} else {
			return false;
		}
	}
</script>

</body>
</html>
