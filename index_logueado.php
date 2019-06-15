<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <!-- LLAMAMOS AL CSS -->
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">

    <!-- FONT AWESOME -->
    <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Pokedex</title>
</head>
<body>

    <?php
        session_start();

        if(isset($_SESSION['u_user'])){
            // echo "Sesión exitosa. Bienvenido";
        } else{
            header("Location: login.php");
        }
    ?>

    <div class="container">
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark mb-3">
            <a class="navbar-brand" href="index_logueado.php">Pokedex</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="agregar_pokemon.php">Agregar</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="logout.php">Salir</a>
                    </li>
                </ul>
                <form class="form-inline my-2 my-lg-0" action="index_logueado.php" method="POST">
                    <input class="form-control mr-sm-2" type="search" name="txtFiltro" size="30" placeholder="Buscar por nombre o tipo...">
                    <button class="btn btn-danger my-2 my-sm-0" type="submit" name="btnFiltrar">Buscar</button>
                </form>
            </div>
        </nav>

        <table class="table table-bordered table-striped">
            <thead>
                <tr class="text-center">
                    <th>Id</th>
                    <th>Nombre</th>
                    <th>Tipo</th>
                    <th>Imagen</th>
                    <th COLSPAN="2">Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    include_once 'conexion.php';

                    $existePokemon = false;

                    if(isset($_POST['btnFiltrar'])){
                        $filtro = $_POST['txtFiltro'];
                        $query = "SELECT * FROM pokemon WHERE nombre LIKE '%$filtro%' OR tipo LIKE '%$filtro%'";
                    } else{
                        $query = "SELECT * FROM pokemon";
                    }

                    $resultado = $conexion->query($query);
                    while($row = $resultado->fetch_assoc()){

                        $existePokemon = true;
                ?>

                    <tr class="text-center">
                        <td><?php echo $row['id']; ?></td>
                        <td><?php echo $row['nombre']; ?></td>
                        <td><?php echo $row['tipo']; ?></td>
                        <td><img height="150px" src="data:image/jpg;base64,<?php echo base64_encode($row['imagen']); ?>"/></td>
                        <td><a href="editar_pokemon.php?id=<?php echo $row['id']; ?>">Editar</a></td>
                        <td><a href="eliminar_pokemon.php?id=<?php echo $row['id']; ?>">Eliminar</a></td>
                    </tr>

                <?php
                    }

                    if(!$existePokemon){
                        echo "<font color=\"red\"> Pokemon no encontrado. </font>";
                        $query = "SELECT * FROM pokemon";

                        $resultado = $conexion->query($query);
                        while($row = $resultado->fetch_assoc()){
                    
                ?>

                    <tr class="text-center">
                        <td><?php echo $row['id']; ?></td>
                        <td><?php echo $row['nombre']; ?></td>
                        <td><?php echo $row['tipo']; ?></td>
                        <td><img height="150px" src="data:image/jpg;base64,<?php echo base64_encode($row['imagen']); ?>"/></td>
                        <td><a href="editar_pokemon.php?id=<?php echo $row['id']; ?>">Editar</a></td>
                        <td><a href="eliminar_pokemon.php?id=<?php echo $row['id']; ?>">Eliminar</a></td>
                    </tr>
                
                <?php
                        }
                    }
                ?>
            </tbody>
        </table>
    </div>

    <!-- LLAMAMOS A JQUERY Y LUEGO A JS -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
</body>
</html>