<!DOCTYPE html>
<html>
<head>
	<title></title>
	<?php 
		require_once("partes/cdnBootstrapCss.html");
	 ?>
</head>
<body>

<?php 
	require_once("partes/navbar.php");
?>

<!-- Cabeza !-->

<header id="home-section">
	<div class="dark-overlay">
		<div class="home-inner">
			<div class="container">
				<div class="row">
					<div class="col-12 text-center">
						<h1 class="text-white">La forma más fácil de lograr volar</h1>
					</div>
				</div>
			</div>
		</div>
	</div>
</header>

<!-- Primer !-->

<section class="flyman-section-blue">
	<div class="container py-5">
		<div class="row py-5">
			<div class="col-6 text-center">
				<h1 >FlyMan</h1>
				<p>Gesiton de pasajes de aviones</p>
			</div>
			<div class="col-6">
				<h2>¿Por qué usarlo?</h2>
				<ul>
					<li>Facilidades de pago</li>
					<li>Variedades de vuelos</li>
					<li>Facilidad de reserva</li>
				</ul>
			</div>
		</div>
	</div>
</section>

<!-- Segundo !-->

<section class="image-section-sky">
	<div class="dark-overlay pt-5">
		<div class="container ">
			<div class="row">
				<div class="col-2"></div>
				<div class="col-8 text-center">
				<div class="dark-overlay mb-5 ">

					<div class="container">
					<form>
						<h1>Contactanos</h1> 
						<div class="form-group">
							<label>Email</label>
							<input type="email" class="form-control">
						</div>
						<div class="form-group">
							<label>Tema</label>
							<input type="email" class="form-control">
						</div>
						<div class="form-group">
							<label>Mensaje</label>
							<textarea class="form-control" rows="11"></textarea>
						</div>
						<input type="submit" value="Enviar" class="btn btn-outline-light">
					</form>
					</div>
					
				</div>
				<div class="col-2"></div>
				</div>

			</div>
		</div>
	</div>
</section>

<?php 
	require_once("partes/footer.html");
?>

<?php 
	require_once("partes/cdnBootstrapJS.html");
 ?>
</body>
</html>