<?php
session_start();
$_SESSION['id_sala'] = $_POST['sala'];
include 'cabezera.html';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php 
    require_once '../model/mobiliario.php';
    foreach (Mobiliario:: getMobiliario($_SESSION['id_sala']) as $mesa) {
        echo '<a href="#modal"><img src="../img/mesas/'.$mesa["img_mobiliario"].'""></a>';
        echo "<br>";
    }
    ?>
    <div id="modal" class="modalmask">
        <div class="modalbox movedown" id="resultadoContent">
            <a href="#close" title="Close" class="close">X</a>
            <h2 id="tituloResultado">TITULO</h2>
            <div id="contenidoResultado">contenido resultado</div>
        </div>
    </div>
</body>
<script>
    window.onload = () => {
        alert('hola');
    }
</script>
</html>