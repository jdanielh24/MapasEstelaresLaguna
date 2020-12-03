<?php
    $servidor="localhost";
    $bd="carrito";
    $usuario="root";
    $pass="";
    $conexion = new mysqli($servidor,$usuario,$pass,$bd);
    if($conexion->connect_error){
        die("Error. No se puede conectar a la base de datos.");
    }
    
?>