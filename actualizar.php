<?php
include 'conexion.php';
$con = conexion();

$id = $_GET["t"];
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

<?php
session_start();
$id=$_SESSION['c'];

$sql = "SELECT nombre, edad, f_p FROM usuarios_r WHERE id_r = '$id'";
$obj = pg_query ($con, $sql);
$fila = pg_fetch_array ($obj); 


// $correo = $fila[0];
$nombre = $fila[0];
$edad = $fila[1];
$targetfile= $fila[2];
?>


    <div>
        <h1 class="titulo2">actualizar datos de tu cuenta</h1>
    </div>

    <main class="formularios">
        <form action="act.php? t=" method="post">
            <div class="mb-3 mt-3">
                <label for="email" class="form-label">Nombre de usuario:</label>
                <input type="text" class="form-control" id="nombre" placeholder="Ingresa tu usuario" name="nombre" value="<?=$nombre?>">
            </div>

            
            <div class="mb-3">
                <label for="edad" class="form-label">edad:</label>
                <input type="number" class="form-control" id="edad" placeholder="Enter password" name="edad"value="<?=$edad?>">
            </div>

            <!--imagen-->
      <div class="mb-3">
                <label for="imagen" class="form-label">imagen suya:</label>
                <input type="file" class="form-control" id="f_p" placeholder="ingresa tu imagen" name="f_p" value="<?=$targetfile?>">
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