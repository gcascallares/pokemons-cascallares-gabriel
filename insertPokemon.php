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
		<title>InsertarPokemon</title>
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
		<div  class="container">
			
				<h2>Insertar Pokemon</h2>
						<form class="col s6" method="get" enctype="application/x-www-form-urlencodes">
							<div class="center-aling">
								<div class="input-field col s6">
									<p>
										<input type="text" name="nombre" placeholder="nombre" required><br>
									</p>
								</div>
								
								<div class="input-field col s6">
									<p>
										<input type="text" name="tipo" placeholder="ingresar url tipo" required><br>
									</p>
								</div>
														
								<div class="input-field col s6">
									<p>
										<input type="text" name="foto" placeholder="ingresar url imagen" required><br>
									</p>
								</div>
								
								<div class="input-field col s6">
										 <button class="btn waves-effect red" type="submit" value="cargar">Cargar
											<i class="material-icons right">send</i>
										</button>
								</div>
							</div>
						</form>
		</div>
<?php
	$conexion = mysqli_connect("localhost","root","ale37376896","pokemonsCascallaresGabriel");

		if(isset($_GET['nombre']) && isset($_GET['tipo']) && isset($_GET['foto'])){
		$newnombre=$_GET['nombre'];
		$newtipo=$_GET['tipo'];
		$newfoto=$_GET['foto'];
	
	$sql="insert into pokemon(nombre, tipo, foto) values('".$newnombre."','".$newtipo."','".$newfoto."');";
	$result = mysqli_query($conexion,$sql);

	$cantfilas = mysqli_num_rows($result);

	if($cantfilas==0){
		$sql="insert into pokemon(nombre, tipo, foto) values('".$newnombre."','".$newtipo."','".$newfoto."');";
		$result = mysqli_query($conexion,$sql);
		header("location:pokedex.php");
	}
	else{
		echo "error de carga";
	}
}
?>
	</body>
</html>