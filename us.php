<?php
include 'conexion.php';
$con = conexion();
$id = $_GET["t"];

session_start();
$correo=$_SESSION['c'];
$receptor= ($id = $_GET["t"]);
$activo = $_POST["estado"];
$activo = ("activo");

$sql= "INSERT INTO solicitudes (emisor,receptor,estado) VALUES('$nombre', $receptor,'$activo')";

pg_query($con, $sql);
header("location: add.php");
?>
