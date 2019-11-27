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
  <title>H-Library</title>

<?php
include "php/conexion.php";
        $ipaddress = '';
        if (getenv('HTTP_CLIENT_IP'))
          $ipaddress = getenv('HTTP_CLIENT_IP');
        else if (getenv('HTTP_X_FORWARDED_FOR'))
          $ipaddress = getenv('HTTP_X_FORWARDED_FOR');
        else if (getenv('HTTP_X_FORWARDED'))
          $ipaddress = getenv('HTTP_X_FORWARDED');
        else if (getenv('HTTP_FORWARDED_FOR'))
          $ipaddress = getenv('HTTP_FORWARDED_FOR');
        else if (getenv('HTTP_FORWARDED'))
          $ipaddress = getenv('HTTP_FORWARDED');
        else if (getenv('REMOTE_ADDR'))
          $ipaddress = getenv('REMOTE_ADDR');
        else
          $ipaddress = 'UNKNOWN';
          


        $sql = $connect->query("INSERT INTO `visita` (`id`, `ip`) VALUES (NULL, '".$ipaddress."')");


?>


  <h1>Bienvenido, <?php session_start(); echo $_SESSION['usuario'] ?></h1>
  <?php
  include "php/conexion.php";
  $ipaddress = '';
  if (getenv('HTTP_CLIENT_IP'))
    $ipaddress = getenv('HTTP_CLIENT_IP');
  else if (getenv('HTTP_X_FORWARDED_FOR'))
    $ipaddress = getenv('HTTP_X_FORWARDED_FOR');
  else if (getenv('HTTP_X_FORWARDED'))
    $ipaddress = getenv('HTTP_X_FORWARDED');
  else if (getenv('HTTP_FORWARDED_FOR'))
    $ipaddress = getenv('HTTP_FORWARDED_FOR');
  else if (getenv('HTTP_FORWARDED'))
    $ipaddress = getenv('HTTP_FORWARDED');
  else if (getenv('REMOTE_ADDR'))
    $ipaddress = getenv('REMOTE_ADDR');
  else
    $ipaddress = 'UNKNOWN';



  $sql = $connect->query("INSERT INTO `visita` (`id`, `ip`) VALUES (NULL, '" . $ipaddress . "')");


  ?>
  <style type="text/css">
    nav li ul {
      display: none;
    }

    nav li a {
      display: block;
    }

    nav li a:hover {
      background-color: #CECEC0;
    }

    .submenu {
      position: absolute;
      z-index: 99;
    }

    .submenu li a {
      display: block;
      background-color: #F1F1EE;
      z-index: 99;
    }

    nav li:hover>ul {
      display: block;
    }

    nav li ul li {
      position: relative;
    }

    nav li ul li ul {
      right: 140px;
      top: 0px;
    }
  </style>
</head>

