<?php

   
require_once '../model/reserva.php';
$id_usuario=$_SESSION['user'];
$id_sala=$_SESSION['sala'];
$id_mesa = $_POST['mesa']; 
$nombre_reserva = $_POST['nombre_reserva'];

Reserva::crearReserva($nombre_reserva, $id_usuario, $id_sala, $id_mesa);

echo"<script>window.location.href = '../view/sala.php' </script>";

