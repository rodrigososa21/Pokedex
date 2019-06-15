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
    <div class="container">
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark mb-3">
            <a class="navbar-brand" href="index.php">Pokedex</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="login.php">Entrar</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="registro.php">Regístrate</a>
                    </li>
                </ul>
            </div>
        </nav>

    <a href="index.php" class="btn btn-inverse"><i class="fa fa-backward"></i> Volver</a>
    <div class="card card-body bg-light mt-5">
        <h2>Entrar</h2>
        <form action="proceso_login.php" method="POST" enctype="multipart/form-data">
            <div class="form-group">
                <label for="user">Usuario: </label>
                <input type="text" name="user" class="form-control form-control-lg" required autofocus>
            </div>
            <div class="form-group">
                <label for="password">Contraseña: </label>
                <input type="password" name="password" class="form-control form-control-lg" required autofocus>
            </div>
            <input type="submit" class="btn btn-outline-danger" value="Entrar">
        </form>
    </div>
    </div>

    <!-- LLAMAMOS A JQUERY Y LUEGO A JS -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
</body>
</html>