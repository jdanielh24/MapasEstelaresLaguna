<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>M-E Laguna</title>
  <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600&display=swap" rel="stylesheet">

  <link rel="stylesheet" href="css/bootstrap.min.css">

  <link rel="stylesheet" href="css/normalize.css">
  <link rel="stylesheet" href="css/styles.css">

</head>

<body>

  <?php include('layout/header.php'); ?>

  <?php
  //unset($_SESSION['carrito']);

  if (session_status() == PHP_SESSION_NONE || !isset($_SESSION['user_id'])) {
    header('Location: login.php');
  }

  if (isset($_SESSION['carrito'])) {
    //si existe buscamos si ya estaba agregado ese producto
    if (isset($_GET['id'])) {
      $arreglo = $_SESSION['carrito'];
      $encontro = false;
      $numero = 0;
      for ($i = 0; $i < count($arreglo); $i++) {
        if ($arreglo[$i]['Id'] == $_GET['id']) {
          $encontro = true;
          $numero = $i;
        }
      }
      if ($encontro == true) {
        $arreglo[$numero]['Cantidad'] = $arreglo[$numero]['Cantidad'] + 1;
        $_SESSION['carrito'] = $arreglo;
        header("Location: cart.php");
      } else {
        /// no estaba el registro
        $nombre = "";
        $precio = "";
        $imagen = "";
        $res = $conexion->query('select * from productos where id=' . $_GET['id']) or die($conexion->error);
        $fila = mysqli_fetch_row($res);

        $nombre = $fila[1];
        $precio = $fila[3];
        $imagen = $fila[4];
        $arregloNuevo = array(
          'Id' => $_GET['id'],
          'Nombre' => $nombre,
          'Precio' => $precio,
          'Imagen' => $imagen,
          'Cantidad' => 1
        );
        array_push($arreglo, $arregloNuevo);
        $_SESSION['carrito'] = $arreglo;
        header("Location: ./cart.php");
      }
    }
  } else {
    //creamos la variable de sesion
    if (isset($_GET['id'])) {
      $nombre = "";
      $precio = "";
      $imagen = "";
      $res = $conexion->query('select * from productos where id=' . $_GET['id']) or die($conexion->error);
      $fila = mysqli_fetch_row($res);

      $nombre = $fila[1];
      $precio = $fila[3];
      $imagen = $fila[4];
      $arreglo[] = array(
        'Id' => $_GET['id'],
        'Nombre' => $nombre,
        'Precio' => $precio,
        'Imagen' => $imagen,
        'Cantidad' => 1
      );
      $_SESSION['carrito'] = $arreglo;
    }
  }

  ?>


  <div class="contenedor seccion">
    <form method="post">
      <table class="table table-bordered fw-600 centrar-texto titulos">
        <thead>
          <tr class="titulo-tabla">
            <th class="imagen-tabla">Imagen</th>
            <th>Producto</th>
            <th>Precio</th>
            <th>Cantidad</th>
            <th>Total</th>
            <th>Remover</th>
          </tr>
        </thead>
        <tbody>
          <?php
          $total = 0;
          if (isset($_SESSION['carrito'])) {
            $arregloCarrito = $_SESSION['carrito'];
            for ($i = 0; $i < count($arregloCarrito); $i++) {
              $total = $total + ($arregloCarrito[$i]['Precio'] * $arregloCarrito[$i]['Cantidad']);
          ?>

              <tr>
                <td>
                  <img src="img/<?php echo $arregloCarrito[$i]['Imagen']; ?>" alt="Image" class="img-fluid">
                </td>
                <td>
                  <p><?php echo $arregloCarrito[$i]['Nombre']; ?></p>
                </td>
                <td>$<?php echo $arregloCarrito[$i]['Precio']; ?></td>
                <td><?php echo $arregloCarrito[$i]['Cantidad']; ?></td>
                <td>$<?php echo $arregloCarrito[$i]['Precio'] * $arregloCarrito[$i]['Cantidad']; ?></td>
                <td><a href="#" class="boton boton-amarillo btn-sm btnEliminar" data-id="<?php echo $arregloCarrito[$i]['Id']; ?>">X</a></td>
              </tr>

          <?php }
          } ?>

        </tbody>
      </table>
    </form>
  </div>

  <div class="contenedor seccion ">

    <a href="productos.php" class="boton boton-amarillo">Continuar comprando</a>

    <div class="col-md-6 pl-5 seccion">
      <div class="row justify-content-end">
        <div class="col-md-7">
          <div class="row">
            <div class="col-md-12 text-right border-bottom mb-5">
              <h3 class="text-black h4 text-uppercase">Totales del carrito</h3>
            </div>
          </div>
          <div class="row mb-3">
            <div class="col-md-6">
              <span class="text-black">Subtotal</span>
            </div>
            <div class="col-md-6 text-right">
              <strong class="text-black">$<?php echo $total; ?></strong>
            </div>
          </div>
          <div class="row mb-5">
            <div class="col-md-6">
              <span class="text-black">Total</span>
            </div>
            <div class="col-md-6 text-right">
              <strong class="text-black">$<?php echo $total; ?></strong>
            </div>
          </div>

          <div class="row">
            <div class="col-md-12">
              <button class="boton boton-amarillo btn btn-block" onclick="window.location='checkout.php'">Proceder a pagar</button>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <?php include('layout/footer.php'); ?>


  <script src="js/jquery-3.3.1.min.js"></script>

  <script>
    $(document).ready(function() {
      $(".btnEliminar").click(function(event) {
        event.preventDefault();
        var id = $(this).data('id');
        var boton = $(this);
        $.ajax({
          method: 'POST',
          url: 'php/eliminarCarrito.php',
          data: {
            id: id
          }
        }).done(function(respuesta) {
          boton.parent('td').parent('tr').remove();
        });
      });

    });
  </script>

</body>

</html>