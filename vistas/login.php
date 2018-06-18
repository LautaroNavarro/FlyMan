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

<!-- Formulario Registro !-->

<section class="formulario-section background-paisaje">
	<div class="dark-overlay">
		<div class=" formulario-padding">
			<div class="container">
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
							<form method="POST" action="procesar/procesarInicio.php">
								<h1>Inicia Sesion</h1>
								<div class="form-group">
									<label for="email">Correo:</label>
									<input type="email" name ="email" class="form-control" id="email" placeholder="correo@ejemplo.com">
								</div>
								<div class="form-group">
									<label for="password">Password:</label>
									<input type="password" name = "password" class="form-control" id="password" placeholder="*******">
								</div>
								<input type="submit" class="btn btn-outline-light btn-block" value="Iniciar">
								<div class="text-center my-3">
									<spam>Si no estas registrado</spam>
								</div>
								<a href="registro.php" class="btn btn-outline-light btn-block">registrate</a>
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