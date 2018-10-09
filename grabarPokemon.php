	<?php
	session_start();
	if(!isset($_SESSION["login"])){
		header("location:errorSesionPokedex.php");
		exit;
	}
	$conexion = mysqli_connect("localhost","root","ale37376896","pokemonsCascallaresGabriel");

	$nom=$_GET['nombre'];
	$tip=$_GET['tipo'];
	$fot=$_GET['foto'];
	
	
	$sql="update pokemon set tipo ='".$tip."', foto ='".$fot."' where nombre ='".$nom."';";
	$result = mysqli_query($conexion,$sql);
	header("location:pokedex.php");
	?>