<?php
include 'conexionBD.php';

$id_clinica = $_POST['id_clinica'];

$query = $conexion->prepare("SELECT id_cita, CONCAT(fecha_cita, ' ', hora_cita) AS fecha_hora FROM tab_citas WHERE id_clinica = ? AND estado_cita = 'CREADA'");
$query->bind_param("i", $id_clinica);
$query->execute();
$result = $query->get_result();

$citas = array();

while ($row = $result->fetch_assoc()) {
    $citas[] = $row;
}

$query->close();
$conexion->close();

echo json_encode($citas);
?>