<!-- NAVBAR !-->
<nav class="navbar navbar-dark bg-dark navbar-expand-sm fixed-top">
	<div class="container">
			<a href="" class="navbar-brand">
				<img src="img/logo.png" id="navbar-brand-icon">
				<spam>FlyMan</spam>
			</a>
		<div class="navbar-toggler" data-toggle="collapse" data-target="#navbarcol">
			<span class="navbar-toggler-icon"></span>
		</div>
		<div class="collpase navbar-collapse" id="navbarcol">
			<ul class="navbar-nav ml-auto">

				<?php 
				if (isset($persona)) {
				 ?>
				<li class="nav-item">
					<a href="vuelos.php" class="nav-link">Lista de Vuelos</a>
				</li>
				<li>
					<a href="buscarVuelo.php" class="nav-link">Buscar</a>
				</li>
				<li>
					<a href="misVuelos.php" class="nav-link">Mis vuelos</a>
				</li>
				<li>
					<span class="nav-link"><?php 
					if (isset($persona)) {
						echo($persona->getNombre());
					}
					?></span>
				</li>
				<li>
					<a href="procesar/salir.php" class="nav-link">Salir</a>
				</li>
				<?php 
				}else{ ?>
				<li class="nav-item">
					<a href="landingPage.php" class="nav-link">Inicio</a>
				</li>
				<li class="nav-item">
					<a href="login.php" class="nav-link">Iniciar Sesion</a>
				</li>
				<li>
					<a href="registro.php" class="nav-link">Registrarme</a>
				</li>
				<?php 
				} ?>
			</ul>
		</div>
	</div>
</nav>