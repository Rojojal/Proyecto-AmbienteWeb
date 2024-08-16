<?php
     session_start();
    
    include 'conexionBD.php';

    $correo_electronico = $_POST['email'];
    $contraseña_ingresada = $_POST['password'];

    $stmt = $conexion->prepare("CALL LoginUsuario(?, @contraseña_guardada)");
    $stmt->bind_param("s", $correo_electronico);
    $stmt->execute();

    $result = $conexion->query("SELECT @contraseña_guardada AS contraseña_guardada")->fetch_assoc();
    $contraseña_guardada = $result['contraseña_guardada'];

    if (strpos($contraseña_guardada, 'Error:') === 0) {
        echo $contraseña_guardada; 
    } elseif (password_verify($contraseña_ingresada, $contraseña_guardada)) {
        $stmt = $conexion->prepare("CALL ObtenerUsuarioPorEmail(?)");
        $stmt->bind_param("s", $correo_electronico);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            $user_data = $result->fetch_assoc();
            $_SESSION['user_data'] = $user_data;

            header("Location: home.php");
            exit();
        } else {
            echo "Error: No se encontraron los datos del usuario.";
        }
    } else {
        echo "Error: Contraseña o email incorrectos.";
    }

    $stmt->close();
    $conexion->close();
?>
