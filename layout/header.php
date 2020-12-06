<?php
session_start();

include './php/conexion.php';

if (isset($_SESSION['user_id'])) {
    $user = null;
    if ($stmt = $conexion->prepare("SELECT id,nombre FROM usuario WHERE id=?")) {
        $stmt->bind_param("i", $_SESSION['user_id']);
        $stmt->execute();
        $stmt->bind_result($col1, $col2);
        $stmt->fetch();
        if ($col1 > 0) {
            $user = 1;
        }
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