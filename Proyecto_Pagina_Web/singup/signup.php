<?php 

include_once 'db_signup.php';

?>


<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/sign-up.css">
    <link rel="stylesheet" href="../css/normalize.css">
    <!--LINKS DE LAS FUENTES USADAS-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Nunito&display=swap" rel="stylesheet">
    <title>Registrate</title>
</head>

<body>

    <section class="contenedor">

        <form class="registro" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>" method="POST">

            <h2>Registrate</h2>

            <div class="avatar">
                <img src="../imagenes/pixlr-bg-result.png" alt="avatar" width="150px"
                    height="150px">
            </div>

            <input type="text" name="nombre" placeholder="Ingrese su Nombre de usuario" value="<?php echo $nombre ?>">
            <span class="msg_err"> <?php echo $err_nombre ?> </span>

            <input type="email" name="correo" placeholder="Ingrese su correo electronico" value="<?php echo $correo ?>">
            <span class="msg_err"> <?php echo $err_correo ?> </span>

            <input type="password" name="password" placeholder="Ingrese su Contraseña">
            <span class="msg_err"> <?php echo $err_contra ?> </span>

            <input type="password" name="confirmacion" placeholder="Confirme su contraseña">
            <span class="msg_err"> <?php echo $err_confirmacion ?> </span>

            <input class="enviar" type="submit" value="Registrate" name="registro">


            <a href="../login/login.php">
                <p> ¿ Ya tienes cuenta ? </p>
            </a>

            <p class="exito"><?php echo $registrado; ?></p>

        </form>
        <div class="imagen">     
        </div>

    </section>


</body>

</html>