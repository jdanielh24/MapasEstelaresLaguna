<?php
include "./conexion.php";

$fila = $conexion->query('select imagen from producto where id='.$_POST['id']);
$id = mysqli_fetch_row($fila);

if(file_exists('../img/'.$id[0])){
    unlink('../img/'.$id[0]);
}
$conexion->query('delete from productos where id='.$_POST['id']);
?>