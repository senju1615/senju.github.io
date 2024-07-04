<?php
include 'conexion.php';
$con = conexion();
session_start();
$correo=$_SESSION['c'];
$idd = $_GET["t"];


// correo='$correo'
$sql = "DELETE FROM usuarios_r  WHERE id_r = $idd";

pg_query($con, $sql);
//header("location: visualizar.php");
?>
