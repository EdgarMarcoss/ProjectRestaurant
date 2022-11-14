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
    <script src="https://code.jquery.com/jquery-3.6.1.slim.min.js" integrity="sha256-w8CvhFs7iHNVUtnSP0YKEg00p9Ih13rlL9zGqvLdePA=" crossorigin="anonymous"></script>
    <script src="../js/carga.js"></script>
    <title>Sala</title>
</head>
<body class="img-back">
    <div class="loader-page"></div>
    <nav>
        <h3><?php echo $_POST['nsala'] ?></h3>
    </nav>
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
    <?php
    include '../model/usuario.php';                      
    $listaUsuarios=Usuario::getTipoUsuario($_SESSION['user']);
    if (isset($_POST['submit'])){
        if ($_POST['estado'] == 'ocupado') { 
        
        if ($listaUsuarios[0]['personal_usuario']=='camarero'){?>        
            <div id="libre" class="modalmask">
                <div class="contenido modalbox">
                <a href="" title="Close" class="close">X</a>
                    <h2 class="login-text"><span>Finalizar Reserva</span></h2>                    
                        
                    <form action="../controller/eliminarreserva.php" method="post" class="form-res" onsubmit="return valid()">
                        <input type="hidden" name="mesa" value="<?php echo $_POST['id_mobi'] ?>" id="id_mesa">
                        <div class="reservar">                     
                        
                            <select name="motivo" id="final-reserva">
                                <option value="finalizar" default>Finalizar</option>
                                
                            </select>                        
                       
                            <!-- <p id="mensaje2"></p> -->
                        </div>

                        <input type="submit"  id="submit" class="btn-login" value="Enviar" >
                    </form>
                </div>
            </div>
            <?php  
        }
    } else if ($_POST['estado'] == 'mantenimiento') { 

        if ($listaUsuarios[0]['personal_usuario']=='mantenimiento'){?>
        <div id="libre" class="modalmask">
        <div class="contenido modalbox">
        <a href="" title="Close" class="close">X</a>
            <h2 class="login-text"><span>Finalizar Incidencia</span></h2>                    
                
            <form action="../controller/eliminarincidencia.php" method="post" class="form-res" onsubmit="return valid()">
                <input type="hidden" name="mesa" value="<?php echo $_POST['id_mobi'] ?>" id="id_mesa">
                <div class="reservar">

                    <select name="motivo" id="final-reserva">
                        <option value="finalizar" default>Finalizar</option>
                       
                    </select>
                  
             
                    <!-- <p id="mensaje2"></p> -->
                </div>

                <input type="submit"  id="submit" class="btn-login" value="Enviar" >
            </form>
        </div>
    </div>
    <?php
    }}else{ 
    
    if ($listaUsuarios[0]['personal_usuario']=='camarero'){?>
        <div id="libre" class="modalmask">
            <div class="contenido modalbox">
            <a href="" title="Close" class="close">X</a>
                <h2 class="login-text"><span>Crear</span></h2>           
                
                    <form action="../controller/crearreserva.php" method="post" onsubmit="return valid()">
                        <input type="hidden" name="mesa" value="<?php echo $_POST['id_mobi'] ?>" id="id_mesa">
                        <div class="reservar">
                        
                            
                                <select name="motivo" id="final-reserva">
                                    <option value="reserva" default>Reserva</option>
                                    <option value="incidencia">Incidencia</option>
                                </select> 
                                <div id="reserva-campo">
                                    <label for="">Nombre Reserva</label><br>
                                    <input type="text" name="reserva">
                                    <br>
                                </div>
                                <div id="incidencia-campo">
                                    <label for="">Motivo Incidencia</label><br>
                                    <input type="text-area" name="incidencia">
                                    <br>
                                </div>
                                <script>
                                    reserva = document.getElementById("reserva-campo");
                                    incidencia = document.getElementById("incidencia-campo");                                    

                                    reserva.innerHTML = '';
                                    incidencia.innerHTML = '';
                                    select = document.getElementById('final-reserva');
                                    reserva.innerHTML = `
                                                <label for="">Nombre Reserva</label><br>
                                                <input type="text" name="reserva">                                                
                                            `;

                                    select.addEventListener("change", () => {
                                        if (document.getElementById('final-reserva').value == 'reserva') {
                                            incidencia.innerHTML = '';                                           
                                            reserva.innerHTML = `
                                                <label for="">Nombre Reserva</label><br>
                                                <input type="text" name="reserva">                                                
                                            `;
                                        } else if (document.getElementById('final-reserva').value == 'incidencia') {
                                            incidencia.innerHTML = `
                                                <label for="">Motivo Incidencia</label><br>
                                                <input type="text-area" name="incidencia">
                                                <br>
                                            `;
                                            reserva.innerHTML = '';  
                                               
                                        }                                      
                                       
                                    });

                                </script>
                                        
                        </div>
                        <input type="submit"  id="submit" class="btn-login" value="Crear" >
                    </form>         
                
            </div>
        </div>
        <?php
    }
     }};?>
</body>
</html>