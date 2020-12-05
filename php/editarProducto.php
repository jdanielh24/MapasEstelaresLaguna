<?php
include "./conexion.php";

if(isset($_POST['nombre']) && isset($_POST['descripcion']) && isset($_POST['precio']) && isset($_POST['inventario'])){

    
    if($_FILES['imagen']['name'] != ''){
        $carpeta = "../img/";
        $nombre = $_FILES['imagen']['name'];
        $temp = explode('.',$nombre);
        $extension = end($temp);
        $nombreFinal =time().'.'.$extension;

        if($extension == 'jpg' || $extension == 'png'){
            if(move_uploaded_file($_FILES['imagen']['tmp_name'],$carpeta.$nombreFinal)){
                $fila = $conexion->query('select imagen from producto where id='.$_POST['id']);
                $id = mysqli_fetch_row($fila);

                if(file_exists('../img/'.$id[0])){
                    unlink('../img/'.$id[0]);
                }
                $conexion->query("update productos set imagen ='".$nombreFinal."' where id=".$_POST['id']);
            }
        }

    }
    

    $conexion->query("update productos set 
                            nombre ='".$_POST['nombre']."', 
                            descripcion ='".$_POST['descripcion']."',
                            precio =".$_POST['precio'].",
                            inventario =".$_POST['inventario']."
                            where id=".$_POST['id']);
    
}
header("Location: ../admin/productos.php?edit=Producto editado con exito");




?>