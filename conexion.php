<?php

function conexion(){
    
    $host = "host=localhost";
    //$port = "port=5432";
    $dbname = "dbname=bd_c";
    $user = "user=postgres";
    $password = "password=1234";
    
    $bd= pg_connect("$host $dbname $user $password");
    return $bd;
}

?>