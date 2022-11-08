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
    <link rel="stylesheet" href="../css/styles.css">
    <script src="../js/estilos.js"></script>
    <title>Restaurante</title>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="navbar-nav">
        <a class="nav-link bg-light" aria-current="page" href="../controller/logout.php">Logout</a>         
    </div>
  </nav>
    <div class="background">
        <div class="contenido restaurante">
            <!-- <div class="recuadro"> -->
                <!-- Mostrar todos los sitios/salas -->
                <div class="tipo">
                    <div class="salas terraza">
                        <div class="blur">
                            <h3>Terraza 1</h3>
                            <!-- Mostrar las mesas disponibles -->
                            <div class="info-salas">
                                <p>Mesas disponibles: 0</p>
                            </div>
                        </div>
                    </div>

                    <div class="salas terraza">
                        <div class="blur">
                            <h3>Terraza 2</h3>
                            <!-- Mostrar las mesas disponibles -->
                            <div class="info-salas">
                                <p>Mesas disponibles: 0</p>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="tipo">
                    <div class="salas comedor">
                        <div class="blur">
                            <h3>Comedor 1</h3>
                            <!-- Mostrar las mesas disponibles -->
                            <div class="info-salas">
                                <p>Mesas disponibles: 0</p>
                            </div>
                        </div>
                    </div>
                    <div class="salas comedor">
                        <div class="blur">
                            <h3>Comedor 2</h3>
                            <!-- Mostrar las mesas disponibles -->
                            <div class="info-salas">
                                <p>Mesas disponibles: 0</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="tipo">
                    <div class="salas privada">
                        <div class="blur">
                            <h3>Privado 1</h3>
                            <!-- Mostrar las mesas disponibles -->
                            <div class="info-salas">
                                <p>Mesas totales: 5</p>
                                <p>Mesas disponibles: 0</p>
                            </div>
                        </div>
                    </div>

                    <div class="salas privada">
                        <div class="blur">
                            <h3>Privado 2</h3>
                            <!-- Mostrar las mesas disponibles -->
                            <div class="info-salas">
                                <p>Mesas disponibles: 0</p>
                            </div>
                        </div>
                    </div>
                </div>
                

                

                

                   
            <!-- </div> -->
        </div>

        <div class="color-back ">
            <div class="modal">
                
            </div>
        </div>
    </div>
</body>
</html>