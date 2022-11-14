<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- CABEZERA -->
    <link rel="stylesheet" href="css/styles.css">
    <script src="https://kit.fontawesome.com/661e46e89e.js" crossorigin="anonymous"></script>
    <script src="js/estilos.js"></script>
    <title>Login</title>
</head>
<body class="img-back">
    <div class="background">
        <?php
        if(isset($_GET['error'])){
            if($_GET['error'] == 1){?>
                <div class="error-msg">
                    <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span>
                    <i class="fa fa-times-circle"></i>
                    <strong>Correo o contraseña incorrectos!</strong>
                </div>
            <?php
            }else{?>
                <div class="error-msg">
                    <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span>
                    <i class="fa fa-times-circle"></i>
                    <strong>Algo esta fallando</strong>
                </div>
            <?php
            }
        }?>
    
        <div class="contenido">
            <h2 class="login-text"><span>LOGIN</span></h2>
            <form action="./controller/proc_login.php" method="post" onsubmit="return valid()">
                <div>
                    <label for="">Correo</label>
                    <input id="correo" type="text" name="mail" placeholder="example@gmail.com" onkeyup="validCorreo()">
                    <p id="mensaje1"></p>
                </div>
                <div>
                    <label for="">Contraseña</label>
                    <input id="pass" type="password" onblur="validPass()" name="pass" required >
                    <p id="mensaje2"></p>
                </div>
                <input type="submit"  id="submit" class="btn-login" value="Entrar" >
            </form>
        </div>
    </div>
</body>
</html>

<script src="./js/validacion.js"></script>