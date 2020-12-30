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

    <div class="box">
        <a onclick="changecolor('color1')" id="color1">#f5f5dc</a>
        <a onclick="changecolor('color2')" id="color2">#faf0e6</a>
        <a onclick="changecolor('color3')" id="color3">#800000</a>
        <a onclick="changecolor('color4')" id="color4">#ffffff</a>
    </div>

    <main class="contenedor seccion">
        <h2 class="fw-600 centrar-texto titulos">Nuestros productos</h2>

        <div class="contenedor-disenos centrar-texto">

            <?php
            include('php/conexion.php');
            $resultado = $conexion->query("select * from productos order by id DESC") or die($conexion->error);
            while ($fila = mysqli_fetch_array($resultado)) {
            ?>
                <div class="diseno">
                    <div class="marco-imagen">
                        <img src="img/<?php echo $fila['imagen']; ?>" alt="<?php echo $fila['nombre']; ?>">
                    </div>
                    <div class="contenido-diseno">
                        <h3 class=" fw-500"> <?php echo $fila['nombre']; ?> </h3>
                        <p> <?php echo $fila['descripcion']; ?> </p>
                        <p> $<?php echo $fila['precio']; ?> </p>

                        <?php if (!empty($user)) : ?>
                            <a href="cart.php?id=<?php echo $fila['id']; ?>" class="boton boton-amarillo">Agregar al carrito</a>
                        <?php else : ?>
                            <a href="login.php" class="boton boton-amarillo">Agregar al carrito</a>
                        <?php endif; ?>
                    </div>
                </div>

            <?php } ?>

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

    <button id="topBtn"><i class="fas fa-arrow-up"></i></button>

    <?php include('layout/footer.php'); ?>

    <script>
        function changecolor(id){
            document.body.style.background = document.getElementById(id).innerHTML;
        }
    </script>

</body>

</html>