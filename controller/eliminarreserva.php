<?php

    require_once '../model/reserva.php';  
    $id_mesa = $_POST['mesa'];

    if($_POST['motivo']=='finalizar'){
        Reserva::eliminarReserva($id_mesa);  
    }

   
    die;
    echo"<script>window.location.href = '../view/sala.php' </script>";


