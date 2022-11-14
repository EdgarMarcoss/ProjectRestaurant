<?php
session_start();
   
require_once '../model/reserva.php';
if($_POST['motivo']=='incidencia'){
    echo"<script>location.href = 'crearincidencia.php?id_mesa={$_POST['mesa']}&motivo_incidencia={$_POST['incidencia']};' </script>";

}else{
$correo=$_SESSION['user'];
$id_mesa = $_POST['mesa']; 
$nombre_reserva = $_POST['reserva'];

Reserva::crearReserva($correo,$nombre_reserva, $id_mesa);

echo"<script>window.location.href = '../view/sala.php' </script>";
}

