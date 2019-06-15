<?php

    include_once 'conexion.php';

    $id = $_REQUEST['id'];

    $nombre = $_POST['nombre'];
    $tipo = $_POST['tipo'];

    // Recuperamos la imagen en el formato correspondiente.
    $imagen = addslashes(file_get_contents($_FILES['imagen']['tmp_name']));

    $query = "UPDATE pokemon SET nombre = '$nombre', tipo = '$tipo', imagen = '$imagen' WHERE id = '$id'";
    $resultado = $conexion->query($query);

    if($resultado){
        // echo "Se modificó.";
        header("location: index_logueado.php");
    } else{
        // echo "No se modificó.";
    }
?>