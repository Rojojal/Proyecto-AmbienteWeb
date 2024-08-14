<?php
    include 'conexionBD.php';

    $nombre_completo = $_POST['fullName'];
    $cedula = $_POST['id'];
    $tipo_sangre = $_POST['bloodType'];
    $provincia = $_POST['province'];
    $canton = $_POST['canton'];
    $distrito = $_POST['district'];
    $direccion_detallada = $_POST['address'];
    $correo_electronico = $_POST['email'];
    $contraseña = password_hash($_POST['password'], PASSWORD_DEFAULT);

    $stmt = $conexion->prepare("CALL RegistrarUsuario(?, ?, ?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("sssssssss", $nombre_completo, $cedula, $tipo_sangre, $provincia, $canton, $distrito, $direccion_detallada, $correo_electronico, $contraseña);

    if ($stmt->execute()) {
        header("Location: login.php");
        exit();
    } else {
        echo "Error al registrar el usuario: " . $stmt->error;
    }

    $stmt->close();
    $conexion->close();
?>