<?php
session_start();
   
require_once '../model/incidencia.php';

$correo=$_SESSION['user'];
$id_mesa = $_GET['id_mesa']; 
$motivo_incidencia = $_GET['motivo_incidencia'];


Incidencia::crearIncidencia($correo,$motivo_incidencia, $id_mesa);

echo"<script>window.location.href = '../view/sala.php' </script>"; 

