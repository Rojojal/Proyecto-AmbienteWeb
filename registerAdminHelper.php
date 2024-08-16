<?php
    include 'conexionBD.php';
    session_start();
    $user = $_SESSION['user_data'];

    $id_admin_clinica = $user['id_usuario'];
    $nombre_clinica = $_POST['nombre_clinica'];
    $capacidad = $_POST['cantidad_litros'];
    $direccion = $_POST['direccion_clinica'];
    $numero_telefono = $_POST['numero_clinica'];
    $correo_clinica = $_POST['correo_clinica'];
    $registro_clinica = $_POST['registro_clinica'];

    $stmt = $conexion->prepare("CALL RegistrarClinica(?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("isissss", $id_admin_clinica, $nombre_clinica, $capacidad, $direccion, $numero_telefono, $correo_clinica, $registro_clinica);

    if ($stmt->execute()) {
        session_start();
        session_destroy();
        header("Location: login.php");
        exit();
    } else {
        echo "Error al registrar la clínica: " . $stmt->error;
    }

    $stmt->close();
    $conexion->close();
?>