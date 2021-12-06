<?php
    $servidor="localhost";
    $nombreBD="testbd";
    $usuario="root";
    $pass="";
    $conexion = new mysqli($servidor,$usuario,$pass,$nombreBD);
    if($conexion->connect_error){
        die("No se pudo realizar la conexion");
    }

?>