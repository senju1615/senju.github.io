<?php
include 'conexion.php';
$con = conexion();

session_start();
$id=$_SESSION['c'];
$amigo2 = $_GET["t"];

//consulta de solicitudes.php

$sql ="INSERT INTO amigos (amigo1, amigo2) VALUES($id,$amigo2)";

$sql1 ="DELETE FROM soli WHERE entrega = $amigo2 AND recibe = $id";

pg_query($con, $sql) && pg_query($con, $sql1);
header("location: solicitudes.php");
?>
