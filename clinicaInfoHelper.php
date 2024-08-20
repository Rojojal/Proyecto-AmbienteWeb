<?php
    include 'conexionBD.php';

    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }

    if (!isset($_SESSION['user_data'])) {
        header("Location: login.php");
        exit();
    }

    $user_data = $_SESSION['user_data'];
    $id_admin_clinica = $user_data['id_usuario'];

    $stmt = $conexion->prepare("CALL ObtenerClinicaPorAdmin(?)");
    $stmt->bind_param("i", $id_admin_clinica);

    if ($stmt->execute()) {
        $result = $stmt->get_result();
        if ($result->num_rows > 0) {
            $clinica_data = $result->fetch_assoc();
        } else {
            echo "No se encontraron datos de la clínica.";
            exit();
        }
    } else {
        echo "Error al ejecutar la consulta.";
        exit();
    }

    $stmt->close();
    //$conexion->close();
?>