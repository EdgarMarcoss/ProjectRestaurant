<?php

    require_once '../model/reserva.php';  
    $id_mesa = $_POST['mesa'];    
    Reserva::eliminarReserva($id_mesa);   
 
    echo"<script>window.location.href = '../view/sala.php' </script>";


