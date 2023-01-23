<?php
$server = "localhost"; // Nuestro server mysql :puerto 
$database = "peliswordpress"; // Nuestra base de datos  
$dbpass = ""; //Nuestro password mysql  
$dbuser = "root"; // Nuestro user mysql

$mysqli = new mysqli($server, $dbuser, $dbpass, $database);
if ($mysqli->connect_errno) {
  echo "Fallo al conectar a MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
}
