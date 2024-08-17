<?php

include('conexionBD.php'); // Incluir el archivo de conexión existente
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Aquí asumiendo que los campos del formulario se llaman 'fecha', 'hora', 'nombre', etc.
    $nombre = $_POST['nombre'];
    $cedula = $_POST['cedula'];
    $correo = $_POST['correo'];
    $telefono = $_POST['telefono'];
    $fecha = $_POST['fecha'];
    $hora = $_POST['hora'];


// Insertar los datos en la base de datos
$sql = "INSERT INTO tab_citas (nombre, cedula, correo, telefono, fecha, hora) VALUES ('$nombre', '$cedula', '$correo', '$telefono', '$fecha', '$hora')";

$stmt = $conn->prepare($sql);
$stmt->bind_param("ssssss", $nombre, $cedula, $correo, $telefono, $fecha, $hora);

if ($stmt->execute()) {
    echo"Cita agendada correctamente";
} else {
    echo"Error al agendar la cita: " . $conn->error;
}

// Cerrar la declaración y la conexión$stmt->close();
$conn->close();
}

?>