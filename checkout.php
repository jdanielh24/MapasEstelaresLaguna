<?php
session_start();
if (!isset($_SESSION['carrito'])) {
    header('Location: ./index.php');
}
$arreglo  = $_SESSION['carrito'];

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
</head>

<body>

    <?php include('layout/header.php'); ?>

    <section class="contenedor contenido-centrado seccion">
        <h2 class="fw-500 centrar-texto">Detalles del pago</h2>
        <form action="orden.php" method="post">

            <div class="contacto-form">
                <fieldset>
                    <legend>Información personal</legend>

                    <label for="c_nombre">Nombre</label>
                    <input type="text" id="c_nombre" name="c_nombre" placeholder="Tu nombre" required>

                    <label for="c_direccion">Dirección</label>
                    <input type="text" id="c_direccion" name="c_direccion" placeholder="Tu direccion" required>

                    <label for="c_ciudad">Ciudad</label>
                    <select id="c_ciudad" name="c_ciudad">
                        <option value="" disabled selected>-- Seleccione --</option>
                        <option value="gomez">Gómez Palacio</option>
                        <option value="torreon">Torreón</option>
                        <option value="lerdo">Lerdo</option>
                    </select>

                    <label for="c_email">e-mail</label>
                    <input type="email" id="c_email" name="c_email" placeholder="Tu correo electrónico" required>

                    <p>Crea una cuenta introduciendo la información previa y una contraseña. </p>
                    <p> Si ya eres un cliente registrado, inicia sesión en la parte supeior.</p>

                    <label for="c_password">Contraseña de la cuenta</label>
                    <input type="password" id="c_password" name="c_password" placeholder="">

                </fieldset>

                <fieldset>
                    <legend>Tu orden</legend>

                    <table>
                        <thead>
                            <th>Producto</th>
                            <th>Total</th>
                        </thead>
                        <tbody>
                            <?php
                            $total = 0;
                            for ($i = 0; $i < count($arreglo); $i++) {
                                $total = $total + ($arreglo[$i]['Precio'] * $arreglo[$i]['Cantidad']);

                            ?>
                                <tr>
                                    <td>$<?php echo $arreglo[$i]['Nombre']; ?> </td>
                                    <td>$<?php echo  number_format($arreglo[$i]['Precio']*$arreglo[$i]['Cantidad'], 2, '.', ''); ?></td>
                                </tr>

                            <?php
                            }
                            ?>
                            <tr>
                                <td>Order Total</td>
                                <td>$<?php echo number_format($total, 2, '.', ''); ?></td>
                            </tr>
                        </tbody>
                    </table>

                    <h3>Paypal</h3>
                    <p class="mb-0">Haz tu pago directamente con tu cuenta bancaria. Utiliza tu ID de orden
                        como la referencia de pago.</p>


                    <button class="boton boton-amarillo btn btn-block" type="submit">Finalizar orden</button>


                </fieldset>
            </div>

        </form>
    </section>

    <?php include('layout/footer.php'); ?>

</body>

</html>