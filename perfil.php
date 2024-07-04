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

            <a class="nav-link" aria-current="page" href="add.php">Inicio</a>

            <a class="nav-link" href="mensajes.php">Mensajes</a>

            <a class="nav-link" href="solicitudes.php">Solicitudes</a>

            <a class="nav-link" href="amigos.php">amigos</a>

            <a class="nav-link" href="perfil.php">perfil</a>

            <a class="gea " class="nav-link" href="actualizar.php? t="><img src="gear.webp" alt="" width="50" ></a>
        </nav>
    </header>

    <table class="table-warning">
    <thead>
    </thead>
    <?php
   // session_start();
    $correo=$_SESSION['c'];
    $sql = "SELECT  f_p, nombre,edad FROM usuarios_r WHERE id_r=$correo"; //Consulta a mi tabla
    $obj = pg_query($con, $sql); //Objeto que guarda mi conexion
    $i = 0;

    while($fila = pg_fetch_array($obj)){
    $i++;
    ?>
    <tr> 
    <td class="imss"><img class="imsg" src="<?=$fila[0]?>" alt="imagen"></td>
    <td><h1 class="us"><?=$fila[1]?></h1></td>
    <td><h1 class="u"><?=$fila[2]?> years</h1></td>
    <!--<td><a href="actualizar.php? t=<?=$fila[0]?>">Actualizar</a></td>-->
     
    </tr>
    <?php
    }
?>
    <table class="table-warning">
    <thead>
    </thead>
    <?php
   // session_start();
    $correo=$_SESSION['c'];
    $sql = "SELECT  informacion FROM usuarios_r WHERE id_r=$correo"; //Consulta a mi tabla
    $obj = pg_query($con, $sql); //Objeto que guarda mi conexion
    $i = 0;

    while($fila = pg_fetch_array($obj)){
    $i++;
    ?>
    <tr> 
    <td><h1 class="info"><?=$fila[0]?></h1></td>
    <!--<td><a href="actualizar.php? t=<?=$fila[0]?>">Actualizar</a></td>-->
     
    </tr>
    <?php
    }
?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>

    </body>

</html>