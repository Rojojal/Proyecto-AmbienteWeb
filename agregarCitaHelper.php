<?php
    session_start();

    include 'conexionBD.php';

    if (!isset($_POST['id_clinica']) || !isset($_POST['fecha_cita']) || !isset($_POST['hora_cita'])) {
        die("Datos insuficientes para registrar la cita.");
    }

    $id_clinica = $_POST['id_clinica'];
    $fecha_cita = $_POST['fecha_cita'];
    $hora_cita = $_POST['hora_cita'];

    $fecha_valida = DateTime::createFromFormat('Y-m-d', $fecha_cita);
    $hora_valida = DateTime::createFromFormat('H:i', $hora_cita);

    if (!$fecha_valida || !$hora_valida) {
        die("Formato de fecha o hora no válido.");
    }

    $stmt = $conexion->prepare("CALL AgregarCitaPorAdmin(?, ?, ?)");
    $stmt->bind_param("sss", $id_clinica, $fecha_cita, $hora_cita);

    if ($stmt->execute()) {
        header("Location: admindashboard.php");
        exit();
    } else {
        echo "Error al registrar la cita: " . $stmt->error;
    }

    $stmt->close();
    $conexion->close();
?>