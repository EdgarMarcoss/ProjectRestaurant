<?php

require_once '../model/reserva.php'; 


if($_POST['ver'] == 'activa'){
    $listaReserva=Reserva::getReservaActual();
}elseif($_POST['ver'] == 'finalizar'){
    $listaReserva=Reserva::getReservaFin();
}

echo json_encode($listaReserva);