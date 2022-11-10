<?php
session_start();
   
require_once '../model/reserva.php';
$correo=$_SESSION['user'];
$id_mesa = $_POST['mesa']; 
$nombre_reserva = $_POST['nombre_reserva'];

Reserva::crearReserva($correo,$nombre_reserva, $id_mesa);

echo"<script>window.location.href = '../view/sala.php' </script>";

