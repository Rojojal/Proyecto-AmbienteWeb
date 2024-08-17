<?php
    include 'conexionBD.php';

    $result = $conexion->query("CALL MostrarCitasAgendadasPorClinica()");

    if ($result) {
        $sections = '';
        $count = 0;

        while ($row = $result->fetch_assoc()) {
            if ($count % 3 == 0) {
                if ($count > 0) {
                    $sections .= '</div>'; // Cerrar la sección anterior
                }
                $sections .= '<div class="container mb-4">'; // Iniciar una nueva sección
            }

            $sections .= '<section class="mb-4 p-3 border border-primary rounded">';
            $sections .= '<h3 class="text-primary">Cita ID: ' . htmlspecialchars($row['id_cita']) . '</h3>';
            $sections .= '<p><strong>Fecha y Hora:</strong> ' . htmlspecialchars($row['fecha_hora']) . '</p>';
            $sections .= '<p><strong>Estado:</strong> ' . htmlspecialchars($row['estado']) . '</p>';
            $sections .= '<p><strong>Clínica:</strong> ' . htmlspecialchars($row['nombre_clinica']) . '</p>';
            $sections .= '<p><strong>Donante:</strong> ' . htmlspecialchars($row['nombre_donante']) . '</p>';
            
            // Campo para ingresar la cantidad de sangre donada
            $sections .= '<div class="form-group">';
            $sections .= '<label for="cantidad_sangre_' . htmlspecialchars($row['id_cita']) . '">Cantidad de Sangre Donada (en ml):</label>';
            $sections .= '<input type="number" class="form-control" id="cantidad_sangre_' . htmlspecialchars($row['id_cita']) . '" name="cantidad_sangre_' . htmlspecialchars($row['id_cita']) . '" min="0" step="10">';
            $sections .= '</div>';
            
            $sections .= '</section>';
            $count++;
        }

        if ($count > 0) {
            $sections .= '</div>'; // Cerrar la última sección
        }

        echo $sections;

        $result->free();
    } else {
        echo "Error al obtener las citas: " . $conexion->error;
    }

    $conexion->close();
?>