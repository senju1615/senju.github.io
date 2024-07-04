<?php
include 'conexion.php';
$con = conexion();
// $id = $_GET["t"];

session_start();
$id=$_SESSION['c'];
// $id_s = ($id = $_GET["t"]);

$sql ="DELETE FROM soli WHERE recibe = $id ";

pg_query($con, $sql );
header("location: add.php");
?>