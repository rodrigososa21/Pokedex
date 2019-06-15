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
        include_once 'conexion.php';

        $id = $_REQUEST['id'];

        $query = "SELECT * FROM pokemon WHERE id = '$id'";
        $resultado = $conexion->query($query);
        $row = $resultado->fetch_assoc();
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
            </div>
        </nav>

    <a href="index_logueado.php" class="btn btn-inverse"><i class="fa fa-backward"></i> Volver</a>
    <div class="card card-body bg-light mt-5">
        <h2>Eliminar Pokemon</h2>
        <form action="proceso_eliminar_pokemon.php?id=<?php echo $row['id']; ?>" method="POST" enctype="multipart/form-data">
            <div class="form-group">
                <label for="nombre">Nombre: </label>
                <input type="text" name="nombre" class="form-control form-control-lg" value="<?php echo $row['nombre']; ?>">
            </div>
            <div class="form-group">
                <label for="tipo">Tipo: </label>
                <input type="text" name="tipo" class="form-control form-control-lg" value="<?php echo $row['tipo']; ?>">
            </div>
            <div class="form-group">
                <label for="imagen">Imagen: </label>
                <input type="file" name="imagen" class="form-control form-control-lg">
                <img height="150px" src="data:image/jpg;base64,<?php echo base64_encode($row['imagen']); ?>"/>
            </div>
            <input type="submit" class="btn btn-success" value="Eliminar">
        </form>
    </div>
    </div>

    <!-- LLAMAMOS A JQUERY Y LUEGO A JS -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
</body>
</html>