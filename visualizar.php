<?php
include 'conexion.php';
$con = conexion();
session_start();

$sql="SELECT id_r FROM usuarios_r";
$resultado=pg_query($con, $sql);
        if($_SESSION['c'] == 12){
           // echo"eres admin";
//header("location: visualizar.php");
        }
        else{
       header("location: add.php"); 
        }
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <link rel="stylesheet" href="assets/estyle.css">
  <title>Document</title>
</head>
<body>
  <nav class="navbar navbar-expand-sm bg-dark navbar-dark">
  <div class="container-fluid">
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link active" href="crear.php">Ingreso de datos</a>
      </li>
    </ul>
  </div>
</nav>
<div class="container mt-3">
  <h2>visualizar</h2>
              
  <table class="table table-hover">
    <thead>
      <tr>
      <th>id</th>
          <th>correo</th>
          <th>contraseña</th>
          <th>nombre</th>
          <th>edad</th>
          <th>informacion</th>
          <th>foto</th>
          <!-- <th>actualizar</th> -->
          <th>eliminar</th>
    </tr>
    </thead>
    
    <?php
    $sql = "SELECT * FROM usuarios_r"; //Consulta a mi tabla
    $obj = pg_query($con, $sql); //Objeto que guarda mi conexion
    $i = 0;
 
    $correo=$_SESSION['c'];
    
    while($fila = pg_fetch_array($obj)){
    $i++;
    ?>
    
    <tr>
      <td><?=$fila[0]?></td>
      <td><?=$fila[1]?></td>
      <td><?=$fila[2]?></td>
      <td><?=$fila[3]?></td>
      <td><?=$fila[4]?></td>
      <td><?=$fila[5]?></td>
      <td ><img src="<?=$fila[6]?>" alt="" heigh="100" width="100"></td>
     <!-- <td><a href="actualizar2.php? t=<?=$fila[0]?>">Actualizar</a></td> -->
      <td><a href="delete.php? t=<?=$fila[0]?>">eliminar</a></td>
    </tr>
    <?php
    }

?>
  <table class="table table-hover">
    <thead>
      <tr>

      <th>ID</th>
          <th>emisor</th>
          <th>receptor</th>
          <th>estado</th>
          <!-- <th>actualizar</th> -->
          <th>eliminar</th>

    </tr>
    </thead>
    
    <?php
     $sql = "SELECT * FROM soli"; //Consulta a mi tabla
     $obj = pg_query($con, $sql); //Objeto que guarda mi conexion
     $i = 0;
    
     while($fila = pg_fetch_array($obj)){
     $i++;
    ?>
    
    <tr>
      <td><?=$fila[0]?></td>
      <td><?=$fila[1]?></td>
      <td><?=$fila[2]?></td>
      <td><?=$fila[3]?></td>
     <!-- // <td><a href="actualizar.php? t=<?=$fila[0]?>">Actualizar</a></td> -->
      <td><a href="delete.php? t=<?=$fila[0]?>">eliminar</a></td>
    </tr>
    <?php
    }

?>
  <table class="table table-hover">
    <thead>
      <tr>

      <th>ID</th>
          <th>amigo1</th>
          <th>amigo2</th>
          <th>eliminar</th>

    </tr>
    </thead>
    
    <?php
     $sql = "SELECT * FROM amigos"; //Consulta a mi tabla
     $obj = pg_query($con, $sql); //Objeto que guarda mi conexion
     $i = 0;
    
     while($fila = pg_fetch_array($obj)){
     $i++;
    ?>
    
    <tr>
      <td><?=$fila[0]?></td>
      <td><?=$fila[1]?></td>
      <td><?=$fila[2]?></td>
      <!-- <td><a href="actualizar.php? t=<?=$fila[0]?>">Actualizar</a></td> -->
      <td><a href="delete.php? t=<?=$fila[0]?>">eliminar</a></td>
    </tr>
    <?php
    }

?>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