<body>
  <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"> </span>
    </button>
    <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
      <a class="navbar-brand" href="#"><img src="src/logo.svg" width="50" height="50" alt="">
        <h1 style="float:right">H-Library</h1>
      </a>
      <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
        <li class="nav-item active">
          <a class="nav-link" href="#"> <span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#" tabindex="0">Datos de la librería</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#" tabindex="1">Obras y artistas</a>
          <ul class="submenu">
            <li><a class="nav-link" href="#" tabindex="10">Artistas</a>
              <ul class="personas">
                <li><a class="nav-link" href="perfilGabriel.html" tabindex="14">Gabriel García Márquez </a></li>
                <li><a class="nav-link" href="perfilDickens.html" tabindex="15">Charles Dickens </a></li>
            </li>
          </ul>
        <li><a class="nav-link" href="categorias.html" tabindex="11">Categorías</a></li>
        <li><a class="nav-link" href="#" tabindex="12">Página de colecciones de artistas</a>
          <ul class="personasdos">
            <li><a class="nav-link" href="gabriela.html" tabindex="17">Gabriel García Márquez </a></li>
            <li><a class="nav-link" href="dickens.html" tabindex="18">Charles Dickens </a></li>
          </ul>
        </li>
        <li><a class="nav-link" href="publicaciones.html" tabindex="13">Página de publicaciones</a></li>
      </ul>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="visitas.html" tabindex="2">Visitas</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#" tabindex="3">Que hay de nuevo en la librería</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="soporte.html" tabindex="4">Únete y soporte</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="politicas.html" tabindex="6">Políticas de privacidad</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="compras" tabindex="6">Compras</a>
      </li>
      </ul>
      

      <form class="form-inline my-2 my-lg-0">
        <INPUT TYPE="BUTTON" class="btn btn-outline-success my-2 my-sm-0" ONCLICK="window.location.href='libreria.php'">Login</INPUT>
      </form>

    </div>
  </nav>

  <div class="bd-example">
    <div id="carouselExampleCaptions" class="carousel slide owl-carousel" data-ride="carousel">
      <ol class="carousel-indicators">
        <li data-target="#carouselExampleCaptions" data-slide-to="0" class="active"></li>
        <li data-target="#carouselExampleCaptions" data-slide-to="1"></li>
        <li data-target="#carouselExampleCaptions" data-slide-to="2"></li>
        <li data-target="#carouselExampleCaptions" data-slide-to="3"></li>
      </ol>
      <div class="carousel-inner">
        <div class="carousel-item active">
          <img src="src/gonvill.jpg" class="d-block w-100" alt="..." width="500" height="500" id="gonvill">
          <div class=" carousel-caption d-none d-md-block">
            <h5>Gonvill</h5>
            <p>Abre sus puertas a nuevos lectores.</p>
          </div>
        </div>
        <div class="carousel-item">
          <img src="src/feria.jpg" class=" d-block w-100" alt="..." width="500" height="500" id="feria">
          <div class="carousel-caption d-none d-md-block">
            <h5>Feria internacional del libro</h5>
            <p>H-Library se invita a participar</p>
          </div>

        </div>
        <div class="carousel-item">
          <img src="src/openmind.jpg" class="d-block w-100" alt="..." width="500" height="500" id="open">
          <div class=" carousel-caption d-none d-md-block">
            <h5>OpenMind ¡Comparte tu opinión!</h5>
            <p>Ven este 2 de enero a las 7:00 Pm.</p>
          </div>
        </div>
        <div class="carousel-item">
          <img src="src/books.jpg" class="d-block w-100" alt="..." width="500" height="500" id="categorias">
          <div class=" carousel-caption d-none d-md-block">
            <h5>Revisa tus catergorias favortitas</h5>
            <p></p>
          </div>
        </div>

      </div>



      <a class="carousel-control-prev" href="#carouselExampleCaptions" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
      </a>
      <a class="carousel-control-next" href="#carouselExampleCaptions" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
      </a>
    </div>
  </div>

  <br>
  <div class="container">
    <div class="row">

      <div class="card-columns">
        <?php
        include 'php/conexion.php';


        $sql    = $connect->query("SELECT libro.*,categoria.nombre as categoria,artista.nombre as artista FROM `libro` inner join categoria on categoria.id=libro.categoria inner JOIN artista on artista.id=libro.artista ORDER BY fechaAniadido DESC");
        $result = array();



        while ($extraer = $sql->fetch_assoc()) {
          $result[] = $extraer;
        }



        for ($i = 0; $i < sizeof($result); $i++) {


          echo '
        
                <div class="card" style="height: 100% width=20 rem">
                    <img class="card-img-top" src="src/book.jpg" alt="Card image" style="height: 200">
                    <div class="card-body">
                        <h4 class="card-title">' . htmlentities($result[$i]['titulo'], ENT_COMPAT, 'ISO-8859-1', true) . '</h4>
                        <p class="card-text">' . htmlentities($result[$i]['artista'], ENT_COMPAT, 'ISO-8859-1', true) . '</p>
            <p class="card-text">' . htmlentities($result[$i]['categoria'], ENT_COMPAT, 'ISO-8859-1', true) . '</p>
            <p class="card-text">Añadido el ' . $result[$i]['fechaAniadido'] . '</p>
                    </div>
                    <div class="card-footer">
                        <form method="post" action="producto" style="margin-bottom: 5px">
                            <input type="hidden" name="id" value="' . $result[$i]['id'] . '">
                            <button class="btn btn-secondary" type="submit">Ver Producto</button>
                        </form>

                    </div>
                
            </div>';
        }




        ?>
        <div>

        </div>
      </div>


      <footer>

        <p style="display:inline;">Fecha de actualización: 27/11/2019 </p>
        <br>
        <p style="display:inline;">&copy; 2019 Corporativo-H</p>
        <h6 style="display:inline;">Visitas: <span class="badge badge-secondary">
        <?php
          $result;
          $sql = $connect->query("SELECT COUNT(*) as numero FROM `visita`");

          while ($extraer = $sql->fetch_assoc()) {
            $result = $extraer["numero"];
          }

          echo $result;
        ?>
          
        </span></h6>
        <ul>
          <li style="display:inline;"><a href="redes.html">Redes Sociales </a></li>
        </ul>
      </footer>
</body>
<script type="text/javascript">
  document.getElementById("gonvill").onclick = function() {

    location.href = "https://www.gonvill.com.mx/";
  };

  document.getElementById("feria").onclick = function() {

    location.href = "feria.html";
  };

  document.getElementById("open").onclick = function() {

    location.href = "open.html";
  };


  document.getElementById("categorias").onclick = function() {

    location.href = "categorias.php";
  };
</script>

</html>