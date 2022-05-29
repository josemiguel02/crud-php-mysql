<?php include("database.php"); ?>

<?php include("includes/header.php"); ?>

<div class="container-md p-2 p-md-4">
  <div class="row">
    <div class="col-md-4">
      <?php if (isset($_SESSION['message'])) { ?>
        <div class="alert alert-<?= $_SESSION['message_type'] ?> alert-dismissible fade show" role="alert">
          <?= $_SESSION['message'] ?>
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
      <?php session_unset();
      } ?>

      <div class="card card-body">
        <form action="save.php" method="POST">
          <div class="form-group">
            <input type="text" name="marca" class="form-control" placeholder="Marca" autofocus>
          </div>
          <div class="form-group">
            <input type="text" name="modelo" class="form-control" placeholder="Modelo">
          </div>
          <div class="form-group">
            <textarea name="caracteristicas" rows="4" class="form-control" placeholder="Caracteristicas"></textarea>
          </div>
          <div class="form-group">
            <input type="text" name="precio" class="form-control" placeholder="Precio">
          </div>
          <input type="submit" class="btn btn-primary btn-block" name="guardar" value="Guardar">
        </form>
      </div>
    </div>

    <div class="col-md-8 mt-5 mt-md-0">
      <table class="table table-bordered table-hover table-responsive">
        <thead class="table-dark">
          <tr class="text-center">
            <th>Marca</th>
            <th>Modelo</th>
            <th>Caracteristicas</th>
            <th>Precio</th>
            <th>Opciones</th>
          </tr>
        </thead>
        <tbody>
          <?php
          $query = "SELECT * FROM celulares";
          $result = mysqli_query($conn, $query);

          while ($row = mysqli_fetch_array($result)) { ?>
            <tr>
              <td><?php echo $row['marca'] ?></td>
              <td><?php echo $row['modelo'] ?></td>
              <td><?php echo $row['caracteristicas'] ?></td>
              <td><?php echo $row['precio'];
                  echo ('<strong>$</strong>') ?></td>
              <td>
                <div class="d-flex">
                  <a href="edit.php?id=<?php echo $row['id'] ?>" class="btn btn-outline-warning btn-sm">
                    <i class="fas fa-pen"></i>
                  </a>
                  <a href="delete.php?id=<?php echo $row['id'] ?>" class="btn btn-outline-danger btn-sm ml-2">
                    <i class="fas fa-trash"></i>
                  </a>
                </div>
              </td>
            </tr>
          <?php } ?>
        </tbody>
      </table>
    </div>
  </div>
</div>

<?php include("includes/footer.php") ?>