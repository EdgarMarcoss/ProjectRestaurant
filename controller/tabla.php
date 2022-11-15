<?php

require_once '../model/reserva.php'; 

session_start();

if($_POST['ver'] == 'activa'){
    $_SESSION['tabla'] = 'activa';
    $listaReserva=Reserva::getReservaActual();
}elseif($_POST['ver'] == 'finalizar'){
    $_SESSION['tabla'] = 'finalizar';
    $listaReserva=Reserva::getReservaFin();
}

echo json_encode($listaReserva);