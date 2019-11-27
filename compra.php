<?php
  session_start();
?>
<!DOCTYPE html>
<html lang="es">
<meta charset="UTF-8">
<head>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
  <title>Producto</title>
  <style>
.card {
  box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
  max-width: 500px;
  margin: auto;
  text-align: center;
  font-family: arial;
  display:inline-block;
}
ul {
  list-style-type: none;
  margin: 0;
  padding: 0;
  overflow: hidden;
  background-color: #333;
}

li {
  float: center;
}

li a {
  display: block;
  color: white;
  text-align: center;
  padding: 14px 16px;
  text-decoration: none;
}

li a:hover {
  background-color: #111;
}
  </style>
</head>

<body> 

 <ul>
  <li><a class="active" href="index.php">Inicio</a></li>
</ul>
	
<?php
include 'php/conexion.php';

if(isset($_REQUEST['id'])){
	$idProducto = $_REQUEST['id'];
	$idUsuario =  $_SESSION['id'];
	if(isset($idUsuario)){
		echo '
		<form action="compra.php" method="post">
		 <p>Número de tarjeta:<input type="text" name="idTarjeta" /></p>
		 <input type="hidden" name="idLibro" value="' . $idProducto  . '">
		 <input type="hidden" name="idUsuario" value="' .  $idUsuario . '">
		 <p><button class="btn btn-secondary" type="submit">Comprar</button></p>
		</form>';
	}else{
		echo "Inicie sesión para poder comprar este producto.";
	}
}else if(isset($_REQUEST['idTarjeta']) && isset($_REQUEST['idLibro']) && isset($_REQUEST['idUsuario'])){
	$idTarjeta = $_REQUEST['idTarjeta'];
	$idLibro = $_REQUEST['idLibro'];
	$idUsuario = $_REQUEST['idUsuario'];
	$sql = $connect->query("SELECT * FROM tarjeta WHERE idTarjeta = {$idTarjeta}");
	$result = array();


	$contador = 0;
    while ($extraer = $sql->fetch_assoc()) {
      $contador++;
      $result[] = $extraer;
    }

    if($contador>0){
    	$saldo = $result[0]['saldo'];
		$sql = $connect->query("SELECT * FROM libro WHERE id = {$idLibro}");
		$result = array();
	    while ($extraer = $sql->fetch_assoc()) {
	      $contador++;
	      $result[] = $extraer;
	    }
    	$precio = $result[0]['precio'];
    	if($saldo>=$precio){
    		$saldoNuevo = $saldo - $precio;
			$sql = $connect->query("UPDATE tarjeta SET saldo = {$saldoNuevo} WHERE idTarjeta = {$idTarjeta}");
			$sql = $connect->query("INSERT INTO compra VALUES(0,{$idLibro},{$idUsuario})");
    		echo "Compra exitosa";
    	}
    	
    }else{
    	echo "Tarjeta inexistente";
    }

}	
?>


</body>
</html>

