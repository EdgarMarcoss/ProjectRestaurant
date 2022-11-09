<?PHP
session_start();
if (!isset($_SESSION['user'])) {
    echo "<script>window.location.href='../index.php'</script>";
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php require_once 'cabezera.html'; ?>
    <title>Restaurante</title>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <!-- <div class="navbar-nav"> -->
        <a class="log-out" aria-current="page" href="../controller/logout.php"><i class="fa-solid fa-arrow-right-from-bracket"></i></a>         
    <!-- </div> -->
  </nav>
    <div class="background">
        <div class="contenido restaurante">
            <!-- Mostrar todos los sitios/salas -->
            <?php
            require_once '../model/sala.php';
            foreach (Sala::getSala() as $element) {
                echo '<div class="salas">
                            <div class="blur">
                                <h3>'.str_replace("_", " ", $element["nombre_sala"]).'</h3>
                                <div class="info-salas">
                                    <p>Mesas totales: 5</p>
                                    <p>Mesas disponibles: 0</p>
                                </div>
                            </div>
                        </div>';
            } ?>                
        </div>

        <div class="color-back ">
            <div class="modal">
                
            </div>
        </div>
    </div>
</body>
</html>