<?php
    session_start();
    include 'conexionBD.php';
    include 'clinicaInfoHelper.php';

    if (!isset($_SESSION['user_data'])) {
        header("Location: login.php");
        exit();
    }

    $user_data = $_SESSION['user_data'];

    if ($user_data['administrador'] != 1) {
        header("Location: register_admin.php");
        exit();
    }

    // Obtener el ID de la clínica
    if (isset($clinica_data['id_clinica'])) {
        $clinica_id = $clinica_data['id_clinica'];

        // Obtener citas por clínica
        $stmt = $conexion->prepare("CALL ObtenerCitasPorClinica(?)");
        $stmt->bind_param("i", $clinica_id);
        $stmt->execute();
        $resultCitas = $stmt->get_result();
        $stmt->close();

        // Obtener citas finalizadas por clínica
        $stmt = $conexion->prepare("CALL ObtenerCitasFinalizadasPorClinica(?)");
        $stmt->bind_param("i", $clinica_id);
        $stmt->execute();
        $resultCitasFinalizadas = $stmt->get_result();
        $stmt->close();
    } else {
        echo "Error: No se ha encontrado información de la clínica.";
        exit();
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Admin Dashboard</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="styles_dashboard.css">
</head>
<body>

    <div id="header">
        <nav class="navbar navbar-expand-lg navbar-light bg-custom">
            <a class="navbar-brand" href="home.php">
                <img src="logo1.jpeg" alt="BloodCare Logo" style="height: 40px;">
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-center" id="navbarNav">
                <ul class="navbar-nav mx-auto">
                    <li class="nav-item"><a class="nav-link" href="admindashboard.php">Dashboard general</a></li>
                    <li class="nav-item"><a class="nav-link" href="adminCitas.php">Gestion de citas</a></li>
                    <li class="nav-item"><a class="nav-link" href="adminControlCitas.php">Control de citas</a></li>
                    <li class="nav-item"><a class="nav-link" href="home.php">Salir</a></li>
                </ul>
            </div>
            <ul class="navbar-nav">
                <?php if (isset($_SESSION['user_data'])): ?>
                <?php $user = $_SESSION['user_data'];?>
                    <li class="nav-item"><span class="nav-link">Bienvenido, <?php echo $user['nombre_completo']; ?></span></li>
                    <li class="nav-item"><a class="nav-link" href="closeSession.php">Cerrar Sesión</a></li>
                <?php else: ?>
                    <li class="nav-item"><a class="nav-link register .nav-link register Background Color" href="register.php">Registrarse</a></li>
                    <li class="nav-item"><a class="nav-link login .nav-link login Background Color" href="login.php">Iniciar Sesión</a></li>
                <?php endif; ?>
            </ul>
        </nav>
    </div>

    <main>
        <div class="container mt-4">
            <!-- Sección de citas pendientes -->
            <?php if ($resultCitas->num_rows > 0): ?>
                <h2 class="mb-4">Control de Citas Pendientes</h2>
                <table class="table table-bordered table-striped">
                    <thead class="thead-dark">
                        <tr>
                            <th>ID Cita</th>
                            <th>ID Usuario</th>
                            <th>Nombre Usuario</th>
                            <th>Nombre Clínica</th>
                            <th>Fecha</th>
                            <th>Hora</th>
                            <th>Estado</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php while ($row = $resultCitas->fetch_assoc()): ?>
                            <tr>
                                <td><?php echo $row['id_cita']; ?></td>
                                <td><?php echo $row['id_usuario']; ?></td>
                                <td><?php echo $row['nombre_usuario']; ?></td>
                                <td><?php echo $row['nombre_clinica']; ?></td>
                                <td><?php echo $row['fecha_cita']; ?></td>
                                <td><?php echo $row['hora_cita']; ?></td>
                                <td><?php echo $row['estado_cita']; ?></td>
                            </tr>
                        <?php endwhile; ?>
                    </tbody>
                </table>
            <?php else: ?>
                <p>No hay citas registradas.</p>
            <?php endif; ?>       
        </div>

        <br>
        <br>
        <br>
        <br>

        <!-- Formulario para finalizar citas -->
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card profile-card">
                    <div class="card-body">
                        <h2 class="text-center">Finalizar cita</h2>
                            <form action="finalizarCitasHelper.php" method="POST">
                                <div class="form-group">
                                    <label for="id_clinica">ID de la cita:</label>
                                    <input type="number" class="form-control" id="id_cita" name="id_cita" required>
                                </div>
                                <div class="form-group">
                                    <label for="litros_obtenidos">Mililitros de Sangre Obtenidos:</label>
                                    <input type="number" step="0.1" class="form-control" id="cantidad_sangre" name="cantidad_sangre" required>
                                </div>
                                <button type="submit" class="btn btn-primary">Finalizar Cita</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

        <br>
        <br>
        <br>
        <br>

        <!-- Sección de citas finalizadas -->
        <div class="container mt-4">
            <?php if ($resultCitasFinalizadas->num_rows > 0): ?>
                <h2 class="mb-4">Control de Citas Finalizadas</h2>
                <table class="table table-bordered table-striped">
                    <thead class="thead-dark">
                        <tr>
                            <th>ID Cita</th>
                            <th>ID Usuario</th>
                            <th>Nombre Usuario</th>
                            <th>Nombre Clínica</th>
                            <th>Fecha</th>
                            <th>Hora</th>
                            <th>Cantidad de sangre recolectada</th>
                            <th>Estado</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php while ($row = $resultCitasFinalizadas->fetch_assoc()): ?>
                            <tr>
                                <td><?php echo $row['id_cita']; ?></td>
                                <td><?php echo $row['id_usuario']; ?></td>
                                <td><?php echo $row['nombre_usuario']; ?></td>
                                <td><?php echo $row['nombre_clinica']; ?></td>
                                <td><?php echo $row['fecha_cita']; ?></td>
                                <td><?php echo $row['hora_cita']; ?></td>
                                <td><?php echo $row['cantidad_sangre']; ?></td>
                                <td><?php echo $row['estado_cita']; ?></td>
                            </tr>
                        <?php endwhile; ?>
                    </tbody>
                </table>
            <?php else: ?>
                <p>No hay citas finalizadas registradas.</p>
            <?php endif; ?>       
        </div>
    </main>

    <div id="footer" class="footer bg-dark text-white">
            <div class="container">
                <div class="row">
                    <div class="col-md-4">
                        <p>2024 | Derechos reservados</p>
                        <p>San Pedro, San José</p>
                    </div>
                    <div class="col-md-4">
                        <img src="logo1.jpeg" alt="BloodCare Logo" style="height: 40px;">
                    </div>
                    <div class="col-md-4">
                        <a href="home.php" class="text-white">Volver</a>
                        <br>
                        <a href="contact.php" class="text-white">Contáctanos</a>
                    </div>
                </div>
            </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>