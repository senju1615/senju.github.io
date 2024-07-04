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
    <link rel="stylesheet" href="assets/estyle.css">
    <title>Outzone</title>
</head>

<body>

    <header>
    <nav>
            <a class="nav-link active" href="add.php"><img src="img/bdly.jpg" class="imagen2" alt=""></a>

            <a class="nav-link active" aria-current="page" href="add.php">Inicio</a>

            <a class="nav-link" href="mensajes.php">Mensajes</a>

            <a class="nav-link" href="solicitudes.php">Solicitudes</a>

            <a class="nav-link" href="amigos.php">amigos</a>

            <a class="nav-link" href="perfil.php">perfil</a>

        </nav>

    </header>

    <table class="table table-hover">
    <thead>
    </thead>
    <?php
$id= $_SESSION['c'];
    
$sql = "SELECT f_p, nombre, b.id_r, c.id_c
        FROM usuarios_r b
        INNER JOIN conversacion c ON b.id_r IN (c.am1, c.am2)
        WHERE (c.am1 = $id OR c.am2 = $id)
          AND b.id_r != $id";

    $obj = pg_query($con, $sql); //Objeto que guarda mi conexion
    $i = 0;
  
    while($fila = pg_fetch_array($obj)){
    $i++;
    ?>
    <tr>
    <td class="ims"><img class="im" src="<?=$fila[0]?>" alt="imagen"></td>  
    <td class="us"><?=$fila[1]?></td>
       <td class="f"><a href="p_c.php? t=<?=$fila[3]?>"><img class="ff" src="sobre.png" alt="" width="50"></a></td>
       <td class="id"><?=$fila[3]?></td> 
    </tr>
    <?php
    }
?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
</body>

</html>