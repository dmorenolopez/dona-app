<!DOCTYPE html>
<html lang="en">
<head>
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

		<?php if ( $status === 'donated') { ?>
		<div class="container" style="margin-top: 50px;">
			<div class="title-v1">
				<h2>Gracias por tu donación</h2>
				<p>Tu ayuda hace posible que sigamos cambiando vidas.</p>
			</div>
		</div>
		<?php } ?>

		<!--=== Slider ===-->
		<div class="tp-banner-container margin-bottom-40">
			<div class="tp-banner">
				<ul>
					<!-- SLIDE -->
					<li class="revolution-mch-1" data-transition="fade" data-slotamount="5" data-masterspeed="1000" data-title="Slide 1">
						<!-- MAIN IMAGE -->
						<img src="assets/img/sliders/1.jpg"  alt="darkblurbg"  data-bgfit="cover" data-bgposition="left top" data-bgrepeat="no-repeat">

						<div class="tp-caption revolution-ch6 sft start"
						data-x="center"
						data-hoffset="0"
						data-x="center"
						data-y="100"
						data-speed="1500"
						data-start="500"
						data-easing="Back.easeInOut"
						data-endeasing="Power1.easeIn"
						data-endspeed="300">
							Tú puedes ayudar a que un niño</br>
							vulenrado cambie su historia</br>
							reciba alojamiento y alimentación</br>
							durante su estancia en Michín
						
						</div>

						<!-- LAYER -->
						<div class="tp-caption sft"
						data-x="center"
						data-hoffset="0"
						data-y="380"
						data-speed="1600"
						data-start="1800"
						data-easing="Power4.easeOut"
						data-endspeed="300"
						data-endeasing="Power1.easeIn"
						data-captionhidden="off"
						style="z-index: 6">
						<a href="#dona" class="btn-u btn-brd btn-brd-hover btn-u-light">Ayúdalo</a>
						</div>
					</li>
					<!-- END SLIDE -->

				<!-- SLIDE -->
				<li class="revolution-mch-1" data-transition="fade" data-slotamount="5" data-masterspeed="1000" data-title="Slide 2">
					<!-- MAIN IMAGE -->
					<img src="assets/img/sliders/2.jpg"  alt="darkblurbg"  data-bgfit="cover" data-bgposition="left top" data-bgrepeat="no-repeat">

					<div class="tp-caption revolution-ch3 sft start"
					data-x="center"
					data-hoffset="0"
					data-y="140"
					data-speed="1500"
					data-start="500"
					data-easing="Back.easeInOut"
					data-endeasing="Power1.easeIn"
					data-endspeed="300">
					Los niños tiene derecho a </br>
					<strong>crecer en ambientes sanos</strong> 
					</div>

					<!-- LAYER -->
					<div class="tp-caption sft"
					data-x="center"
					data-hoffset="0"
					data-y="300"
					data-speed="1600"
					data-start="1800"
					data-easing="Power4.easeOut"
					data-endspeed="300"
					data-endeasing="Power1.easeIn"
					data-captionhidden="off"
					style="z-index: 6">
					<a href="#dona" class="btn-u btn-brd btn-brd-hover btn-u-light">Ayúdalos</a>
					</div>
				</li>
				<!-- END SLIDE -->
				<li class="revolution-mch-1" data-transition="fade" data-slotamount="5" data-masterspeed="1000" data-title="Slide 3">
					<!-- MAIN IMAGE -->
					<img src="assets/img/sliders/3.jpg"  alt="darkblurbg"  data-bgfit="cover" data-bgposition="left top" data-bgrepeat="no-repeat">

					<!-- LAYER -->
					<div class="tp-caption revolution-ch4 sft"
					data-x="right"
					data-hoffset="0"
					data-y="210"
					data-speed="1400"
					data-start="500"
					data-easing="Power4.easeOut"
					data-endspeed="300"
					data-endeasing="Power1.easeIn"
					data-captionhidden="off"
					style="z-index: 6">
					Tu aporte hace la diferencia<br> 
					en la vida de los niños,<br>
					niñas, adolescentes y jóvenes
					</div>

					<!-- LAYER -->
					<div class="tp-caption sft"
					data-x="right"
					data-hoffset="0"
					data-y="300"
					data-speed="1600"
					data-start="1800"
					data-easing="Power4.easeOut"
					data-endspeed="300"
					data-endeasing="Power1.easeIn"
					data-captionhidden="off"
					style="z-index: 6">
					<a href="#dona" class="btn-u btn-brd btn-brd-hover btn-u-light">Apóyanos</a>
					</div>
				</li>
				<!-- END SLIDE -->

				<!-- SLIDE -->
				<li class="revolution-mch-1" data-transition="fade" data-slotamount="5" data-masterspeed="1000" data-title="Slide 4">
					<!-- MAIN IMAGE -->
					<img src="assets/img/sliders/4.jpg"  alt="darkblurbg"  data-bgfit="cover" data-bgposition="left top" data-bgrepeat="no-repeat">

					<!-- LAYER -->
					<div class="tp-caption revolution-ch2 sft"
					data-x="center"
					data-hoffset="0"
					data-y="280"
					data-speed="1400"
					data-start="500"
					data-easing="Power4.easeOut"
					data-endspeed="300"
					data-endeasing="Power1.easeIn"
					data-captionhidden="off"
					style="z-index: 6">
					Ayúdanos a seguir cambiando</br>
					la vida de los niños y niñas</br>
					</div>

					<!-- LAYER -->
					<div class="tp-caption sft"
					data-x="center"
					data-hoffset="0"
					data-y="370"
					data-speed="1600"
					data-start="1400"
					data-easing="Power4.easeOut"
					data-endspeed="300"
					data-endeasing="Power1.easeIn"
					data-captionhidden="off"
					style="z-index: 6">
					<a href="#dona" class="btn-u btn-brd btn-brd-hover btn-u-light">Apóyanos</a>
					</div>
				</li>
				<!-- END SLIDE -->

				</ul>
			<div class="tp-bannertimer tp-bottom"></div>
		</div>
	</div>
