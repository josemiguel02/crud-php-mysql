<?php
session_start();
$host = "localhost:3306";
$user = "root";
$password = "";
$bd = "cellstore";

try {
  $conn = mysqli_connect($host, $user, $password, $bd);
} catch (Exception $e) {
  echo "Hubo un error en la conexion a la BD: " . $e->getMessage();
}
?>