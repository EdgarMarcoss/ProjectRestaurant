<?php

$salas=$_POST['sala'];

include '../model/mobiliario.php';

$listaMobiliario=Mobiliario::getMobiliario($salas);

echo json_encode($listaMobiliario);