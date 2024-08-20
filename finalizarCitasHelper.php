<?php
session_start();
require 'conexionBD.php';
require 'clinicaInfoHelper.php'; // Incluye el archivo para obtener la información de la clínica

if (!isset($_SESSION['user_data'])) {
    header("Location: login.php");
    exit();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id_cita = $_POST['id_cita'];
    $cantidad_sangre = $_POST['cantidad_sangre'];

    // Usamos la información de la clínica obtenida por clinicaInfoHelper.php
    $admin_clinica_id = isset($clinica_data['id_clinica']) ? $clinica_data['id_clinica'] : null;

    if ($admin_clinica_id === null) {
        header("Location: admindashboard.php?error=clinica_no_encontrada");
        exit();
    }

    try {
        $stmt = $conexion->prepare("CALL FinalizarCitas(?, ?, ?)");
        $stmt->bind_param("idi", $id_cita, $cantidad_sangre, $admin_clinica_id);
        $stmt->execute();

        // Obtener el resultado del procedimiento almacenado
        $result = $conexion->query("SELECT @resultado AS resultado");
        $row = $result->fetch_assoc();

        if ($row && $row['resultado']) {
            // Error reportado por el procedimiento almacenado
            throw new Exception($row['resultado']);
        }

        header("Location: admindashboard.php?success=1");
    } catch (Exception $e) {
        $error_message = $e->getMessage();
        switch ($error_message) {
            case 'La cita no existe.':
                $redirect_url = 'admindashboard.php?error=cita_no_existe';
                break;
            case 'La cita ya está finalizada o no está en estado AGENDADA.':
                $redirect_url = 'admindashboard.php?error=cita_finalizada';
                break;
            case 'No tiene permiso para finalizar esta cita.':
                $redirect_url = 'admindashboard.php?error=permiso_denegado';
                break;
            default:
                $redirect_url = 'admindashboard.php?error=error_general';
                break;
        }
        header("Location: $redirect_url");
    } finally {
        if (isset($stmt)) {
            $stmt->close();
        }
        $conexion->close();
    }
} else {
    echo "<p>Solicitud inválida.</p>";
}
?>