<?php

$user = "root";
$pass = "";
$db = "testbd";

$conn = mysqli_connect("localhost", $user, $pass, $db) or die("");

if(!$conn){
    echo "Conexion fallida";
}