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


<?php
$password = "";
if (isset($_POST['c_password'])) {
    if ($_POST['c_password'] != "") {
        $password = $_POST['c_password'];
    }
}
$password = password_hash($password, PASSWORD_BCRYPT);
$conexion->query("insert into usuario (nombre,email,pass,nivel)  
  values( 
    '" . $_POST['c_nombre'] . "',
    '" . $_POST['c_email'] . "',
    '" . $password . "',
    'cliente' 
        )   
") or die($conexion->error);
?>