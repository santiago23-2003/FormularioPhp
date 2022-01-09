<?php 

include_once '../connectdb.php';

$login = $contraseña = "";

$err_login = $err_contraseña = $err_inicio = "";

$contador = 0;

$errorGlobal = false;

try {
    
    if ($_SERVER['REQUEST_METHOD'] == 'POST'){

        // VALIDACION USERNAME

        if (isset($_POST['login'])) {

            if (empty(trim($login =$_POST['nombre']))){
                $err_login = "Por favor ingrese el nombre de usuario";
                $errorGlobal = true;

            } else {
                $consulta_nombre = "SELECT * FROM `registro` WHERE nombre = :nombre";
                $validar_nombre = $conexion -> prepare($consulta_nombre);
                $validar_nombre -> execute(array(":nombre" => $nombre = $_POST['nombre']));

                $uso_nombre = $validar_nombre -> rowCount(); 

                if ($uso_nombre < 1){
                    $err_login = "Este usuario no ha sido registrado";
                    $errorGlobal = true;
                }
            }

            // VALIDACION CONTRASEÑA

            if(empty(trim($contraseña = $_POST['password']))){
                $err_contraseña = "Por favor ingrese la contraseña";
                $errorGlobal = true;
            }  
            
            if ($errorGlobal == false){

                $sql = "SELECT * FROM registro WHERE nombre = :nombre";
    
                $preparar = $conexion -> prepare($sql);
    
                $preparar ->execute(array(":nombre" => $login));
    
                $registro = $preparar -> fetch(PDO::FETCH_ASSOC);
                
                if(!$registro){
                    $err_inicio = "La combinacion de la contraseña y el usuario no coinciden";
                }else
            
                            if (password_verify($contraseña, $registro['contra'])){
                                session_start();
                        
                                $_SESSION["usuario"]=$_POST['nombre'];
                                
                                header("location: ../home/usuariosregistrados.php");
                            } else {
                                    $err_inicio = "Usuario o contraseña incorrectos";
                            }
                                        
                    $preparar -> closeCursor();
                        }
            }
            
        
    

    }
    
} catch (Exception $e) {
    echo "Error : " . $e -> getMessage();
    echo "Error : " . $e -> getLine();   
}

/*if(!empty($_POST)){
        if (isset($_POST['login'])) {
            
            if(empty(trim($login = htmlentities(addslashes($_POST['nombre']))))) {
                $err_login = "Hay espacios en blanco";
                
            } else {
                $consulta = "SELECT * FROM `registro` WHERE nombre = :nombre AND contra = :password";

                $ejecutar = $conexion -> prepare($consulta);

                $ejecutar -> execute(array(":nombre" => $login));

                

                while ($registro = $ejecutar -> fetch(PDO::FETCH_ASSOC)) {
                    if (password_verify($contraseña = $_POST['password'], $registro['contra'])){
                        $contador ++;
                    }
            }
        
            if ($contador > 0) {
                session_start();
                
                $_SESSION["usuario"]=$_POST['nombre'];
                
                header("location: ../home/usuariosregistrados.php");
            } else {
                $err_login = "Usuario o contraseña incorrectos";
            }
            }

            $ejecutar -> closeCursor();
            
        }
    }*/

?>