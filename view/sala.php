<?php
session_start();
// echo $_SESSION['id_sala'];
require_once '../model/mobiliario.php';
$ruta = "../img/mesas/";
foreach (Mobiliario:: getMobiliario($_SESSION['id_sala']) as $mesa) {
    echo '<img src="'.$ruta.$mesa["img_mobiliario"].'">';
    echo "<br>";
}
