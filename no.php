<?php
include 'conexion.php';
$con = conexion();

session_start();
$id=$_SESSION['c'];
$solicitud = $_GET["t"];

//consulta de solicitudes.php

$sql ="DELETE FROM soli WHERE id_s = $solicitud";

pg_query($con, $sql) && pg_query($con, $sql1);
header("location: solicitudes.php");
?>
