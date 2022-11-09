<?php
session_start();
// echo $_SESSION['id_sala'];
require_once '../model/mobiliario.php';
foreach (Mobiliario:: getMobiliario($_SESSION['id_sala']) as $mesa) {
    echo '<img src="../img/mesas/'.$mesa["img_mobiliario"].'">';
    echo "<br>";
}
