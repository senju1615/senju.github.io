<?php
include 'conexion.php';
$con = conexion();


session_start();
$correo=$_SESSION['c'];
$receptor = $_GET["t"];
$estado = $_POST["estado"];
$estado = ("activo");

//consulta a bd
$sql = "INSERT INTO soli(entrega,recibe, estado) VALUES('$correo',$receptor,'$estado')";

pg_query($con, $sql );
header("location: add.php");
?>
