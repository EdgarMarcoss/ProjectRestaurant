<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<body>
    <?php
if(isset($_POST["button"])){
    if(isset($_POST["correo"]) && isset($_POST["psw"])){
        require_once "./model/conexion.php";
        $correo=$conexion->real_escape_string(strip_tags($_POST["correo"]));
        $password=$conexion->real_escape_string(strip_tags(sha1($_POST["psw"])));
        $comprobar= "SELECT * FROM tbl_login WHERE `correo` = '{$correo}' AND `password` = '{$password}';";
        $cons = mysqli_query($conexion,$comprobar);
        $cons_fin=mysqli_fetch_array($cons);
        $num = mysqli_num_rows($cons);
        if($num==1){
            session_start();
            $_SESSION["nombre_user"]=$cons_fin['nombre'];
            ?>
             <?php
    }
}
    

}else{
    echo "<script>window.location.href='login.php'</script>";
}

?>