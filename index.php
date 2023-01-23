<?php
include('conexion.php');

$url = "https://api.themoviedb.org/3/movie/upcoming?api_key=8cff24a815a65ddbf3ceba2b3049a83f&language=es";
$response = file_get_contents($url);
$data = json_decode($response, true);
$peliculas = $data['results'];

//print_r($peliculas);

foreach ($peliculas as $valor) {

  if (!empty($valor["title"])) {
    $titulo = $valor["title"];
  } else {
    $titulo = " ";
  }

  if (!empty($valor["overview"])) {
    $resumen = addslashes($valor["overview"]);
  } else {
    $resumen = " ";
  }

  if (!empty($valor["poster_path"])) {
    $imagen = "https://image.tmdb.org/t/p/w500" . $valor["poster_path"];
  } else {
    $imagen = "https://static.vecteezy.com/system/resources/previews/005/337/799/non_2x/icon-image-not-found-free-vector.jpg";
  }

  if (!empty($valor["release_date"])) {
    $estreno = $valor["release_date"];
  } else {
    $estreno = "";
  }

  $query = "INSERT INTO `productos_wc` (`name`, `description`, `images`) VALUES ('$titulo', '$resumen', '$imagen')";

  //$query = "INSERT INTO `productos_wc` (`name`, `description`, `images`) VALUES ('tutitulo', 'turesumen', 'tuimagen')";
  echo $query;
  echo "<br>";

  if ($resultado = @mysqli_query($mysqli, $query)) {
    echo "<strong>Registro correcto</strong>";
  } else {
    echo "<strong>El registro ha fallado</strong>";
  }
}



mysqli_close($mysqli);
