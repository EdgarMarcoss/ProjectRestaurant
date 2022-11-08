<?php

   
require_once '../model/reserva.php';
$sala = $_POST['sala']; 
$mobiliario = $_POST['mobiliario']; 

       
Reserva::crearReserva($id_usuario, $id_salas);

echo"<script>window.location.href = '../view/vista.php' </script>";

