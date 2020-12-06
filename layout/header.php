<?php
session_start();

include './php/conexion.php';

if (isset($_SESSION['user_id'])) {

    $user = null;

    /* crear una sentencia preparada */
    if ($stmt = $conexion->prepare("SELECT id,nombre FROM usuario WHERE id=?")) {

        /* ligar parámetros para marcadores */
        $stmt->bind_param("i", $_SESSION['user_id']);

        /* ejecutar la consulta */
        $stmt->execute();

        /* ligar variables de resultado */
        $stmt->bind_result($col1, $col2);

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

<header class="site-header">
    <div class="contenedor contenidor-header">
        <div class="barra">

            <a href="index.php">
                <img src="img/LOGO_blanco.png" class="logo-comprimido" alt="Logo empresa">
            </a>   

            <nav class="navegacion">
                <a href="index.php">Home</a>
                <a href="nosotros.php">Nosotros</a>
                <a href="productos.php">Productos</a>
                <a href="cart.php">Carrito</a>
                <a href="contacto.php">Contacto</a>
                <?php if (!empty($user)) : ?>
                    <a href="#" ><?= $col2  ; ?></a>
                <?php endif; ?>
            </nav>
        </div>
    </div>
</header>