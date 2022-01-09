<?php

require_once '../connectdb.php';

try {

    $nombre = $correo = $contra = $confirmacion = "";
    $err_nombre = $err_correo = $err_contra = $err_confirmacion = $registrado = "";
    $errorGlobal = false;

    if($_SERVER["REQUEST_METHOD"] == "POST"){

        if (isset($_POST['registro'])) {

            // VALIDAR QUE EL CAMPO NOMBRE NO ESTA VACIO.

            if (empty(trim($nombre = $_POST['nombre']))) {
                $err_nombre = "Este campo no puede estar vacio";
                $errorGlobal = true;
            } else {

            // CONSULTAR EN LA BBDD QUE EL NOMBRE NO ESTE REGISTRADO    
                
                $consulta_nombre = "SELECT * FROM `registro` WHERE nombre = :nombre";
                $validar_nombre = $conexion -> prepare($consulta_nombre);
                $validar_nombre -> execute(array(":nombre" => $nombre = $_POST['nombre']));

                $uso_nombre = $validar_nombre -> rowCount();

            // AVISAR SI EL NOMBRE ESTA EN USO    

                if ($uso_nombre > 0){
                    $err_nombre = "Este nombre ya esta en uso";
                    $errorGlobal = true;
                }
            }

            // VALIDAR QUE EL CAMPO CORREO NO ESTA VACIO
            if (empty(trim($correo = $_POST['correo']))) {
                $err_correo = "Este campo no puede estar vacio";
                $errorGlobal = true;
            } else {
                // CONSULTAR QUE EN LA BBDD NO ESTA EL CORREO INGRESADO
                $consulta_correo = "SELECT * FROM `registro` WHERE email = :correo";
                $validar_correo = $conexion -> prepare($consulta_correo);
                $validar_correo -> execute(array(':correo' => $correo = $_POST['correo']));

                $uso_correo = $validar_correo -> rowCount();

                // AVISAR SI EL CORREO QUE INGRESO ESTA EN USO
                if(!filter_var($correo, FILTER_VALIDATE_EMAIL)){
                    echo $err_correo = "El correo es incorrecto";
                    $errorGlobal = true;
                } else
                if ($uso_correo > 0){
                    $err_correo = "Este correo ya esta en uso";
                    $errorGlobal = true;
                }
            }

            // VALIDAR QUE EL CAMPO CONTRASEÑA NO ESTA VACIO Y COINCIDAN

            if (empty(trim($contra = $_POST['password']))) {
                $err_contra = "Este campo no puede estar vacio";
                $errorGlobal = true;
            } if (empty(trim($confirmacion = $_POST['confirmacion']))){
                $err_confirmacion = "Este campo no puede estar vacio";
                $errorGlobal = true;
            } if ($contra = $_POST['password'] != $confirmacion = $_POST['confirmacion']){
                $err_confirmacion = "Las contraseñas no coinciden";
                $errorGlobal = true;
            }

            if($errorGlobal == false) {
                $pass_cifrado = password_hash($contra, PASSWORD_DEFAULT);
                // AGREGAR LOS DATOS A LA BBDD
                $sql = "INSERT INTO `registro`(`nombre`, `email`, `contra`) VALUES (:nombre, :correo, :contra)";
                $query = $conexion -> prepare($sql);
                $query -> execute(array(':nombre' => $nombre = $_POST['nombre'], ':correo' => $correo = $_POST['correo'], ':contra' => $pass_cifrado));
                $registrado = "Registro exitoso";
                $enuso = $query -> rowCount();
                $query -> closeCursor();

                if ($enuso > 0){
                    $nombre = "";
                    $correo ="";
                }
            }
        }    
    }
} catch (Exception $e) {
    echo "Error : " . $e -> getMessage(); 
} finally {
    $conexion = null;
}



?>