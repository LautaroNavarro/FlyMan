<?php 
require_once("../carga.php");
require_once("partes/usuarioExiste.php");
$lugares = ControladorLugares::selectAll();
?>

<!DOCTYPE html>
<html>
<head>
	<title>Buscar Vuelo</title>
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

	<section class="flyman-section-blue">
		<div class="container py-1">
		</div>
	</section>

	<header class="image-section-sky">
		<div class="dark-overlay">
			<div class="container pt-5">
				<div class="row">
					<div class="col-12">
						<div class="container">
							<form>
								<h1>Buscar Vuelo</h1>
								<div class="form-group">
									<label for="p_minimo">Precio mínimo:</label>
									<input type="number" class="form-control" id="p_minimo" placeholder="0">
								</div>
								<div class="form-group">
									<label for="p_maximo">Precio máximo:</label>
									<input type="number" class="form-control" id="p_maximo" placeholder="19300">
								</div>
								<div class="form-group">
									<label for="origen">Desde:</label>
									<select class="form-control" id="origen">
										<?php foreach ($lugares as $lugar) { ?>
										<option value="<?php echo $lugar->getId(); ?>">
											<?php echo $lugar->getNombre();?>
										</option>
										<?php } ?> 
									</select>
								</div>
								<div class="form-group">
									<label for="destino">Hasta:</label>
									<select class="form-control" id="destino">
										<?php foreach ($lugares as $lugar) { ?>
										<option value="<?php echo $lugar->getId(); ?>">
											<?php echo $lugar->getNombre();?>
										</option>
										<?php } ?>
									</select>
								</div>
								<div class="form-group">
									<label for="fecha_saluda">Hasta fecha salida:</label>
									<input type="date" class="form-control" id="fecha_saluda" >
								</div>								
								<input type="submit" class="btn btn-outline-light btn-block" value="Buscar">
							</form>
						</div>
					</div>

				</div>
			</div>
		</div>
	</div>
</div>
</div>
</div>
</header>



<?php 
require_once("partes/footer.html");
?>

<?php 
require_once("partes/cdnBootstrapJS.html");
?>
</body>
</html>