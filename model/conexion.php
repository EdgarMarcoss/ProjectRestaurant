<?php
require_once "config.php";
$server = SERVER;
$username = USERNAME;
$password = PASSWORD;
$bd = BD;
// Nos conectamos a la base de datos mediante la funcion mysqli_connect
$conexion = mysqli_connect($server,$username,$password,$bd);

if (mysqli_connect_error()) {
    // echo "<script>location.href='../pages/login.php?log=2'</script>";
    echo "<script>alert('conexion erronea')</script>";
    exit();
}