<!--=== End Slider ===-->



	<section id="dona" class="margin-bottom-40">
		<div class="container">
			<div class="title-v1">
				<h2>Únete</h2>
				<p>Somos una entidad Sin Ánimo de lucro. </br>
					Tu ayuda nos permitirá seguir cambiando vidas.</p>
			</div>
	
<!-- 
############
FORM SECTION
Needs:
	<link rel="stylesheet" href="assets/plugins/sky-forms-pro/skyforms/css/sky-forms.css">
	<script src="assets/plugins/jquery.validate.min.js"></script>
	<script src="assets/js/forms_validation.js"></script>
	JS para mostrar cuadro en 'otra cantidad', ahora en tienda_donacion.js

	Validate.init();

-->


					<div class="product__shopping-cart col-md-12">

						<form id="js-form" class="shopping-cart validate sky-form" method="POST" action="registrar_venta.php" novalidate="novalidate">
							<div class="billing-info-inputs checkbox-list">
								<div class="row">
									<h2 class="title-type">
										Quiero aportar
										<p style="text-transform: initial;color: black;margin-bottom: 0px;">Cantidades en pesos colombianos</p>
									</h2>
									

									<div id="js-amount_to_donate" class="form-group col-sm-8 inline-group" style="margin-right: 0;">
<!-- 										<label class="radio"><input type="radio" name="radio-inline" value="20000" checked=""><i class="rounded-x"></i>$10.000</label>
 --><!-- 										<label class="radio"><input type="radio" name="radio-inline" value="40000"><i class="rounded-x"></i>$30.000</label>
 -->										<label class="radio"><input type="radio" name="amount_to_donate" value="50000"><i class="rounded-x"></i>$50.000</label>
										<label class="radio"><input type="radio" name="amount_to_donate" id="js-button-other-amount" value="otra_cantidad"><i class="rounded-x"></i>Otro (mínimo $10.000)</label>
										<input type="number" name="free_amount_to_donate" id="js-other_amount_to_donate" class="form-control hide" style="width:auto;" required>
									</div>

									<div class="form-group col-sm-4 push-right">
										<label class="select" for="frecuency">
										<select type="text" class="form-control" name="frecuency" id="frecuency">
											<option value="2">Al mes</option>
											<option value="3">Al trimestre</option>
											<option value="4">Al semestre</option>
											<option value="5">Al año</option>
											<option value="1">Una sola vez</option>
										</select>
										<i></i>
										</label>
									</div>

									<div class="clearfix"></div>
									<h2 class="title-type">Mis datos personales</h2>

									<div class="form-group col-sm-6">
										<label for="name">Nombre</label>
										<input type="text" class="form-control" name="name" id="name" placeholder="Juan" required>
									</div>
									<div class="form-group col-sm-6">
										<label for="lastname">Apellidos</label>
										<input type="text" class="form-control" name="lastname" id="lastname" placeholder="Rodriguez" required>
									</div>
									<div class="form-group col-sm-6">
										<label for="email">Correo electrónico</label>
										<input type="email" class="form-control" name="email" id="email" placeholder="ejemplo@ejemplo.com" required>
									</div>
									<div class="form-group col-sm-6">
										<label for="phone">Teléfono</label>
										<input type="text" class="form-control" name="phone" id="phone" placeholder="3823323223" required>
									</div>
								</div>
								<button type="submit" class="btn-u btn-u-sea-shop btn-u-lg">Dona</button>
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
<script src="assets/js/forms_validation.js"></script>
<script src="assets/plugins/back-to-top.js"></script>
<script src="assets/plugins/smoothScroll.js"></script>
<script src="assets/plugins/revolution-slider/rs-plugin/js/jquery.themepunch.tools.min.js"></script>
<script src="assets/plugins/revolution-slider/rs-plugin/js/jquery.themepunch.revolution.min.js"></script>
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
<!--[if lt IE 9]>
	<script src="assets/plugins/respond.js"></script>
	<script src="assets/plugins/html5shiv.js"></script>
	<script src="assets/js/plugins/placeholder-IE-fixes.js"></script>
	<![endif]-->

</body>
</html>
