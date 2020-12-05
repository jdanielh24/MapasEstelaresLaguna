<?php

session_start();

if (isset($_SESSION['user_id'])) {
    header('Location: index.php');
}
include 'php/conexion.php';

if (!empty($_POST['email']) && !empty($_POST['pass'])) {

    /* crear una sentencia preparada */
    if ($stmt = $conexion->prepare("SELECT id,email,pass,nivel FROM usuario WHERE email=?")) {

        /* ligar parámetros para marcadores */
        $stmt->bind_param("s", $_POST['email']);

        /* execute query */
        $stmt->execute();

        /* bind result variables */
        $stmt->bind_result($col1,$col2,$col3,$col4);

        /* fetch value */
        $stmt->fetch();

        $message = '';

        if($col4 == "admin"){
            if($_POST['pass'] == $col3){
                $_SESSION['user_id'] = $col1;
            header("Location: admin/productos.php");
            }
        }else{
            if ( password_verify($_POST['pass'], $col3)) {
                $_SESSION['user_id'] = $col1;
                header("Location: index.php");
            } else {
                $message = 'Lo sentimos, los datos no coinciden.';
            }
    
            /* cerrar sentencia */
            $stmt->close();
        }
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
    <link rel="stylesheet" href="css/normalize.css">
    <link rel="stylesheet" href="css/styles.css">
</head>

<body>

    <?php include('layout/header.php'); ?>

    <main class="contenedor seccion contacto-form">
        <?php if (!empty($message)) : ?>
            <p> <?= $message ?></p>
        <?php endif; ?>

        <h1>Login</h1>
        <p>¿No tienes una cuenta? Puedes registrarte una vez que tengas tu carrito.</p>

        <form action="login.php" method="POST">
            <input type="text" name="email" placeholder="Tu email">
            <input type="password" name="pass" placeholder="Tu contraseña">
            <input type="submit" class="boton boton-amarillo" value="Submit">
        </form>
    </main>

    <?php include('layout/footer.php'); ?>


</body>