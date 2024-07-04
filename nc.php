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
    <title>Outzone/login</title>

</head>

<body>
    <div>
        <h1 class="titulox">Agrega un nombre al chat</h1>
    </div>
    <main class="formularios">

        <form action="ichat.php" method="post">
            <div class="mb-3 mt-3">
                <label for="nc" class="form-label">chat:</label>
                <input type="text" class="form-control" id="nombreC" placeholder="nombre del chat" name="nombreC">
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