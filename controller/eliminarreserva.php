<?php

         
   

    require_once '../model/reserva.php';  

    $id = $_GET['id'];

    Reserva::eliminarReserva($id);  
    
    echo"<script>window.location.href = '../view/vista.php' </script>";


