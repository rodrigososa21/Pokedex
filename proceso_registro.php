<?php

    include_once 'conexion.php';

    $nombreAp = $_POST['nombreAp'];
    $user = $_POST['user'];

    // Para que la password no sea visible en la base de datos se utiliza sha1.
    $salt = "oimouimoi8768756875";
    $password = $_POST['password'].$salt;
    $password = sha1($password);

    $consulta = "INSERT INTO usuario (nombreAp, user, password) VALUES ('$nombreAp', '$user', '$password')";
    $resultado = mysqli_query($conexion, $consulta);

    if(!$resultado){
        header("Location: registro.php");
    } else{
        header("Location: login.php");
    }
?>