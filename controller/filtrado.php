<?php

require_once '../model/reserva.php';
session_start();


if(isset($_POST['id'])){
    $id = $_POST['id'];
}else{
    $id = '';
}

if(isset($_POST['fecha_res'])){
    $fecha_res = $_POST['fecha_res'];
}else{
    $fecha_res = '';
}

if(isset($_POST['fecha_des'])){
    $fecha_des = $_POST['fecha_des'];
}else{
    $fecha_des = '';
}
if(isset($_POST['nombre_reserva'])){
    $nombre_reserva = $_POST['nombre_reserva'];
}else{
    $nombre_reserva = '';
}
if(isset($_POST['sala'])){
    $sala = $_POST['sala'];
}else{
    $fecha_res = '';
}
if(isset($_POST['mesa'])){
    $mesa = $_POST['mesa'];
}else{
    $mesa = '';
}
if(isset($_POST['camarero'])){
    $camarero = $_POST['camarero'];
}else{
    $camarero = '';
}





if(!$_SESSION['tabla']){
    $listaReserva=Reserva::getReservaActual($id,$fecha_res,$fecha_des,$nombre_reserva,$sala,$mesa,$camarero);
}elseif($_SESSION['tabla'] == 'finalizar'){
    $listaReserva=Reserva::getReservaFin($id,$fecha_res,$fecha_des,$nombre_reserva,$sala,$mesa,$camarero);
}elseif($_SESSION['tabla'] == 'activa'){
    $listaReserva=Reserva::getReservaActual($id,$fecha_res,$fecha_des,$nombre_reserva,$sala,$mesa,$camarero);

}


echo json_encode($listaReserva);