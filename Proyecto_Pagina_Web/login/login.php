<?php 

    include_once 'dblogin.php';

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/login.css">
    <link rel="stylesheet" href="../css/normalize.css">
    <!--LINKS DE LAS FUENTES USADAS-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Nunito&display=swap" rel="stylesheet">
    <title>Iniciar sesión</title>
</head>
<body>
    
    <section class="contenedor">

        <form class="registro" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>" method="post">

            <h2>Iniciar Sesión</h2>    

            <div class="avatar">
                <img src="../imagenes/pixlr-bg-result.png" alt="avatar" width="150px" height="150px">
            </div>
            
                <input type="text" name="nombre" placeholder="Ingrese su Nombre de usuario">
                <span class="msg_err"><?php echo $err_login ?></span>
                
                <input type="password" name="password" placeholder="Ingrese su Contraseña">
                <span class="msg_err"><?php echo $err_contraseña ?></span>

                <input class="enviar" type="submit" value="iniciar sesión" name="login">
                <span class="msg_err"><?php echo $err_inicio ?></span>
                
                
                <p> ¿ Aun no tienes cuenta ? <a href="../singup/signup.php">  ! Registrate ¡ </a> </p> 
           
        </form>    
           <div class="imagen"></div>

    </section>

 
</body>
</html>