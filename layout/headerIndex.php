<?php
session_start();

include 'php/conexion.php';

if (isset($_SESSION['user_id'])) {
    $records = $conn->prepare('SELECT id, email, pass FROM users WHERE id = :id');
    $records->bindParam(':id', $_SESSION['user_id']);
    $records->execute();
    $results = $records->fetch(PDO::FETCH_ASSOC);

    $user = null;

    if (count($results) > 0) {
        $user = $results;
    }
}
?>

<header class="index-header">
    <div class="contenido-header-inicio">
        <a href="index.html" class="logo">
            <img src="img/LOGO.png" alt="Logo Principal">
        </a>

        <div class="barra_nav fw-400">
            <nav>
                <a href="index.php">home</a>
                <a href="nosotros.php">nosotros</a>
                <a href="productos.php">productos</a>
                <a href="cart.php">carrito</a>
                <a href="contacto.php">contacto</a>
            </nav>
        </div>
        <div class="contenedor mini-contenedor">
            <h1 class="fw-600">El regalo perfecto para Las ocasiones especiales</h1>
            <div class="margen-boton">
                <?php if (!empty($user)) : ?>
                    <p class="fw-600 titulos">Bienvenido <?= $user['email']; ?></p>
                    <a href="logout.php" class="boton boton-amarillo fw-600">Cerrar sesión</a>
                <?php else : ?>
                    <a href="productos.php" class="boton boton-amarillo fw-600">Iniciar sesión</a>
                <?php endif; ?>
            </div>
        </div>
    </div>
</header>