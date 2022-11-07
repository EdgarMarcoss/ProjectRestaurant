<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- CABEZERA -->
    <link rel="stylesheet" href="css/styles.css">
    <!-- <script src="https://kit.fontawesome.com/661e46e89e.js" crossorigin="anonymous"></script> -->
    <!-- <script src="js/..."></script> -->
    <title>Login</title>
</head>
<body>
    <div class="background">
        <div class="contenido">
            <h2 class="login-text"><span>LOGIN</span></h2>
            <form action="view/restaurante.php" method="post">
                <div>
                    <label for="">Correo</label>
                    <input type="text" name="mail">
                </div>
                <div>
                    <label for="">Contraseña</label>
                    <input type="password" name="pass" required>
                </div>
                <input type="submit" class="btn-login" value="Entrar">
            </form>
        </div>
    </div>
</body>
</html>