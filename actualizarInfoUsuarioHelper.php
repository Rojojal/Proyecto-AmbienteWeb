<?php
    session_start();
    include 'conexionBD.php';

    $id_usuario = $_SESSION['user_data']['id_usuario'];
    $nombre_completo = $_POST['nombrecompleto'];
    $provincia = $_POST['provincia'];
    $canton = $_POST['canton'];
    $distrito = $_POST['distrito'];
    $direccion_detallada = $_POST['direccion_detallada'];
    $correo_electronico = $_POST['correo_electronico'];

    $stmt = $conexion->prepare("CALL ActualizarUsuario(?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("issssss", $id_usuario, $nombre_completo, $provincia, $canton, $distrito, $direccion_detallada, $correo_electronico);

    if ($stmt->execute()) {
        $_SESSION['user_data']['nombre_completo'] = $nombre_completo;
        $_SESSION['user_data']['provincia'] = $provincia;
        $_SESSION['user_data']['canton'] = $canton;
        $_SESSION['user_data']['distrito'] = $distrito;
        $_SESSION['user_data']['direccion_detallada'] = $direccion_detallada;
        $_SESSION['user_data']['correo_electronico'] = $correo_electronico;

        $_SESSION['success_message'] = "Información actualizada correctamente.";
        header("Location: home.php");
        exit();
    } else {
        $_SESSION['error_message'] = "Error al actualizar la información.";
        header("Location: profile.php");
        exit();
    }

    $stmt->close();
    $conexion->close();
?>