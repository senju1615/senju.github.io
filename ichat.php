<?php
include 'conexion.php';
$con = conexion();

session_start();
$id=$_SESSION['c'];
$amd2 = $_GET["t"];

$sql = "INSERT INTO conversacion(am1,am2) values($id,$amd2)";

pg_query($con, $sql );
 header("location: mensajes.php");
?>
