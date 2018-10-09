<?php

	session_start();
	if(!isset($_SESSION["login"])){
		header("location:errorSesionPokedex.php");
		exit;
	}
	$conexion = mysqli_connect("localhost","root","ale37376896","pokemonsCascallaresGabriel");
	
	if(isset($_GET['nombre'])){
		$delete=($_GET['nombre']);
	}
	
	$sql="delete from pokemon where nombre='".$delete."';";
	$result = mysqli_query($conexion,$sql);
	header("location:pokedex.php");
	?>