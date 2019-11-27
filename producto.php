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

  <br>
  <div class="container">
    <div class="row">

      <div class="card-columns">
        <?php
        include 'php/conexion.php';

        if(isset($_REQUEST['id'])){
          $idProducto = $_REQUEST['id'];
            $sql = $connect->query("SELECT libro.*,categoria.nombre as categoria,artista.nombre as artista FROM `libro` inner join categoria on categoria.id=libro.categoria inner JOIN artista on artista.id=libro.artista where libro.id = {$idProducto} ORDER BY fechaAniadido DESC");
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
            <p class="card-text">' . htmlentities($result[$i]['artista'], ENT_COMPAT, 'ISO-8859-1', true)  . '</p>
            <p class="card-text">' . htmlentities($result[$i]['categoria'], ENT_COMPAT, 'ISO-8859-1', true)  . '</p>
            <p class="card-text">Añadido el ' . $result[$i]['fechaAniadido'] . '</p>
          </div>
          <div class="card-footer">
            <form method="post" action="compra.php" style="margin-bottom: 5px">
              <input type="hidden" name="id" value="' . $result[$i]['id'] . '">
              <button class="btn btn-secondary" type="submit">Comprar</button>
            </form>

          </div>
        
      </div>';
        }
        }
        ?>
        <div>

        </div>
      </div>

</body>
</html>
