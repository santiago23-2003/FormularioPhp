<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/usuariosregistrados.css">
    <link rel="stylesheet" href="../css/normalize.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Nunito&display=swap" rel="stylesheet">
    <title>Document</title>
</head>
<body>

<section class="principal">

<div class="fondo">
    <video src="../video/fondo.mp4" autoplay muted loop></video>
</div>

<div class="informacion">
    <?php 
        session_start();
        if (!isset($_SESSION["usuario"])) {
            header("Location:../login/login.php");
            
        }

    ?>

    <?php 
        echo "Hola : " . $_SESSION["usuario"] . "<br>";
    ?>

    <a href="cerrarsesion.php">Cerrar sesión</a>
</div>



</section>
    
</body>
</html>