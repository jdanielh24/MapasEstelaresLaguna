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

    <main class="contenedor seccion">
        <h2 class="fw-600 centrar-texto titulos">Nuestros productos</h2>

        <div class="contenedor-disenos centrar-texto">
            <div class="diseno">
                <div class="marco-imagen">
                    <img src="img/diseño1.jpg" alt="Mapa silueta">
                </div>
                <div class="contenido-diseno">
                    <h3 class=" fw-500">Mapa con silueta</h3>
                    <p>Lleva tu mapa a otro nivel y dejanos dibujar una fotografía tuya de manera original. </p>
                    <a href="contacto.html" class="boton boton-amarillo">Quiero uno</a>
                </div>
            </div>

            <div class="diseno">
                <div class="marco-imagen">
                    <img src="img/diseño2.jpg" alt="Mapa normal">
                </div>
                <div class="contenido-diseno">
                    <h3 class="fw-500">Mapa normal</h3>
                    <p>Un mapa para los amantes de lo clásico. Deja que las estrellas hablen por ti.</p>
                    <a href="contacto.html" class="boton boton-amarillo">Quiero uno</a>
                </div>
            </div>

            <div class="diseno">
                <div class="marco-imagen">
                    <img src="img/diseño3.jpg" alt="Mapa foto de fondo">
                </div>
                <div class="contenido-diseno">
                    <h3 class="fw-500">Mapa con foto</h3>
                    <p>Acompaña tu mapa con una fotografía de fondo para darle un estilo original.</p>
                    <a href="contacto.html" class="boton boton-amarillo">Quiero uno</a>
                </div>
            </div>
        </div>
    </main>

    <section class="contenedor seccion">
        <h2 class="fw-600 centrar-texto titulos">Nuestros trabajos</h2>
        <div class="contenedor-disenos">
            <div class="diseno">
                <div class="marco-imagen">
                    <img src="img/trabajo1.jpg" alt="imagen 1">
                </div>
            </div>
            <div class="diseno">
                <div class="marco-imagen">
                    <img src="img/trabajo2.jpg" alt="imagen 1">
                </div>
            </div>
            <div class="diseno">
                <div class="marco-imagen">
                    <img src="img/trabajo3.jpg" alt="imagen 1">
                </div>
            </div>
            <div class="diseno">
                <div class="marco-imagen">
                    <img src="img/trabajo4.jpg" alt="imagen 1">
                </div>
            </div>
            <div class="diseno">
                <div class="marco-imagen">
                    <img src="img/trabajo5.jpg" alt="imagen 1">
                </div>
            </div>
            <div class="diseno">
                <div class="marco-imagen">
                    <img src="img/trabajo6.jpg" alt="imagen 1">
                </div>
            </div>
            <div class="diseno">
                <div class="marco-imagen">
                    <img src="img/trabajo7.jpg" alt="imagen 1">
                </div>
            </div>
            <div class="diseno">
                <div class="marco-imagen">
                    <img src="img/trabajo8.jpeg" alt="imagen 1">
                </div>
            </div>
            <div class="diseno">
                <div class="marco-imagen">
                    <img src="img/trabajo9.jpg" alt="imagen 1">
                </div>
            </div>
        </div>
    </section>

    <section class="contenedor seccion">
        <h2 class="fw-600 centrar-texto titulos">Tamaños y precios</h2>

        <div class="contenedor-precios">

            <div class="info-precio-tamano">
                <div class="informacion">
                    <img src="img/Precio.png" alt="logo de precio">
                    <p>24.50x30.50CM</p>
                </div>
                <div class="informacion">
                    <img src="img/Tamaño.png" alt="logo de tamaño">
                    <p>$ 270.00 MXN</p>
                </div>
            </div>

            <div class="info-precio-tamano">
                <div class="informacion">
                    <img src="img/Precio.png" alt="logo de precio">
                    <p>31.00x38.00CM</p>
                </div>
                <div class="informacion">
                    <img src="img/Tamaño.png" alt="logo de tamaño">
                    <p>$ 420.00 MXN</p>
                </div>
            </div>


            <div class="info-precio-tamano">
                <div class="informacion">
                    <img src="img/Precio.png" alt="logo de precio">
                    <p>43.00x53.00CM</p>
                </div>
                <div class="informacion">
                    <img src="img/Tamaño.png" alt="logo de tamaño">
                    <p>$ 570.00 MXN</p>
                </div>
            </div>
        </div>
    </section>

    <?php include('layout/footer.php'); ?>

</body>

</html>