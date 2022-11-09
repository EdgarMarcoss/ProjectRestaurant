<?php
session_start();
$_SESSION['id_sala'] = $_POST['sala'];

require_once '../model/mobiliario.php';
foreach (Mobiliario:: getMobiliario($_SESSION['id_sala']) as $mesa) {
    echo '<img src="../img/mesas/'.$mesa["img_mobiliario"].'">';
    echo "<br>";
}

