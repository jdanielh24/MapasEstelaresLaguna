<?php
//session_start();

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
                <ul>
                    <li><a class="active" href="index.php">Home</a></li>
                    <li><a href="nosotros.php">Nosotros</a></li>
                    <li><a href="productos.php">Productos</a></li>
                    <li><a href="cart.php">Carrito</a></li>
                    <li><a href="contacto.php">Contacto</a></li>
                    <li><?php if (!empty($user)) : ?>
                    <a href="#" ><?= $col2  ; ?></a>
                    <?php endif; ?></li>
                </ul>
                <label id="icon"><i class="fas fa-bars"></i></label>
            </nav>
        </div>
    </div>
</header>



