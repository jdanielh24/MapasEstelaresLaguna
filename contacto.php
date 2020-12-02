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

    <?php include('layout/header.php'); ?>

    <main class="contacto contenedor">
        <h2 class="fw-500">¿Quieres un mapa?</h2>
        <p class="fw-400">Puedes ponerte en contacto en nuestras redes</p>
        <div class="imagenes-redes">
            <a href="https://www.facebook.com/mapasestelareslag/" target="_blank">
                <img src="img/Amarillo_facebook.png" alt="Facebook">
            </a>
            <a href="https://www.instagram.com/" target="_blank">
                <img src="img/Amarillo_instagram.png" alt="Instagram">
            </a>
        </div>
    </main>

    <section class="contenedor contenido-centrado seccion">
        <h2 class="fw-500 centrar-texto">Llena el formulario de contacto</h2>
        <form action="">

            <div class="contacto-form">
                <fieldset>
                    <legend>Información personal</legend>

                    <label for="nombre">Nombre</label>
                    <input type="text" id="nombre" placeholder="Tu nombre" required>

                    <label for="email">e-mail</label>
                    <input type="email" id="email" placeholder="Tu correo electrónico" required>

                    <label for="ciudad">Ciudad</label>
                    <select id="ciudad">
                        <option value="" disabled selected>-- Seleccione --</option>
                        <option value="spotify">Gómez Palacio</option>
                        <option value="qr">Torreón</option>
                        <option value="qr">Lerdo</option>
                    </select>
                </fieldset>

                <fieldset>
                    <legend>Tipo de mapa</legend>

                    <label for="tamano">Tamaño</label>
                    <select id="tamano" required>
                        <option value="" disabled selected>-- Seleccione --</option>
                        <option value="chico">24.5x30.5cm - $270</option>
                        <option value="mediano">31.0x38.0cm - $420</option>
                        <option value="grande">43.0x53.0cm - $570</option>
                    </select>

                    <label for="estilo">Diseño</label>
                    <select id="estilo" required>
                        <option value="" disabled selected>-- Seleccione --</option>
                        <option value="normal">Normal</option>
                        <option value="silueta">Con silueta de fondo</option>
                        <option value="foto">Con fotografía de fondo</option>
                    </select>

                    <label for="color_fondo">Color de fondo</label>
                    <select id="color_fondo" required>
                        <option value="" disabled selected>-- Seleccione --</option>
                        <option value="negro">Negro</option>
                        <option value="blanco">Blanco</option>
                    </select>
                </fieldset>
            </div>


            <fieldset>
                <legend>Personaliza tu mapa</legend>

                <div class="grid-datos">
                    <div class="dato-mapa">
                        <label for="ciudad">Ciudad</label>
                        <input type="text" id="ciudad" placeholder="Ciudad de tu momento especial" required>
                    </div>

                    <div class="dato-mapa">
                        <label for="fecha">Fecha</label>
                        <input type="date" id="fecha" required>
                    </div>

                    <div class="dato-mapa">
                        <label for="iniciales">Iniciales</label>
                        <input type="text" id="iniciales" placeholder="Iniciales o nombres (Ej. J & A)">
                    </div>

                    <div class="dato-mapa">
                        <label for="cancion">Canción</label>
                        <input type="text" id="canción" placeholder="(Ej. Chasing Cars-Snow Patrol)">
                    </div>

                    <div class="dato-mapa">
                        <label for="frase">Frase</label>
                        <textarea id="frase" placeholder="Frase o texto para acompañar tu mapa(Ej. Entre todas las estrellas eres mi favorita)"></textarea>
                    </div>

                    <div class="dato-mapa">
                        <label for="codigo">Tipo de código para la canción</label>
                        <select id="codigo">
                            <option value="" disabled selected>-- Seleccione --</option>
                            <option value="spotify">Código Spotify</option>
                            <option value="qr">QR de Youtube</option>
                        </select>
                    </div>

                </div>

            </fieldset>

            <div class="contenedor centrado">
                <input type="submit" value="Enviar" class="boton boton-amarillo">
            </div>

        </form>
    </section>

    <?php include('layout/footer.php'); ?>

</body>

</html>