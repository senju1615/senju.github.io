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
        <!-- Esta es la barra de navegacion (Navbar)-->
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
//session_start();
$id= $_SESSION['c']; 

  //  $sql = "SELECT  f_p, nombre,id_r FROM usuarios_r WHERE id_r != $id AND id_r != 12"; //Consulta a mi tabla
    
  $sql = "SELECT f_p, nombre, informacion, b.id_r
  FROM usuarios_r b
  WHERE b.id_r NOT IN (
      SELECT amigo1 FROM amigos WHERE amigo2 = $id
      UNION
      SELECT amigo2 FROM amigos WHERE amigo1 = $id
  )
  AND b.id_r != $id AND b.id_r != 12"; //Consulta a mi tabla

    $obj = pg_query($con, $sql); //Objeto que guarda mi conexion
    $i = 0;
  
    while($fila = pg_fetch_array($obj)){
    $i++;
    ?>
   
    <td class="ims"><img class="im" src="<?=$fila[0]?>" alt="imagen"></td>
    <td class="us"><?=$fila[1]?></td>
    <td class="info"><?=$fila[2]?></td>
    <td class="f"><a href="agregar.php? t=<?=$fila[3]?>"><img class="ff" src="follow.png" alt="" width="50"></a></td>
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