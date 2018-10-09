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
		<title>Pokedex</title>
		
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
				<div class="nav-wrapper">
					<div class="col s12 m4 l8 center" id="buscador">
						<form method="GET" enctype="application/x-www-form-urlencodes">
							<div class="input-field  grey darken-2" >
								<input id="search" name="whoisthatpokemon" type="search" placeholder="who is the pokemon">
								<label class="label-icon" for="search"><i class="material-icons">search</i></label>
								<i class="material-icons">close</i>
							</div>
						</form>
					</div>
				</div>
						<p>
	<?php
	$conexion = mysqli_connect("localhost","root","ale37376896","pokemonsCascallaresGabriel");

	if(isset($_GET['whoisthatpokemon'])){
			
			$buscado=($_GET['whoisthatpokemon']);
			$sql="select * from pokemon where nombre='".$buscado."';";
			$result = mysqli_query($conexion,$sql);
			$totalFilas=mysqli_num_rows($result);  
				if($totalFilas!=0){
							while($rows = mysqli_fetch_assoc($result)){
							echo '<img src="'.$rows['foto'].'" width="100px";/>';
							echo " ".$rows['nombre'];
							echo " ".'<img src="'.$rows['tipo'].'" width="65x";/>';
							echo "<a href='modifPokemon.php?nombre=".$rows['nombre']."'>Modificar</a>"."<a href='deletePokemon.php?nombre=".$rows['nombre']."'>Eliminar</a>";
							echo "<br>";
						}
				}
				if($totalFilas==0){
					echo "no existe ese pokemon";
					echo "<br>";
					$sql2="select * from pokemon;";
					$result2 = mysqli_query($conexion,$sql2);
						while($rows = mysqli_fetch_assoc($result2)){
								echo '<img src="'.$rows['foto'].'" width="100px";/>';
								echo " ".$rows['nombre'];
								echo " ".'<img src="'.$rows['tipo'].'" width="65x";/>';
								echo "<a href='modifPokemon.php?nombre=".$rows['nombre']."'>Modificar</a>"."<a href='deletePokemon.php?nombre=".$rows['nombre']."'>Eliminar</a>";
								echo "<br>";
							}
				}
		}		
		else{
			$sql="select * from pokemon;";
			$result = mysqli_query($conexion,$sql);
				while($rows = mysqli_fetch_assoc($result)){
						echo '<img src="'.$rows['foto'].'" width="100px";/>';
						echo " ".$rows['nombre'];
						echo " ".'<img src="'.$rows['tipo'].'" width="65x";/>';
						echo "<a href='modifPokemon.php?nombre=".$rows['nombre']."'>Modificar</a>"."<a href='deletePokemon.php?nombre=".$rows['nombre']."'>Eliminar</a>";
						echo "<br>";
				}
		}
	?>
					</p>
				<div class="input-field col s6">
					<a href="insertPokemon.php"><button class="btn waves-effect red" type="submit" value="cargar">Cargar
							<i class="material-icons right">send</i>
					</button></a>
				</div>
			</div>
		</div>
	</body>
</html>