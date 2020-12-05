<?php
session_start();

include 'php/conexion.php';

if (isset($_SESSION['user_id'])) {

    $user = null;
    $col2 = null;

    /* crear una sentencia preparada */
    if ($stmt = $conexion->prepare("SELECT id,email,pass FROM usuario WHERE id=?")) {

        /* ligar parámetros para marcadores */
        $stmt->bind_param("i", $_SESSION['user_id']);

        /* ejecutar la consulta */
        $stmt->execute();

        /* ligar variables de resultado */
        $stmt->bind_result($col1, $col2, $col3);

        /* obtener valor */
        $stmt->fetch();

        if ($col1 > 0) {
            $user = 1;
        }

        /* cerrar sentencia */
        $stmt->close();
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
                    <p class="fw-600 titulos">Bienvenido <?= $col2; ?></p>
                    <a href="logout.php" class="boton boton-amarillo fw-600">Cerrar sesión</a>
                <?php else : ?>
                    <a href="login.php" class="boton boton-amarillo fw-600">Iniciar sesión</a>
                <?php endif; ?>
            </div>
        </div>
    </div>
</header>