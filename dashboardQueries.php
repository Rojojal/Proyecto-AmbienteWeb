<?php
  
  include'clinicaInfoHelper.php';

  if (!isset($_SESSION['user_data'])) {
      header("Location: login.php");
      exit();
  }
  
  $user_data = $_SESSION['user_data'];
  
  if ($user_data['administrador'] != 1) {
      header("Location: register_admin.php");
      exit();
  }

// Consultas SQL de acuedo a los indicadores que definimos

function getTipoSangre($conexion) {
    $data_tipo_sangre = [];
    $query_tipo_sangre = "SELECT tipo_sangre, COUNT(*) as total FROM tab_usuario GROUP BY tipo_sangre";
    
    $result_tipo_sangre = mysqli_query($conexion, $query_tipo_sangre);

    if ($result_tipo_sangre) {
        while ($row = mysqli_fetch_assoc($result_tipo_sangre)) {
            $data_tipo_sangre[] = $row;
        }
    } else {
          echo "Error en la consulta de tipo de sangre: " . mysqli_error($conexion);
    }
    
    return $data_tipo_sangre;
}

function getProvincia($conexion) {
    $data_provincia = [];
    $query_provincia = "SELECT provincia, COUNT(*) as total FROM tab_usuario GROUP BY provincia";
    
    $result_provincia = mysqli_query($conexion, $query_provincia);

    if ($result_provincia) {
        while ($row = mysqli_fetch_assoc($result_provincia)) {
            $data_provincia[] = $row;
        }
    } else {
        echo "Error en la consulta de provincia: " . mysqli_error($conexion);
    }
    
    return $data_provincia;
}

function getClinicas($conexion, $id_clinica) {
    $data_clinicas = [];
    $query_clinicas = "SELECT c.nombre_clinica, c.capacidad, COUNT(a.id_cita) as citas_agendadas 
                       FROM tab_clinica c 
                       LEFT JOIN tab_citas a ON c.id_clinica = a.id_clinica AND a.estado_cita = 'AGENDADA' 
                       WHERE c.id_clinica = ? 
                       GROUP BY c.nombre_clinica";

    $stmt = $conexion->prepare($query_clinicas);
    $stmt->bind_param("i", $id_clinica);
    $stmt->execute();
    $result_clinicas = $stmt->get_result();

    if ($result_clinicas) {
        while ($row = $result_clinicas->fetch_assoc()) {
            $data_clinicas[] = $row;
        }
    } else {
        echo "Error en la consulta de clínicas: " . mysqli_error($conexion);
    }
    
    $stmt->close();
    return $data_clinicas;
}

function getCitasEstado($conexion, $id_clinica) {
    $data_citas_estado = [];
    $query_citas_estado = "SELECT estado_cita, COUNT(*) as total FROM tab_citas WHERE id_clinica = ? GROUP BY estado_cita";

    $stmt = $conexion->prepare($query_citas_estado);
    $stmt->bind_param("i", $id_clinica);
    $stmt->execute();
    $result_citas_estado = $stmt->get_result();

    if ($result_citas_estado) {
        while ($row = $result_citas_estado->fetch_assoc()) {
            $data_citas_estado[] = $row;
        }
    } else {
        echo "Error en la consulta de estados de citas: " . mysqli_error($conexion);
    }
    
    $stmt->close();
    return $data_citas_estado;
}

function getCitasPorMes($conexion, $id_clinica) {
    $data_citas_mes = [];
    $query_citas_mes = "SELECT DATE_FORMAT(fecha_cita, '%Y-%m') as mes, COUNT(*) as total 
                        FROM tab_citas 
                        WHERE id_clinica = ? 
                        GROUP BY mes 
                        ORDER BY mes";

    $stmt = $conexion->prepare($query_citas_mes);
    $stmt->bind_param("i", $id_clinica);
    $stmt->execute();
    $result_citas_mes = $stmt->get_result();

    if ($result_citas_mes) {
        while ($row = $result_citas_mes->fetch_assoc()) {
            $data_citas_mes[] = $row;
        }
    } else {
        echo "Error en la consulta de citas por mes: " . mysqli_error($conexion);
    }
    
    $stmt->close();
    return $data_citas_mes;
}


$data_tipo_sangre = getTipoSangre($conexion);
$data_provincia = getProvincia($conexion);
$clinicas_data = getClinicas($conexion, $clinica_data['id_clinica']);
$citas_estado_data = getCitasEstado($conexion, $clinica_data['id_clinica']);
$citas_mes_data = getCitasPorMes($conexion, $clinica_data['id_clinica']);
?>
