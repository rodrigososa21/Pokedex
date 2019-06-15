<?php

    session_start();

    // Validamos que los datos ingresados coincidan con los de la base de datos.
    $user = $_POST['user'];

    // Para que la password no sea visible en la base de datos se utiliza sha1.
    $salt = "oimouimoi8768756875";
    $password = $_POST['password'].$salt;
    $password = sha1($password);

    include_once 'conexion.php';

    $consulta = $conexion->query("SELECT * FROM usuario WHERE user = '$user' AND password = '$password'");

    if($resultado = mysqli_fetch_array($consulta)){
        $_SESSION['u_user'] = $user;
        header("Location: index_logueado.php");
        // echo "Sesión exitosa.";
    } else{
        header("Location: login.php");
        // echo "Sesión no exitosa.";
    }
?>