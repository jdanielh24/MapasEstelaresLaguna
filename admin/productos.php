<?php

session_start();

if (!isset($_SESSION['user_id'])) {
  header('Location: index.php');
}
include '../php/conexion.php';

/* crear una sentencia preparada */
if ($stmt = $conexion->prepare("SELECT nivel FROM usuario WHERE id=?")) {

  /* ligar parámetros para marcadores */
  $stmt->bind_param("i", $_SESSION['user_id']);

  /* execute query */
  $stmt->execute();

  /* bind result variables */
  $stmt->bind_result($res);

  /* fetch value */
  $stmt->fetch();

  $message = '';

  if ($res != "admin") {
    header("Location: ../index.php");
  }

  $stmt->close();
}
$resultado = $conexion->query("select * from productos order by id") or die($conexion->error);
/* cerrar sentencia */

?>

<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Mapas Estelares Laguna - Admin</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="./dashboard/plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bbootstrap 4 -->
  <link rel="stylesheet" href="./dashboard/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="./dashboard/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- JQVMap -->
  <link rel="stylesheet" href="./dashboard/plugins/jqvmap/jqvmap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="./dashboard/dist/css/adminlte.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="./dashboard/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="./dashboard/plugins/daterangepicker/daterangepicker.css">
  <!-- summernote -->
  <link rel="stylesheet" href="./dashboard/plugins/summernote/summernote-bs4.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>

