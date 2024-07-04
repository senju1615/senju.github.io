<?php
include 'conexion.php';
$con = conexion();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="shortcut icon" href="http://localhost/proyecto%20Citas//img/heart_icon-icons.com_54429.svg"
        type="image/x-icon">
    <link rel="stylesheet" href="assets/estilos.css">
    <title>Outzone/Create</title>

</head>

<body>
    <div>
        <h1 class="titulo2">Seleciona tus gustos</h1>
    </div>

    <main class="formularios">
        <form action="Insertar.php" method="post" enctype="multipart/form-data">
            <div class="mb-3 mt-3">
                <label for="email" class="form-label">Nombre de usuario:</label>
                <input type="text" class="form-control" id="nombre" placeholder="Ingresa tu usuario" name="nombre">
            </div>
            <div class="mb-3 mt-3">
                <label for="email" class="form-label">Gmail:</label>
                <input type="email" class="form-control" id="correo" placeholder="Enter email" name="correo">
            </div>
            <div class="mb-3">
                <label for="pwd" class="form-label">contraseña:</label>
                <input type="password" class="form-control" id="contraseña" placeholder="Enter password" name="contraseña">
            </div>
            <div class="mb-3">
                <label for="edad" class="form-label">edad:</label>
                <input type="password" class="form-control" id="edad" placeholder="Enter password" name="edad">
            </div>

            <!--imagen-->
            <div class="mb-3">
                <label for="imagen" class="form-label">imagen suya:</label>
                <input type="file" class="form-control" id="f_p" placeholder="ingresa tu imagen" name="f_p">
            </div>
            
            <button type="submit" class="btn btn-primary">enviar</button>
            
                <button type="button" class="btn btn-primary">cancelar</button>
        </form>
    </main>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
</body>

</html>