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

    <main class="contacto contenedor">
        <h2 class="fw-500">¿Tienes alguna duda o queja?</h2>
        <p class="fw-400">Puedes ponerte en contacto en nuestras redes.</p>
        <div class="imagenes-redes">
            <a href="https://www.facebook.com/mapasestelareslag/" target="_blank">
                <img src="img/Amarillo_facebook.png" alt="Facebook">
            </a>
            <a href="https://www.instagram.com/" target="_blank">
                <img src="img/Amarillo_instagram.png" alt="Instagram">
            </a>
        </div>
        
    </main>

    <?php include('layout/footer.php'); ?>

</body>

</html>