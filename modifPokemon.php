<?php
	session_start();
	if(!isset($_SESSION["login"])){
		header("location:errorSesionPokedex.php");
		exit;
	}
?>
<!DOCTYPE html>
<html>
	<head>
		<link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
		<link rel="stylesheet" type="text/css" href="./recursos/estilosPokedex.css">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.98.2/css/materialize.min.css">
		<script type="text/javascript" src="materialize.min.js"></script>
		<title>Modificar Pokemon</title>
	</head>
	<body id="fondoImagen">
			<div>
			<div class="navbar-fixed">
				<nav>
					<div class="nav-wrapper">
					<a href="pokedex.php" class="brand-logo center">Pokedex</a>
					<ul id="nav-mobile" class="right hide-on-med-and-down">
					<li><a href="#">Cerrar Sesion</a></li>
					</ul>
					</div>
				</nav>
			</div>
	<?php
	$conexion = mysqli_connect("localhost","root","ale37376896","pokemonsCascallaresGabriel");

		if(isset($_GET['nombre'])){
		$modif=($_GET['nombre']);
		}

	$sql="select * from pokemon where nombre = '".$modif."';";
	$result = mysqli_query($conexion,$sql);
	$rows=mysqli_fetch_assoc($result);
	?>
		<div  class="container">
				<h2>Modificar <?php echo $rows['nombre'];?> </h2>
						<form class="col s6" method="get" enctype="application/x-www-form-urlencodes" action="grabarPokemon.php">
							<div class="center-aling">
								<div class="input-field col s6">
									<p><!-- agregando al input readonly este sentencia evita modificar este campo-->
										<input type="text" name="nombre" value="<?php echo $rows['nombre'];?>" placeholder="<?php echo $rows['nombre'];?>"><br>
									</p>
								</div>
								
								<div class="input-field col s6">
									<p>
										<input type="text" name="tipo" placeholder="<?php echo $rows['tipo'];?>"><br>
									</p>
								</div>

								<div class="input-field col s6">
									<p>
										<input type="text" name="foto" placeholder="<?php echo $rows['foto'];?>"><br>
									</p>
								</div>
								<div class="input-field col s6">
										 <button class="btn waves-effect red" type="submit" value="Modificar">Modificar
											<i class="material-icons right">send</i>
										</button>
								</div>
							</div>
						</form>
	</body>

</html>