<?php 
require_once("../carga.php");
require_once("partes/usuarioExiste.php");
$lugares = ControladorLugares::selectAll();
if (isset($_SESSION['mensaje'])) {
	$mensaje = $_SESSION['mensaje'];
	unset($_SESSION['mensaje']);
}
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



	<header class="image-section-sky">
		<div class="dark-overlay">
			<div class="container pt-5">
				<div class="row pt-5 pb-5">
					<div class="col-12">
						<div class="container">
							<?php 
							if (isset($mensaje)) {
								?>
								<div  class="alert alert-primary alert-dismissible fade show" role="alert"">  
									<button type="button" class="close" data-dismiss="alert" aria-label="Close">
										<span aria-hidden="true">&times;</span>
									</button>
									<?php echo "$mensaje"; ?>
								</div>
								<?php
							}
							?>
							<form action="procesar/procesarBusqueda.php" method="POST">
								<h1>Buscar Vuelo</h1>
								<form action="procesar/procesarBusqueda.php" method="POST">
								<div class="form-group">
									<label for="p_minimo">Precio mínimo:</label>
									<input type="number" class="form-control" id="p_minimo" placeholder="0" name="p_minimo">
								</div>
								<div class="form-group">
									<label for="p_maximo">Precio máximo:</label>
									<input type="number" class="form-control" id="p_maximo" placeholder="19300" name="p_maximo">
								</div>
								<div class="form-group">
									<label for="origen">Desde:</label>
									<select class="form-control" id="origen" name="origen">
										<option value=""></option>
										<?php foreach ($lugares as $lugar) { ?>
										<option value="<?php echo $lugar->getId(); ?>">
											<?php echo $lugar->getNombre();?>
										</option>
										<?php } ?> 
									</select>
								</div>
								<div class="form-group">
									<label for="destino">Hasta:</label>
									<select class="form-control" id="destino" name="destino">
										<option value=""></option>
										<?php foreach ($lugares as $lugar) { ?>
										<option value="<?php echo $lugar->getId(); ?>">
											<?php echo $lugar->getNombre();?>
										</option>
										<?php } ?>
									</select>
								</div>
								<div class="form-group">
									<label for="fecha_saluda">Hasta fecha salida:</label>
									<input type="date" class="form-control" id="fecha_saluda" name="fechaSalida">
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