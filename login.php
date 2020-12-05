<?php

session_start();

if (isset($_SESSION['user_id'])) {
    header('Location: index.php');
}
include 'php/conexion.php';

if (!empty($_POST['email']) && !empty($_POST['pass'])) {
    $records = $conn->prepare('SELECT id, email, pass FROM users WHERE email = :email');
    $records->bindParam(':email', $_POST['email']);
    $records->execute();
    $results = $records->fetch(PDO::FETCH_ASSOC);

    $message = '';

    if (count($results) > 0 && password_verify($_POST['pass'], $results['pass'])) {
        $_SESSION['user_id'] = $results['id'];
        header("Location: index.php");
    } else {
        $message = 'Lo sentimos, los datos no coinciden.';
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
            <input name="email" type="text" placeholder="Tu email">
            <input name="pass" type="pass" placeholder="Tu contraseña">
            <input type="submit" class="boton boton-amarillo" value="Submit">
        </form>
    </main>

    <?php include('layout/footer.php'); ?>


</body>