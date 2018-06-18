<?php 
require_once("../carga.php");
require_once("partes/usuarioExiste.php");
$pasajes = ControladorPasajes::selectAllWhereIdpPersona($_SESSION['PERSONA']->getId());

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
						<h1 >Mis Pasajes</h1>
						<div class="table-responsive">
							<table class="table ">
								<thead class="thead-light">
									<th scope="col ">n° vuelo</th>
									<th scope="col ">n° pasaje</th>
									<th scope="col">Origen</th>
									<th scope="col">Destino</th>
									<th scope="col">fecha Salida</th>
									<th scope="col">Tipo de pasaje</th>
								</thead>
								<tbody>
									<?php 
									foreach ($pasajes as $pasaje) {
										$vuelo = ControladorVuelos::selectOneByIdPasaje($pasaje->getId());
										?>
										<tr>
											<td><?php echo $vuelo->getId(); ?></td>
											<td><?php echo $pasaje->getId(); ?></td>
											<td><?php echo $vuelo->getOrigen()->getNombre(); ?></td>
											<td><?php echo $vuelo->getDestino()->getNombre(); ?></td>
											<td><?php echo $vuelo->getFechaSalida(); ?></td>
											<td><?php echo $pasaje->getTipoPasaje()->getNombre(); ?></td>	
										</tr>
										<?php 
									} ?>
								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-12">
					<div class="container">
						<h1 >Mis Reservas</h1>
						<div class="table-responsive">
							<table class="table ">
								<thead class="thead-light">
									<th scope="col ">n° pasaje</th>
									<th scope="col">Origen</th>
									<th scope="col">Destino</th>
									<th scope="col">Pagar hasta</th>
								</thead>
								<tbody>
									<tr>
										<td>344</td>
										<td>Argentina</td>
										<td>Bolivia</td>
										<td>2018/1/20</td>
									</tr>
									<tr>
										<td>345</td>
										<td>Argentina</td>
										<td>Bolivia</td>
										<td>2018/1/20</td>
									</tr>

								</tbody>
							</table>
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