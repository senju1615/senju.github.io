<?php
include 'conexion.php';
$con = conexion();

session_start();
$id=$_SESSION['c'];
$id_c= $_GET["t"];

$sql = "INSERT INTO participantes_c (id_c, id_r) VALUES($id_c,$id)";

pg_query($con, $sql );
 header("location: chat.php");
?>
