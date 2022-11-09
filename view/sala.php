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
    <div class="fondo-mesas">
        <?php 
        require_once '../model/mobiliario.php';
        foreach (Mobiliario::getMobiliario($_SESSION['id_sala']) as $mesa) {
            echo '<form action="./sala.php" method="post">';
            // echo '<a href="#'.$mesa["estado_mobiliario"].'"><img class="'.$mesa["estado_mobiliario"].'" src="../img/mesas/'.$mesa["img_mobiliario"].'"></a>';
            echo '<button type="submit" name="submit"><img class="'.$mesa["estado_mobiliario"].'" src="../img/mesas/'.$mesa["img_mobiliario"].'"></button>';
            echo '<input type="hidden" name="estado" value="'.$mesa["estado_mobiliario"].'">';
            echo '<input type="hidden" name="id_mobi" value="'.$mesa["id"].'">';
            echo "<br>";
            echo '</form>';
        }
        ?>
    </div>
    
    <?php if (isset($_POST['submit'])){
        if ($_POST['estado'] == 'ocupado') { ?>
    <div id="ocupado" class="modalmask">
        <div class="modalbox movedown" id="resultadoContent">
            <a href="#close" title="Close" class="close">X</a>
            <h2 id="tituloResultado">TITULO</h2>
            <div id="contenidoResultado">Finalizar reserva</div>
        </div>
    </div>
    <?php } else { ?>
    <div id="libre" class="modalmask">
        <div class="modalbox movedown" id="resultadoContent">
            <a href="#close" title="Close" class="close">X</a>
            <h2 id="tituloResultado">TITULO</h2>
            <form action="../controller/crearreserva.php" method="post">
                <input type="hidden" name="mesa" value="<?php var_dump(Mobiliario::getMobiliario($_SESSION['id_sala'])[0]["id"]) ?>" id="id_mesa">
                Nombre Reserva <input type="text" name="nombre_reserva">
                <button type="submit" id="contenidoResultado">Reservar</button>
            </form>

        </div>
    </div>
    <?php }};?>
</body>
</html>