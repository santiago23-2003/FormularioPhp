<?php 

$err_login = $err_contraseña = $err_inicio = "";

$login = $contraseña = "";

$contador = 0;

include_once '../connectdb.php';

try {

    if (isset($_POST['login'])){

        if (empty($login = $_POST['nombre']) && empty($contraseña = $_POST['password'])) {
            $err_login = "Este campo no puede estar vacio";
            $err_contraseña = "Este campo no puede estar vacio";
        }  else {
            $sql = "SELECT * FROM registro WHERE nombre = :nombre";
            $query = $conexion -> prepare($sql);
            $query -> execute(array(":nombre" => $login));

            while ($registro = $query -> fetch(PDO::FETCH_ASSOC)) {
                if (password_verify($contraseña, PASSWORD_DEFAULT)){
                    $contador++;
                }
            } 
            
            if ($contador > 0){
                session_start();
    
                $_SESSION["usuario"]=$login;
    
                header("Location:../home/usuariosregistrados.php");
            } else {
                $err_inicio = "Usuario o contraseña incorrectos";
            }
        }

        

    }
    
} catch (Exception $e) {
    echo "Error :" . $e -> getMessage();
}

?>