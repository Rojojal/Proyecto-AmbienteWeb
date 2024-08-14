<?php
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
        header("Location: home.php");
        exit();
    } else {
        echo "Error: Contraseña o email incorrectos.";
    }

    $stmt->close();
    $conexion->close();
?>