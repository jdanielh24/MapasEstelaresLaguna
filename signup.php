<?php

include 'php/conexion.php';

if (isset($_SESSION['user_id'])) {
    header('Location: index.php');
}
$password = "";
$password2 = "";
$mensaje = null;
$registrado = false;
if (isset($_POST['c_password'])) {
    if ($_POST['c_password'] != "" && $_POST['c_password2'] != "") {
        $password = $_POST['c_password'];
        $password2 = $_POST['c_password2'];
    }
    if ($password == $password2) {
        $password = password_hash($password, PASSWORD_BCRYPT);
        $conexion->query("insert into usuario (nombre,email,pass,nivel)  
         values( 
            '" . $_POST['c_nombre'] . "',
            '" . $_POST['c_email'] . "',
            '" . $password . "',
            'cliente' 
            )   
        ") or die($conexion->error);
        $mensaje = "Registrado exitosamente!";
        $registrado = true;
    } else {
        $mensaje = "Las contraseñas no coinciden. Intenta de nuevo";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>M-E Laguna</title>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/normalize.css">
    <link rel="stylesheet" href="css/styles.css">
    <script>
        src = "js/validar.js"
    </script>
</head>

<body>

    <section class="contenedor contenido-centrado seccion">
        <h2 class="fw-500 centrar-texto">Registro</h2>
        <form action="signup.php" method="post" id="formulario">
            <div class="contacto-form">

                <fieldset>
                    <legend>Información personal</legend>

                    <label for="c_nombre">Nombre</label>
                    <input type="text" id="c_nombre" name="c_nombre" placeholder="Tu nombre" required>

                    <label for="c_email">e-mail</label>
                    <input type="email" id="c_email" name="c_email" placeholder="Tu correo electrónico" required>
                </fieldset>

                <fieldset>
                    <legend>Seguridad de tu cuenta</legend>

                    <label for="c_password">Contraseña</label>
                    <input type="password" id="c_password" name="c_password" placeholder="">

                    <label for="c_password2">Confirma tu contraseña</label>
                    <input type="password" id="c_password2" name="c_password2" placeholder="">

                </fieldset>
            </div>
            <button class="boton boton-amarillo btn btn-block" type="submit">Registrarme</button>
        </form>

        <p><?php echo $mensaje; ?></p>

        <?php if ($registrado) : ?>
            <a href="login.php" class="boton boton-amarillo fw-600">Inicia sesión</a>
        <?php endif; ?>

    </section>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            document.getElementById("formulario").addEventListener('submit', validarFormulario);
        });

        function validarFormulario(evento) {
            evento.preventDefault();
            var nombre, email, passw, passw2, expresion;
            nombre = document.getElementById("c_nombre").value;
            email = document.getElementById("c_email").value;
            passw = document.getElementById("c_password").value;
            passw2 = document.getElementById("c_password2").value;

            expresion = /\w+@\w+\.+[a-z]/;

            if (nombre == null || nombre.length == 0 || email == null || email.length == 0 || passw == null || passw.length == 0 ||
                passw2 == null || passw2.length == 0) {
                alert("Todos los campos son obligatorios.");
                return false;
            } else if (nombre.length > 200) {
                alert("El nombre es muy largo");
                return false;
            } else if (email.length > 200) {
                alert("El correo es muy largo");
                return false;
            } else if (!expresion.test(email)) {
                alert("El email no es valido");
                return false;
            }

            this.submit();
        }
    </script>

    <?php include('layout/footer.php'); ?>

</body>