<?php
session_start();
if(!isset($_SESSION["nombre_user"])){
    echo "<script>window.location.href='index.php'</script>";
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>
    <title>Restaurante</title>
    
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light">     
    <div class="navbar-nav">
        <a class="nav-link bg-light" aria-current="page" href="logout.php">Log out</a>
          
    </div>
  </nav>
  
  <div class="hero"> 
<?php
    $nombre=$_SESSION["nombre_user"];
    echo "<div class='hero__title'>Bienvenido a nuestro restaurante$nombre!</div>"
?>
  <div class="cube"></div>
  <div class="cube"></div>
  <div class="cube"></div>
  <div class="cube"></div>
  <div class="cube"></div>
  <div class="cube"></div>
</div>
</body>
</body>
</html>