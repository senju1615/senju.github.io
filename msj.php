<?php
include 'conexion.php';
$con = conexion();

session_start();
$id = $_SESSION['c'];
$msj = $_POST["mensaje"]; // Obtener el mensaje del formulario
$fecha = date('Y-m-d H:i:s'); // Obtener la fecha y hora actual en formato Año-Mes-Día Hora:Minutos:Segundos

// Consulta preparada para insertar datos de manera segura
$sql = "INSERT INTO mensajes (mensaje, envio_msj, id_r) VALUES ($1, $2, $3)";

// Preparar la consulta
$stmt = pg_prepare($con, "", $sql);

// Verificar errores en la preparación de la consulta
if (!$stmt) {
    $error = pg_last_error($con);
    echo "Error al preparar la consulta: " . $error;
    exit;
}

// Ejecutar la consulta con los valores seguros
$result = pg_execute($con, "", array($msj, $fecha, $id));

// Verificar errores en la ejecución de la consulta
if (!$result) {
    $error = pg_last_error($con);
    echo "Error al ejecutar la consulta: " . $error;
    exit;
}

// Si la inserción fue exitosa, redirigir a otra página
header("location: chat.php");
exit;
?>