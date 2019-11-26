<?php
	include ("../php/conexion.php");
	$user = $_POST['USUARIO'];
	$contrasena = $_POST['CONTRASENA'];

	$query = "SELECT * FROM usuario WHERE usuario = '$user';";

	$resultado = mysqli_query($connect, $query) or die ("Algo salió mal...");

	$nfilas = mysqli_num_rows($resultado);
	if ( $nfilas>0 )
	{
		echo "Este usuario ya fue registrado (número de usuario repetido)";
	}
	else
	{
		$query = "INSERT INTO usuario VALUES(null, '$user', '$contrasena')";
		$resultado = mysqli_query($connect, $query) or die ("Algo salió mal...");
		Header("Location: iniciarSesion.php");
	}
?>
