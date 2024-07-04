<?php
include 'conexion.php';
$con = conexion();
session_start();
$id=$_SESSION['c'];
//
// $correo = $_POST["correo"];
$nombre = $_POST["nombre"];
$edad = $_POST["edad"];
//$imgp = $_POST["f_p"];


// id='$id'
$sql = "UPDATE usuarios_r SET  nombre='$nombre', edad='$edad'  WHERE id_r = $id";

pg_query($con, $sql);
//header("location: perfil.php");
?>
