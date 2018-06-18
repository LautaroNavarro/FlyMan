<?php 
require_once("../carga.php");
require_once("partes/usuarioExiste.php");
if (isset($_GET['id'])) {
	$id = $_GET['id'];
	$vuelo = ControladorVuelos::selectOneVuelo($id);
	$pasaje = ControladorPasajes::selectOneDisponibleWhereIdVuelo($id);
	if ($pasaje == False) {
		$_SESSION['mensaje'] = "Pasajes Agotados";
		header("location:vuelos.php");
	}
}else{
	header("location: vuelos.php");
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
					<div class="row">
						<div class="col-12">
							<h2>Comprar Pasaje a <?php echo $vuelo->getDestino()->getNombre(); ?></h2>
							<div class="table-responsive">
							<table class="table text-center">
								<thead>
									<tr>
										<th>n°</th>
										<th>Origen</th>
										<th>Destino</th>
										<th>Salida</th>
										<th>Precio</th>
									</tr>
								</thead>
								<tbody>
									<tr>
										<td><?php echo $pasaje->getId(); ?></td>
										<td><?php echo $vuelo->getOrigen()->getNombre(); ?></td>
										<td><?php echo $vuelo->getDestino()->getNombre(); ?></td>
										<td><?php echo $vuelo->getFechaSalida(); ?></td>
										<td><?php echo "$".$vuelo->getPrecio(); ?></td>
									</tr>
								</tbody>
							</table>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-6 text-center">
							<h1>PRECIO: <?php echo "$".$vuelo->getPrecio(); ?></h1>
						</div>
						<div class="col-6">
							<h3>Comprar Pasaje</h3>
							<form class="form" method="POST" action="procesar/procesarCompra.php">
								<div class="form-group">
									<label>Codigo Descuento:</label>
									<input type="text" name="codigo" class="form-control">
								</div>
								<input type="hidden" name="id_pasaje" value="<?php echo $pasaje->getId(); ?>">
								<input type="submit" name="" value="Comprar!" class="btn btn-outline-light">
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