<?php
    session_start();

    if (!isset($_SESSION['user_data'])) {
        header("Location: login.php");
        exit();
    }
    
    $user_data = $_SESSION['user_data'];
    
    if ($user_data['administrador'] != 1) {
        header("Location: register_admin.php");
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

<?php include 'clinicaInfoHelper.php'; ?>

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

    <div class="container-fluid d-flex flex-column min-vh-100">
    <div class="row flex-fill">
        <!-- Menú izquierdo -->
        <nav id="left-menu" class="col-md-2 d-none d-md-block bg-light">
            <div class="position">
                <h4 class="p-3">BloodCare Dashboard</h4>
                <br>
                <h1>Información de la Clínica</h1>
                <div class="col-md-10">
                    <div class="card">
                        <div class="card-body">
                            <h1 class="text-center">Información de la Clínica</h1>
                            <p><strong>Nombre de la clínica:</strong> <?php echo $clinica_data['nombre_clinica']; ?></p>
                            <p><strong>Capacidad:</strong> <?php echo $clinica_data['capacidad']; ?> L</p>
                            <p><strong>Dirección:</strong> <?php echo $clinica_data['direccion']; ?></p>
                            <p><strong>Número de teléfono:</strong> <?php echo $clinica_data['numero_telefono']; ?></p>
                            <p><strong>Correo de la clínica:</strong> <?php echo $clinica_data['correo_clinica']; ?></p>
                        </div>
                    </div>
                </div>
            </div>
        </nav>

        <!-- Contenido principal -->
        <main class="col-md-8 my-5">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-body">
                            <h1 class="text-center">Agregar cita</h1>
                            <form method="POST" action="agregarCitaHelper.php">
                                <div class="form-group">
                                    <input type="hidden" name="id_clinica" value="<?php echo $clinica_data['id_clinica']; ?>">
                                    <label for="nombreClinicaTitulo">Clínica: </label>
                                    <br>
                                    <label for="nombreClinica" name="nombreClinica"><?php echo $clinica_data['nombre_clinica']; ?></label>
                                </div>
                                <div class="form-group">
                                    <label for="fechaCita">Fecha de la cita: </label>
                                    <input type="date" class="form-control" id="fecha_cita" name="fecha_cita" required>
                                </div>
                                <div class="form-group">
                                    <label for="horaCita">Hora de la cita: </label>
                                    <input type="time" class="form-control" id="hora_cita" name="hora_cita" required>
                                </div>
                                <button type="submit" class="btn btn-primary btn-block">Registrar Cita</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </main>

        
    </div>
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

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js@4.4.3/dist/chart.umd.min.js"></script>
</body>
</html>