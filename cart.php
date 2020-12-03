<?php 
  session_start();
  //unset($_SESSION['carrito']);
  include './php/conexion.php';
  if(isset($_SESSION['carrito'])){
    //si existe buscamos si ya estaba agregado ese producto
    if(isset($_GET['id'])){
      $arreglo =$_SESSION['carrito'];
      $encontro=false;
      $numero = 0;
      for($i=0;$i<count($arreglo);$i++){
        if($arreglo[$i]['Id'] == $_GET['id']){
          $encontro=true;
          $numero=$i;
        }
      }
      if($encontro == true){
        $arreglo[$numero]['Cantidad']=$arreglo[$numero]['Cantidad']+1;
        $_SESSION['carrito']=$arreglo;
        header("Location: ./cart.php");
      }else{
        /// no estaba el registro
        $nombre ="";
        $precio= "";
        $imagen="";
        $res= $conexion->query('select * from productos where id='.$_GET['id'])or die($conexion->error);
        $fila = mysqli_fetch_row($res);
        
        $nombre=$fila[1];
        $precio = $fila[3];
        $imagen = $fila[4];
        $arregloNuevo= array(
                    'Id'=> $_GET['id'],
                    'Nombre'=> $nombre,
                    'Precio'=>$precio,
                    'Imagen'=> $imagen,
                    'Cantidad' => 1
        );
        array_push($arreglo, $arregloNuevo);
        $_SESSION['carrito']=$arreglo;
        header("Location: ./cart.php");
      }
    }
  }else{
    //creamos la variable de sesion
    if(isset($_GET['id'])){
      $nombre ="";
      $precio= "";
      $imagen="";
      $res= $conexion->query('select * from productos where id='.$_GET['id'])or die($conexion->error);
      $fila = mysqli_fetch_row($res);
      
      $nombre=$fila[1];
      $precio = $fila[3];
      $imagen = $fila[4];
      $arreglo[] = array(
                  'Id'=> $_GET['id'],
                  'Nombre'=> $nombre,
                  'Precio'=>$precio,
                  'Imagen'=> $imagen,
                  'Cantidad' => 1
      );
      $_SESSION['carrito']=$arreglo;
    }
  }
?>


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

    <div class="contenedor seccion">
        <form method="post">
            <table class="table table-bordered fw-600 centrar-texto titulos">
                <thead>
                    <tr class="titulo-tabla">
                        <th>Imagen</th>
                        <th>Producto</th>
                        <th>Precio</th>
                        <th>Cantidad</th>
                        <th>Total</th>
                        <th>Remover</th>
                    </tr>
                </thead>
                <tbody>

                    <?php
                    if (isset($_SESSION['carrito'])) {
                        $arregloCarrito = $_SESSION['carrito'];
                        for ($i=0; $i<count($arregloCarrito); $i++) {
                    ?>

                            <tr>
                                <td>
                                    <img src="img/<?php echo $arregloCarrito[$i]['Imagen']; ?>" alt="Image" class="img-fluid">
                                </td>
                                <td>
                                    <p><?php echo $arregloCarrito[$i]['Nombre']; ?></p>
                                </td>
                                <td>$<?php echo $arregloCarrito[$i]['Precio']; ?></td>
                                <td>
                                    <div class="input-group mb-3" style="max-width: 120px;">
                                        <div class="input-group-prepend">
                                            <button class="btn btn-outline-primary js-btn-minus" type="button">&minus;</button>
                                        </div>
                                        <input type="text" class="form-control text-center" value="<?php echo $arregloCarrito[$i]['Cantidad']; ?>" placeholder="" aria-label="Example text with button addon" aria-describedby="button-addon1">
                                        <div class="input-group-append">
                                            <button class="btn btn-outline-primary js-btn-plus" type="button">&plus;</button>
                                        </div>
                                    </div>

                                </td>
                                <td>$<?php echo $arregloCarrito[$i]['Precio'] * $arregloCarrito[$i]['Cantidad']; ?></td>
                                <td><a href="#" class="btn btn-primary btn-sm btnEliminar" data-id="<?php echo $arregloCarrito[$id]['Id']; ?>">X</a></td>
                            </tr>

                    <?php }
                    } ?>

                </tbody>
            </table>
        </form>
    </div>

    <?php include('layout/footer.php'); ?>

    

</body>

</html>