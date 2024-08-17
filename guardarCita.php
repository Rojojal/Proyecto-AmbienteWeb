<?php

include('conexionBD.php'); 

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    
    $nombre = $_POST['nombre'];
    $cedula = $_POST['cedula'];
    $correo = $_POST['correo'];
    $telefono = $_POST['telefono'];
    $fecha = $_POST['fecha'];
    $hora = $_POST['hora'];


// Insertar los datos en la base de datos
$sql = "INSERT INTO tab_citas (nombre, cedula, correo, telefono, fecha, hora) VALUES (?, ?, ?, ?, ?, ?)";

$stmt = $conexion->prepare($sql);

if (!$stmt) {
    die("Error en la preparación de la consulta: " . $conexion->error);
}

// Bind de parámetros
$stmt->bind_param("ssssss", $nombre, $cedula, $correo, $telefono, $fecha, $hora);

if ($stmt->execute()) {
    echo "Cita agendada correctamente";
} else {
    die("Error al agendar la cita: " . $stmt->error);
}

$stmt->close();
$conexion->close();
}

?>