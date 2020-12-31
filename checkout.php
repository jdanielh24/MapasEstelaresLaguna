<?php session_start();?>

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

    <script src="https://www.paypal.com/sdk/js?client-id=AYp8WAzSUQgRz-haVecxj_uEVEjza0f3BG_Gpj_nZs34rx8SZwgPg8mmCdVn4eG3PtPl3OF0lguBW6b6&currency=MXN">
        // Replace YOUR_SB_CLIENT_ID with your sandbox client ID
    </script>

    <?php include('layout/header.php'); ?>

    <?php
    if (!isset($_SESSION['user_id']) || !isset($_SESSION['carrito'])) {
        //header('Location: ./index.php');
        echo "<script type='text/javascript'> document.location = 'https://mapasestelareslaguna.000webhostapp.com/index.php'; </script>";
    }
    $arreglo  = $_SESSION['carrito'];

    if (isset($_POST['pagado'])) {
        $pagado = 1;
    } else {
        $pagado = 0;
    }

    ?>

    <section class="contenedor contenido-centrado seccion">
        <h2 class="fw-500 centrar-texto">Detalles del pago</h2>
        <form action="orden.php" method="post" id="formulario">

            <div class="contacto-form">
                <fieldset>
                    <legend>Información de envío</legend>

                    <label for="c_direccion">Dirección</label>
                    <input type="text" id="c_direccion" name="c_direccion" placeholder="Tu direccion" required>

                    <label for="c_ciudad">Ciudad</label>
                    <select id="c_ciudad" name="c_ciudad" required>
                        <option value="gomez">Gómez Palacio</option>
                        <option value="torreon">Torreón</option>
                        <option value="lerdo">Lerdo</option>
                    </select>

                    <p>Asegurate de tener llenos todos los campos.</p>
                    <p>Despúes selecciona la opción de pago y completa el proceso.</p>

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
                                    <td>$<?php echo  number_format($arreglo[$i]['Precio'] * $arreglo[$i]['Cantidad'], 2, '.', ''); ?></td>
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
                        como la referencia de pago. <?php echo $pagado; ?></p>
                    <div id="paypal-button-container"></div>


                    <?php if ($pagado == 1) : ?>
                        <button class="boton boton-amarillo btn btn-block" type="submit">Finalizar orden</button>
                    <?php endif; ?>

                    <button class="boton boton-amarillo btn btn-block" type="submit">Finalizar orden</button>

                </fieldset>
            </div>

        </form>
    </section>

    <?php include('layout/footer.php'); ?>

    <script src="js/jquery-3.3.1.min.js"></script>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            document.getElementById("formulario").addEventListener('submit', validarFormulario);
        });

        function validarFormulario(evento) {
            evento.preventDefault();
            var direccion, ciudad;
            direccion = document.getElementById("c_direccion").value;
            ciudad = document.getElementById("c_ciudad").value;

            if (direccion == null || direccion.length == 0 || ciudad == null || ciudad.length == 0) {
                alert("Todos los campos son obligatorios.");
                return false;
            } else if (direccion.length > 100) {
                alert("La direccion es muy larga");
                return false;
            } else if (ciudad.length > 50) {
                alert("El nombre de la ciudad es muy largo");
                return false;
            }

            this.submit();
        }
    </script>

    <script>
        paypal.Buttons({
            createOrder: function(data, actions) {
                return actions.order.create({
                    purchase_units: [{
                        amount: {
                            value: '<?php echo $total; ?>'
                        }
                    }]
                });
            },
            onApprove: function(data, actions) {
                return actions.order.capture().then(function(details) {
                    alert('Transaction completed by ' + details.payer.name.given_name);
                });
                var pagado = 1;
                    $.ajax({
                        type: 'POST',
                        url: 'checkout.php',
                        data: {
                            pagado: pagado
                        }
                    });
            }
        }).render('#paypal-button-container'); // Display payment options on your web page
    </script>

</body>

</html>