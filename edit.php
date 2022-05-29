<?php

include("database.php");

if (isset($_GET['id'])) {
  $id = $_GET['id'];

  $query = "SELECT * FROM celulares WHERE id = $id";
  $result = mysqli_query($conn, $query);

  if (mysqli_num_rows($result) == 1) {
    $row = mysqli_fetch_array($result);
    $marca = $row['marca'];
    $modelo = $row['modelo'];
    $caracteristicas = $row['caracteristicas'];
    $precio = $row['precio'];
  }
}

if (isset($_POST['actualizar'])) {
  $id = $_GET['id'];
  $marca = $_POST['marca'];
  $modelo = $_POST['modelo'];
  $caracteristicas = $_POST['caracteristicas'];
  $precio = $_POST['precio'];

  $query = "UPDATE celulares SET marca = '$marca', modelo = '$modelo', caracteristicas = '$caracteristicas', precio = '$precio' WHERE id = $id";
  mysqli_query($conn, $query);

  $_SESSION['message'] = 'Dispositivo actualizado';
  $_SESSION['message_type'] = 'warning';

  header("Location: index.php");
}

?>

<?php include("includes/header.php"); ?>

<div class="container-md p-4">
  <div class="row">
    <div class="col-md-6 mx-auto">
      <div class="card card-body">
        <form action="edit.php?id=<?php echo $_GET['id']; ?>" method="POST">
          <div class="form-group">
            <input type="text" name="marca" value="<?php echo $marca ?>" class="form-control" placeholder="Actualizar marca">
          </div>
          <div class="form-group">
            <input type="text" name="modelo" value="<?php echo $modelo ?>" class="form-control" placeholder="Actualizar modelo">
          </div>
          <div class="form-group">
            <textarea type="text" name="caracteristicas" rows="4" class="form-control" placeholder="Actualizar caracteristicas"><?php echo $caracteristicas; ?></textarea>
          </div>
          <div class="form-group">
            <input type="text" name="precio" value="<?php echo $precio ?>" class="form-control" placeholder="Actualizar precio">
          </div>
          <button type="submit" class="btn btn-warning btn-block" name="actualizar">
            Actualizar
          </button>
        </form>
      </div>
    </div>
  </div>
</div>

<?php include("includes/footer.php"); ?>
