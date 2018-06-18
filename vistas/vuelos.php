<?php 
require_once("../carga.php");
require_once("partes/usuarioExiste.php");
if (isset($_SESSION['vuelos'])) {
	$vuelos = $_SESSION['vuelos'];
	unset($_SESSION['vuelos']);
}else{
	$vuelos = ControladorVuelos::selectAllVuelos();
}
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



<section>
	<div class="background-paisaje">
		<div class="dark-overlay">
			<div class="formulario-padding-dos">
				<div class="container">
					<div class ="row">
						<div class="col-12">
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
						</div>
					</div>
					<div class="row">
						<div class="col-12">
							<h2>Lista de vuelos</h2>
							<div class="table-responsive">
							<table class="table text-center">
								<thead>
									<tr>
										<th>n°</th>
										<th>Origen</th>
										<th>Destino</th>
										<th>Salida</th>
										<th>Precio</th>
										<th>Pasajes disponibles</th>
										<th>*</th>
									</tr>
								</thead>
								<tbody>
									<?php 
									foreach ($vuelos as $vuelo) {
										$pasajesD = ControladorPasajes::selectAllDisponbilesWhereIdVuelo($vuelo->getId());
									 ?>
									<tr>
										<td><?php echo $vuelo->getId(); ?></td>
										<td><?php echo $vuelo->getOrigen()->getNombre(); ?></td>
										<td><?php echo $vuelo->getDestino()->getNombre(); ?></td>
										<td><?php echo $vuelo->getFechaSalida(); ?></td>
										<td><?php echo "$".$vuelo->getPrecio(); ?></td>
										<td><?php echo count($pasajesD); ?></td>
										<td><a href="comprar?id=<?php echo $vuelo->getId()?>" class="btn btn-outline-light" >comprar</a>
											<a href="idVuelo?id=<?php echo $vuelo->getId()?>" class="btn btn-outline-light">Reservar</a>
										</td>
									</tr>
									<?php 
										}
									 ?>
								</tbody>
							</table>
							</div>



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