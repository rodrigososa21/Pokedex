<?php

    include_once 'conexion.php';

    $nombre = $_POST['nombre'];
    $tipo = $_POST['tipo'];

    // Recuperamos la imagen en el formato correspondiente.
    $imagen = addslashes(file_get_contents($_FILES['imagen']['tmp_name']));

    $query = "INSERT INTO pokemon (nombre, tipo, imagen) VALUES ('$nombre', '$tipo', '$imagen')";
    $resultado = $conexion->query($query);

    if($resultado){
        // echo "Se insertó.";
        header("location: index_logueado.php");
    } else{
        // echo "No se insertó.";
    }
?>