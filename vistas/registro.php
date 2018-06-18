<?php 
session_start();
 ?>
<?php 
require_once("../carga.php");
$lugares = ControladorLugares::selectAll();
if (isset($_SESSION['mensaje'])) {
	$mensaje = $_SESSION['mensaje'];
	unset($_SESSION['mensaje']);
}
 ?>
<!DOCTYPE html>
<html>
<head>
	<title>Registro</title>
	<?php 
		require_once("partes/cdnBootstrapCss.html");
	 ?>
</head>
<body>
	
<?php 
	require_once("partes/navbar.php");
?>

<!-- Formulario Registro !-->

<section class="formulario-section background-paisaje">
	<div class="dark-overlay">
		<div class=" formulario-padding-dos">
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
				<div class="row">
					<div class="col-6">
						<div class="container text-center">
							<div>
								<img src="img/smartphone.png" id="smartphone">
							</div>
							
						</div>
					</div>
					<div class="col-6">
						<div class="container">
							<form action="procesar/procesarRegistro.php" method="POST">
								<h1>Registro</h1>
								<div class="form-group">
									<label for="nombre">Nombre:</label>
									<input type="text" class="form-control" id="nombre" placeholder="Lautaro" required="" name="nombre">
								</div>
								<div class="form-group">
									<label for="apellido">Apellido:</label>
									<input type="text" class="form-control" id="apellido" placeholder="Navarro" required="" name="apellido">
								</div>
								<div class="form-group">
									<label for="fecha_nacimiento">Fecha Nacimiento:</label>
									<input type="date" class="form-control" id="fecha_nacimiento" required="" name="fecha_nacimiento">
								</div>
								<div class="form-group">
									<label for="numero_tarjeta">Numero Tarjeta:</label>
									<input type="text" class="form-control" id="numero_tarjeta" required="" name="numero_tarjeta">
								<div class="form-group">
									<label for="nacionalidad">Nacionalidad:</label>
									<select name="nacionalidad" class="form-control" required="" name="nacionalidad">
										<?php 
											foreach ($lugares as $lugar) {
												echo "<option value='".$lugar->getId() 
												."'>". $lugar->getNombre() ."</option>";
											}
										 ?>
									</select>
								</div>
								<div class="form-group">
									<label for="correo">Correo:</label>
									<input type="email" class="form-control" id="correo" required="" name="correo">
								</div>
								<div class="form-group">
									<label for="password">Password:</label>
									<input type="password" class="form-control" id="password" placeholder="*******" required="" name="password">
								</div>
								<input type="submit" class="btn btn-outline-light btn-block" value="Regitrarme!">
								<div class="text-center my-3">
									<spam>Si ya estas registrado</spam>
								</div>
								<a href="login.php" class="btn btn-outline-light btn-block">Inicia sesión</a>
							</form>
						</div>
					</div>
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