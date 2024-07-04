<!--enviar a usuarios-->
<?php
include 'conexion.php';
$con = conexion();

$correo = $_POST["correo"];
$contra = $_POST["contraseña"];
$nombre = $_POST["nombre"];
$edad = $_POST["edad"];
$informacion = $_POST["informacion"];
//imagen//
$imgp = $_POST["f_p"];
$rutaimg = "img/".$imgN;

$targetDir = "img/";
$targetFile = $targetDir . basename($_FILES["f_p"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($targetFile,PATHINFO_EXTENSION));


// Verifica si el archivo es una imagen real o un archivo falso
if(isset($_POST["submit"])) {
    $check = getimagesize($_FILES["f_p"]["tmp_name"]);
    if($check !== false) {
        echo "El archivo es una imagen - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        echo "El archivo no es una imagen.";
        $uploadOk = 0;
    }
}

// Verifica si ya existe el archivo
if (file_exists($targetFile)) {
    echo "Lo siento, el archivo ya existe.";
    $uploadOk = 0;
}

// Verifica el tamaño del archivo
if ($_FILES["f_p"]["size"] > 500000) {
    echo "Lo siento, el archivo es demasiado grande.";
    $uploadOk = 0;
}

// Permitir solo ciertos formatos de archivo
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
    echo "Lo siento, solo se permiten archivos JPG, JPEG, PNG & GIF.";
    $uploadOk = 0;
}

// Verifica si $uploadOk está configurado en 0 por algún error
if ($uploadOk == 0) {
    echo "Lo siento, tu archivo no fue subido.";
// Si todo está bien, intenta subir el archivo
} else {
    if (move_uploaded_file($_FILES["f_p"]["tmp_name"], $targetFile)) {
        echo "El archivo ". basename( $_FILES["f_p"]["name"]). " ha sido subido correctamente.";
    } else {
        echo "Lo siento, hubo un error al subir tu archivo.";
    }
}

echo"$imgN";

$sql = "INSERT INTO usuarios_r ( correo, contraseña, nombre, edad,informacion, f_p) VAlUES ('$correo','$contra','$nombre','$edad','$informacion','$targetFile')";

pg_query($con, $sql);
header("location: login.html");
?>