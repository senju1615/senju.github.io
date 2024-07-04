<?php
include 'conexion.php';
$con = conexion();
session_start();

$sql="SELECT id_r FROM usuarios_r";
$resultado=pg_query($con, $sql);
        if($_SESSION['c'] == 12){
            echo"eres admin";
header("location: visualizar.php");
        }
        else{
     //  header("location: add.php"); 
        }
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
    <title>Outzone</title>
    <link rel="stylesheet" href="assets/estyle.css">
</head>
<body> 
<header>
    <nav>
            <a class="nav-link active" href="add.php"><img src="img/bdly.jpg" class="imagen2" alt=""></a>

           <a class="nav-link active" aria-current="page" href="amigos.php"><img class="gea" src="chevron-right.svg" alt=""> </a>

        </nav>

    </header>
        
 <?php
$id = $_SESSION['c']; // Obtener el ID del usuario actual desde la sesión

$sql = "SELECT a.mensaje, a.envio_msj
        FROM mensajes AS a
        INNER JOIN conversacion AS b ON a.id_r = b.id_c
        WHERE b.id_r != $id OR b.id_c = $id AND NOT b.id_r = $id";

    $obj = pg_query($con, $sql); //Objeto que guarda mi conexion
    $i = 0;
  
    while($fila = pg_fetch_array($obj)){
    $i++;
    ?>
    <tr>
    <p class="msjj"><?=$fila[0]?></p>
    </tr>
    <?php
    }

?> 
<?php
$id = $_SESSION['c']; // Obtener el ID del usuario actual desde la sesión

$sql = "SELECT a.mensaje, a.envio_msj
        FROM mensajes AS a
        INNER JOIN conversacion AS b ON a.id_r = b.id_c
        WHERE b.id_r = $id OR b.id_c = $id ";

    $obj = pg_query($con, $sql); //Objeto que guarda mi conexion
    $i = 0;
  
    while($fila = pg_fetch_array($obj)){
    $i++;
    ?>
    <tr>
    <p class="msj"><?=$fila[0]?></p>
    </tr>
    <?php
    }

?> 

<main class="formularios">
<form action="msj.php" method="post">
    <div class="mb-3 mt-3">
        <input type="text" class="form-control" id="mensaje" placeholder="Ecribir mensaje" name="mensaje">
        
    </div>
    <div>
    <button type="submit" class="btn btn-primary">enviar</button>
    </div>
</form>
</main>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>

    </body>

</html>