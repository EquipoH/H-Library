<!DOCTYPE html>
<html lang="es">
<head>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <title>H-Library</title>
    <style type="text/css">
      nav li ul{
        display:none;
      }
      nav li a{
        display: block;
      }
      nav li a:hover{
        background-color: #CECEC0;
      }
      .submenu{
        position: absolute;
      }
      .submenu li a{
        display: block;
        background-color: #F1F1EE;
      }
      nav li:hover > ul{
        display: block;
      }
      nav li ul li {
        position: relative;
      }
      nav li ul li ul{
        right:140px;
        top:0px;
      }
    </style>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon">    </span>
  </button>
  <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
    <a class="navbar-brand" href="#"><img src="src/logo.svg" width="50" height="50"alt=""><h1 style="float:right">H-Library</h1></a>
    <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
      <li class="nav-item active">
        <a class="nav-link" href="#"> <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#" tabindex="0">Datos de la librería</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#" tabindex="1">Obras y artistas</a>
        <ul class ="submenu">
          <li><a class="nav-link" href="#" tabindex="10">Artistas</a>
          <ul class ="personas">
            <li><a class="nav-link" href="perfilGabriel.html" tabindex="14">Gabriel García Márquez </a></li>
            <li><a class="nav-link" href="perfilDickens.html" tabindex="15">Charles Dickens </a></li>
            </li>
          </ul>
          <li><a class="nav-link" href="categorias.html" tabindex="11">Categorías</a></li>
          <li><a class="nav-link" href="#" tabindex="12">Página de colecciones de artistas</a>
            <ul class ="personasdos">
            <li><a class="nav-link" href="gabriela.html" tabindex="17">Gabriel García Márquez </a></li>
            <li><a class="nav-link" href="dickens.html" tabindex="18">Charles Dickens </a></li>
          </ul>
          </li>
          <li><a class="nav-link" href="publicaciones.html" tabindex="13">Página de publicaciones</a></li>
        </ul> 
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#" tabindex="2">Visitas</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#" tabindex="3">Que hay de nuevo en la librería</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#" tabindex="4">Únete y soporte</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#" tabindex="5">Tienda</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#" tabindex="6">Políticas de privacidad</a>
      </li>
    </ul>
    <form class="form-inline my-2 my-lg-0">
      <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
      <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
    </form>

    <form class="form-inline my-2 my-lg-0">
      <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Login</button>
    </form>

  </div>
</nav>


<?php
include 'php/conexion.php';

for($i=0;$i<10;$i++){


  echo '
			<div class="col-12 col-sm-6 col-md-4" style="margin-top:10px">
				<div class="card" style="height: 100%">
					<img class="card-img-top" src="' . URL . 'public/imagenes/' . $producto[$i]['imagen'] . '" alt="Card image" style="height: 400px">
					<div class="card-body">
						<h4 class="card-title">' . htmlentities($producto[$i]['nombre'], ENT_COMPAT, 'ISO-8859-1', true) . '</h4>
						<p class="card-text">$' . $producto[$i]['precio'] . '</p>
						<p class="card-text">' . $producto[$i]['cantidad'] . ' Articulos disponibles</p>
					</div>
					<div class="card-footer">
						<form method="post" action="' . URL . 'producto" style="margin-bottom: 5px">
							<input type="hidden" name="id" value="' . $producto[$i]['id'] . '">
							<button class="btn btn-secondary" type="submit">Ver Producto</button>
						</form>
						<input type="hidden" id="producto_' . $producto[$i]['id'] . '" value="' . $producto[$i]['id'] . '">
						<input type="hidden" id="precio_' . $producto[$i]['id'] . '" value="' . $producto[$i]['precio'] . '">
						<button id="carrito" value="' . $producto[$i]['id'] . '" type="button" class="btn btn-primary"><img src="' . URL . 'vista/carshop.png" alt="Logo" style="width:20px;">Añadir al Carrito</button>
					</div>
				</div>
			</div>';

}




?>





<footer>
  <p>&copy; 2019 Corporativo-H</p>
  <ul>
    <li style="display:inline;"><a href="/acerca-de">Acerca de </a></li>
    <li style="display:inline;"><a href="/conectar">  Conectar </a></li>
    <li style="display:inline;"><a href="/rrss">  Redes Sociales </a></li>
  </ul>
</footer>
</body>
</html>