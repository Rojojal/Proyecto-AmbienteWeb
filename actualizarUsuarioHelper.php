<?php
    session_start();

    include 'conexionBD.php';

    if (!isset($_POST['id_usuario']) || !isset($_POST['nombre_completo'])  || !isset($_POST['cedula'])  || !isset($_POST['tipo_sangre'])  || !isset($_POST['provincia'])  || !isset($_POST['canton'])  || !isset($_POST['distrito'])  || !isset($_POST['direccion_detallada'])  || !isset($_POST['correo_electronico'])) {
        die("Datos insuficientes para registrar la cita.");
    }

    $id_usuario = $_POST['id_usuario'];
    $nombre_completo = $_POST['nombre_completo'];
    $cedula = $_POST['cedula']; 
    $tipo_sangre = $_POST['tipo_sangre'];
    $provincia = $_POST['provincia'];
    $canton = $_POST['canton'];
    $distrito = $_POST['distrito'];
    $direccion_detallada = $_POST['direccion_detallada'];
    $correo_electronico = $_POST['correo_electronico'];

    $stmt = $conexion->prepare("CALL actualizar_usuario(?, ?, ?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("sssssssss", $id_usuario, $nombre_completo, $cedula, $tipo_sangre, $provincia, $canton, $distrito, $direccion_detallada, $correo_electronico);

    if ($stmt->execute()) {
       
        $stmt = $conexion->prepare("CALL ObtenerUsuarioPorEmail(?)");
        $stmt->bind_param("s", $correo_electronico);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            $user_data = $result->fetch_assoc();
            $_SESSION['user_data'] = $user_data;
        } else {
            echo "Error: No se encontraron los datos del usuario.";
        }

        $stmt->close();
        header("Location: admindashboard.php?updated=1");
        exit();
    } else {
        echo "Error al registrar la cita: " . $stmt->error;
    }

    $stmt->close();
    $conexion->close();
?> 