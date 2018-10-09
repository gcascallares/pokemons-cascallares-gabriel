<?php
	session_start();
?>
<!DOCTYPE html>
<html>
	<head>
		<link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
		<link rel="stylesheet" type="text/css" href="./recursos/estilosPokedex.css">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.98.2/css/materialize.min.css">
		<script type="text/javascript" src="materialize.min.js"></script>
		<title>Iniciar Sesion</title>
	</head>
	<body id="fondoImagen">
		<div>
			<div class="navbar-fixed">
				<nav>
					<div class="nav-wrapper">
					<a href="index.php" class="brand-logo center">Pokedex</a>
					<ul id="nav-mobile" class="right hide-on-med-and-down">
					<li><a href="loginPokedex.php">Iniciar Sesion</a></li>
					</ul>
					</div>
				</nav>
			</div>
		<div  class="container">
			
				<h2>Login</h2>
						<form class="col s12" method="post" enctype="application/x-www-form-urlencodes">
								<div class="input-field col s6">
									<p>
										<input type="text" placeholder="Usuario" name="nombre">
									</p>
								</div>
								
								<div class="input-field col s6">
									<p>
										<input type="password" name="clave" placeholder="contraseña" class="validate">
									</p>
								</div>
								
								<div class="input-field col s6">
										 <button class="btn waves-effect red" type="submit" value="Registarse">Registarse
											<i class="material-icons right">send</i>
										</button>
								</div>
						</form>
		</div>
<?php
	$conexion = mysqli_connect("localhost","root","ale37376896","pokemonsCascallaresGabriel");
	
	if(isset($_POST["nombre"]) && isset($_POST["clave"])){
		$usu=$_POST["nombre"];
		$con=MD5($_POST[("clave")]);
		
		$sql="select * from usuario where nombre='".$usu."' and clave='".$con."'";
		$result = mysqli_query($conexion,$sql);
		
		$cantfilas = mysqli_num_rows($result);
		
		if($cantfilas!=0){
			header("location:pokedex.php");
			$_SESSION["login"]="nuevaSession";
		}
		if($cantfilas==0){
			echo "<h3>error en usuario y contraseña ingresados</h3>";
		}
	}
?>
	</body>
</html>