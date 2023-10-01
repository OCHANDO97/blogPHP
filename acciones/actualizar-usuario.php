<?php   
if (isset($_POST)) {
    // conexion a la BD 
    require_once '../includes/conexion.php';
    // recorger los valores del formulario de ctualizacion

    // mysqli_real_escape_string permite recibir g'd en una cadena
    $nombre = isset($_POST['nombre']) ? mysqli_real_escape_string($db,$_POST['nombre']) : false;
    $apellidos = isset($_POST['apellidos']) ? mysqli_real_escape_string($db,$_POST['apellidos']):false;
    $email = isset($_POST['email']) ? mysqli_real_escape_string($db,trim($_POST['email'])):false;

    $errores = array();
    // validar los datos
    // validar campo nombre
    if (!empty($nombre) && !is_numeric($nombre) && !preg_match('/[0-9]/',$nombre))  {
        $nombre_validado = true;
    }else {
        $nombre_validado = false;
        $errores['nombre'] = 'El nombre no es valido';
    }

    // validad campo apellido
    if (!empty($apellidos) && !is_numeric($apellidos) && !preg_match('/[0-9]/',$apellidos))  {
        $apellidos_validado = true;
    }else {
        $apellidos_validado = false;
        $errores['apellidos'] = 'El apellidos no es valido';
    }

    // validar campo email
    if (!empty($email) && filter_var($email, FILTER_VALIDATE_EMAIL))  {
        $email_validado = true;
    }else {
        $email_validado = false;
        $errores['email'] = 'El email no es valido';
    }

    $guardar_usuario = false;
    if (count($errores) == 0) {
        // actualizamos usuario
        $usuario = $_SESSION['usuario'];
        $guardar_usuario = true;
        
        // comprobar si el email ya existe
        $sql = "SELECT id,email from usuarios WHERE email = '$email' ";
        $isset_email = mysqli_query($db, $sql);
        $isset_user = mysqli_fetch_assoc($isset_email);

        if ($isset_user['id'] == $usuario['id'] || empty($isset_user)) {

            $sql = "UPDATE usuarios set nombre = '$nombre', apellidos = '$apellidos',email = '$email' WHERE id =". $usuario['id'];
            $guardar = mysqli_query($db,$sql);

            if ($guardar) {
                $_SESSION['usuario']['nombre'] = $nombre;
                $_SESSION['usuario']['apellidos'] = $apellidos;
                $_SESSION['usuario']['email'] = $email;
                $_SESSION['completado'] = 'tus datos se ha actualizado con exito';
            } else {
                $_SESSION['errores']['general'] = 'Fallo al actualizar tus datos';
            }

        }else {
            $_SESSION['errores']['general'] = 'el usuario ya existe';
        }

    } else {
        $_SESSION['errores'] = $errores;
    }

}

header('location: ../mis-datos.php');