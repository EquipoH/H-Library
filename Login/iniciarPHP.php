<?php
	include ("../php/conexion.php");
	$usuario = $_POST['USUARIO'];
	$contrasena = $_POST['CONTRASENA'];

	$query2 = "SELECT * FROM usuario WHERE usuario = '$usuario' AND contrasena = '$contrasena';";
	$resultado2 = mysqli_query($connect, $query2) or die ("Algo salió mal 2...");
	$nfilas2 = mysqli_num_rows($resultado2);

	if ( $nfilas2>0 )
	{
		Header("Location: ../index.php");
	}
	else
	{
		Header("Location: iniciarSesion.php");
	}
?>