<?php
    session_start(); // Iniciar sesión para acceder a las variables de sesión

    include 'conexionBD.php';

    // Verificar si 'id_cita' está definido y si el usuario está autenticado
    if (isset($_POST['id_cita'])) {
        if (isset($_SESSION['user_data']) && isset($_SESSION['user_data']['id_usuario'])) {
            $id_cita = $_POST['id_cita'];
            $id_usuario = $_SESSION['user_data']['id_usuario']; // Obtener el ID del usuario de la sesión

            $query = $conexion->prepare("CALL AgendarCitaUsuario(?, ?)");
            $query->bind_param("ii", $id_cita, $id_usuario);

            if ($query->execute()) {
                //header("Location: home.php");
                echo "<script>
                        alert('¡Cita agendada exitosamente!');
                        window.location.href = 'home.php';
                      </script>";
                exit();
            } else {
                echo "Error al agendar la cita: " . $conexion->error;
            }

            $query->close();
        } else {
            echo "Error: Usuario no autenticado.";
        }
    } else {
        echo "Error: No se proporcionó el ID de la cita.";
    }

    $conexion->close();
?>