<body class="hold-transition sidebar-mini layout-fixed">
  <style>
    .back-amarillo {
      background-color: #ffd24f;
      border-color: #ffd24f;
    }

    .btn2:hover {
      background-color: #e4bd48;
      border-color: #e4bd48;
    }
  </style>
  <div class="wrapper">

    <?php include "./layouts/header.php"; ?>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <div class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1 class="m-0 text-dark">Productos</h1>
            </div><!-- /.col -->
            <div class="col-sm-6 text-right">
              <button type="button" class="btn2 back-amarillo btn btn-primary " data-toggle="modal" data-target="#exampleModal">
                <i class="fa fa-plus"></i> Insertar Producto
              </button>
              <a href="../logout.php" class="boton boton-amarillo fw-600">Cerrar sesión</a>
            </div><!-- /.col -->
          </div><!-- /.row -->
        </div><!-- /.container-fluid -->
      </div>
      <!-- /.content-header -->

      <!-- Main content -->
      <section class="content">
        <div class="container-fluid">
          <?php
          if (isset($_GET['error'])) {

          ?>
            <div class="alert alert-danger" role="alert">
              <?php echo $_GET['error']; ?>
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
          <?php } ?>

          <?php
          if (isset($_GET['success'])) {

          ?>
            <div class="alert alert-success" role="alert">
              Se ha insertado correctamente.
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
          <?php } ?>

          <?php
          if (isset($_GET['edit'])) {

          ?>
            <div class="alert alert-success" role="alert">
              Se ha editado el producto correctamente.
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
          <?php } ?>

          <table class="table">
            <thead>
              <tr>
                <th>Id</th>
                <th>Nombre</th>
                <th>Descripcion</th>
                <th>Precio</th>
                <th>Imagen</th>
                <th>Inventario</th>
              </tr>
            </thead>
            <tbody>
              <?php
              while ($f = mysqli_fetch_array($resultado)) {


              ?>
                <tr>
                  <td><?php echo $f['id']; ?></td>
                  <td><?php echo $f['nombre']; ?></td>
                  <td width="400px"><?php echo $f['descripcion']; ?></td>
                  <td>$<?php echo number_format($f['precio'], 2, '.', ''); ?></td>
                  <td><img src="../img/<?php echo $f['imagen']; ?>" width="100px" height="100px"></td>
                  <td><?php echo $f['inventario']; ?></td>
                  <td>
                    <button class="btn2 back-amarillo btn btn-primary btn-small btnEditar" data-id="<?php echo $f['id']; ?>" data-nombre="<?php echo $f['nombre']; ?>" data-descripcion="<?php echo $f['descripcion']; ?>" data-precio="<?php echo $f['precio']; ?>" data-inventario="<?php echo $f['inventario']; ?>" data-toggle="modal" data-target="#modalEditar">
                      <i class="fa fa-edit"></i>
                    </button>
                    <button class="btn btn-danger btn-small btnEliminar" data-id="<?php echo $f['id']; ?>" data-toggle="modal" data-target="#modalEliminar">
                      <i class="fa fa-trash"></i>
                    </button>
                  </td>
                </tr>
              <?php
              }
              ?>
            </tbody>
          </table>
        </div><!-- /.container-fluid -->
      </section>
      <!-- /.content -->
    </div>

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <form action="../php/insertarProducto.php" method="POST" enctype="multipart/form-data">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Insertar Producto</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <div class="form-group">
                <label for="nombre">Nombre</label>
                <input type="text" name="nombre" placeolder="nombre" id="nombre" class="form-control" required>
              </div>
              <div class="form-group">
                <label for="descripcion">Descripción</label>
                <input type="text" name="descripcion" placeolder="descripcion" id="descripcion" class="form-control" required>
              </div>
              <div class="form-group">
                <label for="precio">Precio</label>
                <input type="number" min="0" name="precio" placeolder="precio" id="precio" class="form-control" required>
              </div>
              <div class="form-group">
                <label for="imagen">Imagen</label>
                <input type="file" name="imagen" id="imagen" class="form-control" required>
              </div>
              <div class="form-group">
                <label for="inventario">Inventario</label>
                <input type="number" min="0" name="inventario" placeolder="inventario" id="inventario" class="form-control" required>
              </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              <button type="submit" class="btn2 back-amarillo btn btn-primary ">Guardar</button>
            </div>
          </form>
        </div>
      </div>
    </div>

    <!-- Modal Eliminar-->
    <div class="modal fade" id="modalEliminar" tabindex="-1" role="dialog" aria-labelledby="modalEliminarLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">

          <div class="modal-header">
            <h5 class="modal-title" id="modalEliminarLabel">Eliminar Producto</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            ¿Desea eliminar el producto?
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-danger eliminar" data-dismiss="modal">Eliminar</button>
          </div>

        </div>
      </div>
    </div>

    <!-- Modal Editar-->
    <div class="modal fade" id="modalEditar" tabindex="-1" role="dialog" aria-labelledby="modalEditarLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <form action="../php/editarProducto.php" method="POST" enctype="multipart/form-data">
            <div class="modal-header">
              <h5 class="modal-title" id="modalEditarLabel">Editar Producto</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <input type="hidden" id="idEdit" name="id">
              <div class="form-group">
                <label for="nombreEdit">Nombre</label>
                <input type="text" name="nombre" placeholder="nombre" id="nombreEdit" class="form-control" required>
              </div>
              <div class="form-group">
                <label for="descripcionEdit">Descripción</label>
                <input type="text" name="descripcion" placeholder="descripcion" id="descripcionEdit" class="form-control" required>
              </div>
              <div class="form-group">
                <label for="precioEdit">Precio</label>
                <input type="number" min="0" name="precio" placeholder="precio" id="precioEdit" class="form-control" required>
              </div>
              <div class="form-group">
                <label for="imagen">Imagen</label>
                <input type="file" name="imagen" id="imagen" class="form-control">
              </div>
              <div class="form-group">
                <label for="inventarioEdit">Inventario</label>
                <input type="number" min="0" name="inventario" placeholder="inventario" id="inventarioEdit" class="form-control" required>
              </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              <button type="submit" class="btn2 back-amarillo btn btn-primary editar">Guardar</button>
            </div>
          </form>
        </div>
      </div>
    </div>

    <?php include "./layouts/footer.php"; ?>

  </div>
  <!-- ./wrapper -->

  <!-- jQuery -->
  <script src="./dashboard/plugins/jquery/jquery.min.js"></script>
  <!-- jQuery UI 1.11.4 -->
  <script src="./dashboard/plugins/jquery-ui/jquery-ui.min.js"></script>
  <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
  <script>
    $.widget.bridge('uibutton', $.ui.button)
  </script>
  <!-- Bootstrap 4 -->
  <script src="./dashboard/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- ChartJS -->
  <script src="./dashboard/plugins/chart.js/Chart.min.js"></script>
  <!-- Sparkline -->
  <script src="./dashboard/plugins/sparklines/sparkline.js"></script>
  <!-- JQVMap -->
  <script src="./dashboard/plugins/jqvmap/jquery.vmap.min.js"></script>
  <script src="./dashboard/plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
  <!-- jQuery Knob Chart -->
  <script src="./dashboard/plugins/jquery-knob/jquery.knob.min.js"></script>
  <!-- daterangepicker -->
  <script src="./dashboard/plugins/moment/moment.min.js"></script>
  <script src="./dashboard/plugins/daterangepicker/daterangepicker.js"></script>
  <!-- Tempusdominus Bootstrap 4 -->
  <script src="./dashboard/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
  <!-- Summernote -->
  <script src="./dashboard/plugins/summernote/summernote-bs4.min.js"></script>
  <!-- overlayScrollbars -->
  <script src="./dashboard/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
  <!-- AdminLTE App -->
  <script src="./dashboard/dist/js/adminlte.js"></script>
  <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
  <script src="./dashboard/dist/js/pages/dashboard.js"></script>
  <!-- AdminLTE for demo purposes -->
  <script src="./dashboard/dist/js/demo.js"></script>

  <script>
    $(document).ready(function() {
      var idEliminar = -1;
      var idEditar = -1;
      var fila;
      $(".btnEliminar").click(function() {
        idEliminar = $(this).data('id');
        fila = $(this).parent('td').parent('tr');
      });
      $(".eliminar").click(function() {
        $.ajax({
          url: '../php/eliminarProducto.php',
          method: 'POST',
          data: {
            id: idEliminar
          }
        }).done(function(res) {
          $(fila).fadeOut(1000);
        });
      });

      $(".btnEditar").click(function() {
        idEditar = $(this).data('id');
        var nombre = $(this).data('nombre');
        var descripcion = $(this).data('descripcion');
        var precio = $(this).data('precio');
        var inventario = $(this).data('inventario');
        $("#nombreEdit").val(nombre);
        $("#descripcionEdit").val(descripcion);
        $("#precioEdit").val(precio);
        $("#inventarioEdit").val(inventario);
        $("#idEdit").val(idEditar);

      });
    });
  </script>
</body>

</html>