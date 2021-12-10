<?php

include("database.php");

if (isset($_POST['guardar'])) {

  $marca = $_POST['marca'];
  $modelo = $_POST['modelo'];
  $caracteristicas = $_POST['caracteristicas'];
  $precio = $_POST['precio'];

  $query = "INSERT INTO celulares(marca, modelo, caracteristicas, precio)  VALUES ('$marca', '$modelo', '$caracteristicas', '$precio')";

  $result = mysqli_query($conn, $query);

  if (!$result) {
    die("Query Failed");
  }

  $_SESSION['message'] = 'Dispositivo guardado';
  $_SESSION['message_type'] = 'success';

  header("Location: index.php");
}
?>
