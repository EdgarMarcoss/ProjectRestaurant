<?php

   
require_once '../model/reserva.php';
$id_usuario=$_GET['id_usuario'];
$id_sala=$_GET['id_sala'];
$id_mesa = $_POST['mesa']; 

Reserva::crearReserva($id_usuario, $id_sala, $id_mesa);

echo"<script>window.location.href = '../view/vista.php' </script>";

