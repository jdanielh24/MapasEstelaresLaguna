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

    <section class="contenedor opiniones">
        <h2 class="fw-600">Nuestros Clientes</h2>

        <div class="cont-opinion">
            <img src="img/Belinda.PNG" alt="cliente1">
            <div class="cont-op-texto">
                <h3 class="fw-500">Belinda</h3>
                <p>Excelente servicio y trabajos, a Nodal le gustó demasiado.</p>
            </div>
        </div>

        <div class="cont-opinion">
            <img src="img/Lana.PNG" alt="cliente2">
            <div class="cont-op-texto fondo">
                <h3 class="fw-500">Lana</h3>
                <p>Mi novio está encantado, mil gracias!</p>
            </div>
        </div>

        <div class="cont-opinion">
            <img src="img/cr7.png" alt="cliente3">
            <div class="cont-op-texto">
                <h3 class="fw-500">Cristiano Ronaldo</h3>
                <p>Minha namorada Georgina adorou! Obrigado meu Deus</p>
            </div>
        </div>
    </section>

    <?php include ('layout/footer.php'); ?>

</body>

</html>