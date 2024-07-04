 <?php
 require 'conexion.php';
 session_start();
 $con = conexion();
//variables de sesion

 $correo = $_POST["correo"];
 $contra = $_POST["contraseña"];

 //id
$sql="SELECT id_r FROM usuarios_r WHERE correo='$correo' AND contraseña= '$contra'";
$resultado=pg_query($con, $sql);
if($resultado){
    $row = pg_fetch_assoc($resultado);
    if($row){
        $_SESSION["c"]=$row['id_r'];
        if($_SESSION['c'] == 12){
            echo"eres admin";
header("location: visualizar.php");
        }
        else{
            echo"eres usuario";
        header("location: add.php"); 
        }
    }else{
        echo"usuario o contraseña incorrecto";
    }
}else{
    echo"error al ejecutar la consulta";
}
?>