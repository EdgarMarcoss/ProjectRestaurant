<?php

    require_once '../model/incidencia.php';  
    $id_mesa = $_POST['mesa'];  

    Incidencia::eliminarIncidencia($id_mesa);
    echo"<script>window.location.href = '../view/sala.php'</script>";
