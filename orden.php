<?php
session_start();
include './php/conexion.php';
if (!isset($_SESSION['carrito'])) {
    header("Location: ./index.php");
}
$arreglo  = $_SESSION['carrito'];
$total = 0;
for ($i = 0; $i < count($arreglo); $i++) {
    $total += + ($arreglo[$i]['Precio'] * $arreglo[$i]['Cantidad']);
}
$password = "";
if (isset($_POST['c_password'])) {
    if ($_POST['c_password'] != "") {
        $password = $_POST['c_password'];
    }
}
$password = password_hash($password, PASSWORD_BCRYPT);
$conexion->query("insert into usuario (nombre,email,pass,nivel)  
  values( 
    '" . $_POST['c_nombre'] . "',
    '" . $_POST['c_email'] . "',
    '" . $password . "',
    'cliente' 
        )   
") or die($conexion->error);
$id_usuario = $conexion->insert_id;

$fecha = date('Y-m-d h:m:s');
$conexion->query("insert into ventas(id_usuario,total,fecha) values($id_usuario,$total,'$fecha')") or die($conexion->error);
$id_venta = $conexion->insert_id;

for ($i = 0; $i < count($arreglo); $i++) {
    $conexion->query("insert into productos_venta (id_venta,id_producto,cantidad,precio,subtotal) 
    values(
      $id_venta,
      " . $arreglo[$i]['Id'] . ",
      " . $arreglo[$i]['Cantidad'] . ",
      " . $arreglo[$i]['Precio'] . ",
      " . $arreglo[$i]['Cantidad'] * $arreglo[$i]['Precio'] . "
      ) ") or die($conexion->error);
    $conexion->query("update productos set inventario =inventario -" . $arreglo[$i]['Cantidad'] . " where id=" . $arreglo[$i]['Id']) or die($conexion->error);
}

$conexion->query(" insert into envios(direccion,ciudad,id_venta) values
      (
        '" . $_POST['c_direccion'] . "',
        '" . $_POST['c_ciudad'] . "',
        $id_venta
      )  
      
      ") or die($conexion->error);

unset($_SESSION['carrito']);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/normalize.css">
    <link rel="stylesheet" href="css/styles.css">
    <title>M-E Laguna</title>
</head>

<body>

    <?php include('layout/header.php'); ?>


    <main class="contenedor seccion centrar-texto">
        <h2 class="fw-600 titulos">¡GRACIAS!</h2>
        <h3>Tu orden fue realizada con exito</h3>
        <!--<p><a href="verpedido.php?id_venta=<?php echo $id_venta; ?>" class="boton boton-amarillo">Ver Pedido</a></p>-->
    </main>

    <?php include('layout/footer.php'); ?>

</body>

</html>