<?php
    session_start();
    include 'conexionBD.php';


    if (!isset($_SESSION['user_data'])) {
        header("Location: login.php");
        exit();
    }
    
    $user_data = $_SESSION['user_data'];
    
    if ($user_data['administrador'] != 1) {
        header("Location: register_admin.php");
        exit();
    }
    $query = "SELECT * FROM VistaControlCitas";
    $result = $conexion->query($query);
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
                    <li class="nav-item"><a class="nav-link" href="adminVistasCitas.php">Vistas Citas</a></li>
                    <li class="nav-item"><a class="nav-link" href="adminConfiguracion.php">Configuración</a></li>
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

    <div class="container mt-4">
        <?php if ($result->num_rows > 0): ?>
            <h2 class="mb-4">Control de Citas</h2>
            <table class="table table-bordered table-striped">
                <thead class="thead-dark">
                    <tr>
                        <th>ID Cita</th>
                        <th>Fecha</th>
                        <th>Hora</th>
                        <th>Usuario</th>
                        <th>Email</th>
                        <th>Estado</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while ($row = $result->fetch_assoc()): ?>
                        <tr>
                            <td><?php echo $row['id_cita']; ?></td>
                            <td><?php echo $row['fecha_cita']; ?></td>
                            <td><?php echo $row['hora_cita']; ?></td>
                            <td><?php echo $row['nombre_completo']; ?></td>
                            <td><?php echo $row['correo_electronico']; ?></td>
                            <td><?php echo $row['estado_cita']; ?></td>
                        </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
        <?php else: ?>
            <p>No hay citas registradas.</p>
        <?php endif; ?>       
    </div>
    
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
                        <a href="admindashboard.php" class="text-white">Iniciar como administrador</a>
                        <br>
                        <a href="contact.php" class="text-white">Contáctanos</a>
                    </div>
                </div>
            </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js@4.4.3/dist/chart.umd.min.js"></script>
    <script src="citasAgendadas.js"></script>
    <script src="flujoSangre.js"></script>
</body>
</html>
<?php
    $conexion->close();
?>