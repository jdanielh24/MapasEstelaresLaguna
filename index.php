<?php session_start(); ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" integrity="sha512-+4zCK9k+qNFUR5X+cKL9EIR+ZOhtIloNl9GIKS57V1MyNsYpYcUrUeQc9vNfzsWfV28IaLL3i96P9sdNyeRssA==" crossorigin="anonymous" />
    <script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"> </script>
    <script src="js/main.js"></script>
    <link rel="stylesheet" href="css/normalize.css">
    <link rel="stylesheet" href="css/styles.css">
    <title>M-E Laguna</title>
</head>

<body>

    <?php 
        include ('layout/headerIndex.php');
    ?>

    <main class="contenedor">
        <div class="cont-part1">
            <img src="img/Mapa1.png" alt="mapa 1" class="tamaño">
            <div class="cont-texto">
                <h2>¿Qué es un mapa Estelar?</h2>
                <p>El cielo sobre tu cabeza cambia su imagen de un momento a otro. M-E Laguna mueve al papel el mapa de
                    estrellas de tu momento especial y crea un cuadro de constelaciones personalizado y unico.</p>
            </div>
        </div>

        <div class="cont-part2">
            <h2>Mapa estelar personalizado: Un regalo único</h2>
            <p>Puedes pedir fácilmente un regalo inolvidable que seguramente traerá una sonrisa a las caras de los
                destinatarios. Confía en nosotros ¡el número de clientes encantados con los mapas estelares
                personalizados sigue creciendo con cada instante!</p>
        </div>

        <div class="cont-part3">
            <div class="cont-texto2">
                <h2>Mapa estelar día concreto</h2>
                <p>Con nosotros, puedes hacer lo imposible y detener las estrellas con el fin de darle, a la persona
                    única, su propia imagen del cielo! Dinos solo la fecha, el lugar exacto del evento y agrega tus
                    felicitaciones personales. Nosotros nos encargamos del resto. </p>
            </div>
            <img src="img/Mapa2.png" alt="mapa 2" class="tamaño2">
        </div>
    </main>
    
    <div class="contenedor-opiniones">
        <h2 class="fw-600 centrar-texto">Nuestros Clientes</h2>

        <div class="slider-outer">
            <img src="img/Arrow-left.png" class="prev" alt="Prev">

            <div class="slider-inner">
                <img src="img/belinda2.jpg" class="active">
                <img src="img/lana2.jpg">
                <img src="img/cry2.jpg">

            </div>

            <img src="img/Arrow-right.png" class="next" alt="Next">
        </div>
    </div>

    <button id="topBtn"><i class="fas fa-arrow-up"></i></button>

    <?php include ('layout/footer.php'); ?>

</body>

</html>