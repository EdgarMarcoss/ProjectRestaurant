<?php
session_start();
if (isset($_POST['sala'])) {
    $_SESSION['id_sala'] = $_POST['sala'];
}
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
    <a href="restaurante.php" class="volver-btn"><i class="fa-solid fa-circle-left"></i></a>
    <div class="fondo-mesas">
        <div class="limites">
        <?php 
        require_once '../model/mobiliario.php';
        foreach (Mobiliario::getMobiliario($_SESSION['id_sala']) as $mesa) {
            echo '<div class="tarjeta">';
            echo '<form action="./sala.php" method="post">';
                // echo '<a href="#'.$mesa["estado_mobiliario"].'"><img class="'.$mesa["estado_mobiliario"].'" src="../img/mesas/'.$mesa["img_mobiliario"].'"></a>';
                echo '<input type="hidden" name="estado" value="'.$mesa["estado_mobiliario"].'">';
                echo '<input type="hidden" name="id_mobi" value="'.$mesa["id"].'">';
                echo '<button type="submit" name="submit" class="img-svg"><img class="'.$mesa["estado_mobiliario"].'" src="../img/mesas/'.$mesa["img_mobiliario"].'"></button>';
                echo "<br>";
            echo '</form>';
            echo '</div>';
        }
        ?>
        </div>

    </div>
    
    <?php if (isset($_POST['submit'])){
        if ($_POST['estado'] == 'ocupado') { ?>
            <div id="libre" class="modalmask">
                <div class="contenido modalbox">
                <a href="" title="Close" class="close">X</a>
                    <h2 class="login-text"><span>Finalizar reserva</span></h2>
                    <form action="../controller/eliminarreserva.php" method="post" class="form-res" onsubmit="return valid()">
                        <input type="hidden" name="mesa" value="<?php echo $_POST['id_mobi'] ?>" id="id_mesa">
                        <div class="reservar">
                        <select name="motivo" id="final-reserva">
                            <option value="finalizar" default>Finalizar</option>
                            <option value="cancelar">Cancelar</option>
                        </select>
                            <!-- <p id="mensaje2"></p> -->
                        </div>

                        <input type="submit"  id="submit" class="btn-login" value="Enviar" >
                    </form>
                </div>
            </div>
    <?php } else { ?>
    <div id="libre" class="modalmask">
        <div class="contenido modalbox">
        <a href="" title="Close" class="close">X</a>
            <h2 class="login-text"><span>Reserva</span></h2>
            <form action="../controller/crearreserva.php" method="post" onsubmit="return valid()">
                <input type="hidden" name="mesa" value="<?php echo $_POST['id_mobi'] ?>" id="id_mesa">
                <div>
                    <label for="">Nombre Reserva</label>
                    <input type="text" name="nombre_reserva">
                    <p id="mensaje2"></p>
                </div>
                <input type="submit"  id="submit" class="btn-login" value="Reservar" >
            </form>
        </div>
    </div>
    <?php }};?>
</body>
</html>