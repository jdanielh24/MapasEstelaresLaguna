<?php session_start();?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>M-E Laguna</title>
    <script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"> </script>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600&display=swap" rel="stylesheet">
    <script src="js/main.js"></script>
    <link rel="stylesheet" href="css/normalize.css">
    <link rel="stylesheet" href="css/styles.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" integrity="sha512-+4zCK9k+qNFUR5X+cKL9EIR+ZOhtIloNl9GIKS57V1MyNsYpYcUrUeQc9vNfzsWfV28IaLL3i96P9sdNyeRssA==" crossorigin="anonymous" />
</head>

<body>

    <?php include('layout/header.php'); ?>

    <div class="contenedor-principal">
        <main class="contenedor info-nosotros">
            <div class="sub-contenedor1">
                <img src="img/nosotros.jpg" alt="nosotros">
                <div class="texto-nosotros">
                    <h1>Nuestra historia</h1>
                    <p>¿Quién no lo ha experimentado todavía? Recuerdas un momento muy especial al que te encantaría aferrarte. En nuestro caso, el recuerdo fue una hermosa noche estrellada. Pensando en cómo inmortalizar este momento significativo, nació la idea de Mi Mapa Estelar.</p>
                    <p>Queríamos crear algo para compartir experiencias con los demás. Por lo tanto, nosotros y nuestro fabricante de impresión nos propusimos diseñar un diseño moderno y atemporal que embellezca cualquier sala de estar, de dormir, de niños o incluso de trabajo. Así que nuestros Mapas de Estrellas pueden ser usados perfectamente como un regalo muy personal y único para las personas que más nos importan.</p>
                </div>
            </div>
        </main>

        <section class="contenedor descripcion-nosotros">
            <div class="sub-contenedor2">
                <div class="contenedor-descr">
                    <div class="texto-descr">
                        <img src="img/paypal.png" alt="logo-paypal">
                        <h2>Pago seguro</h2>
                        <p>Sólo trabajamos con los proveedores de servicios de pago más seguros.</p>
                    </div>
                </div>

                <div class="contenedor-descr">
                    <div class="texto-descr">
                        <img src="img/impresora.png" alt="logo-impresora">
                        <h2>Máxima calidad de impresión</h2>
                        <p>Su Mapa Estelar se imprimirá en papel mate de 230gsm con calidad de museo.</p>
                    </div>
                </div>

                <div class="contenedor-descr">
                    <div class="texto-descr">
                        <img src="img/envio.png" alt="logo-impresora">
                        <h2>Envío rápido</h2>
                        <p>Estamos trabajando constantemente para entregar en el menor tiempo posible.</p>
                    </div>
                </div>
            </div>
        </section>
    </div>

    <?php include('layout/footer.php'); ?>

</body>

</html>