<?php

//Recogemos la contraseña de login.php y la encriptamos en sha256 para que en nuestra base de datos reconozca
try{
    $pass = $_POST['pass'];
    $pass = hash('sha256', $pass);

    //Llamamos la conexión de la base de datos
    require_once '../model/conexion.php';
    //verificamos si el usuario no lleva ningun caracter raro, que podría ocasionar a un SQL INJECTION
    $user=mysqli_real_escape_string($conexion,$_POST['mail']);

    // selecionamos en la base de datos los datos introducidos arriba para comprobar si existen
    $sql = "select * from tbl_usuarios where email_usuario='$user' and password_usuario='$pass'";
    $resultado = mysqli_query($conexion,$sql);
    //$resul=$resultado->fetch_all(MYSQLI_ASSOC);
    $num=mysqli_num_rows($resultado);
    mysqli_free_result($resultado);

    //Si existen creamos la session, si no enviamos a login.php 
    if ($num==1){
        session_start();
        echo "<script>location.href='../view/restaurante.php'</script>";
    }else{
        echo "<script>location.href='../index.php'</script>";
    }

}catch(Exception $e){
    echo "<script>location.href='../index.php'</script>";
}