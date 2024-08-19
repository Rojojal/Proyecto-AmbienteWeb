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
<?php include 'mostrarCitasPerfil.php'; ?>
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


<!-- Sección de la próxima cita -->
<div class="col-md-8 mx-auto mt-5"> 
    <div class="card">
        <div class="card-body">
            <h2 class="text-center">Próximas Citas</h2>
            <p><strong>Fecha:</strong> <?php echo $cita_proxima['fecha']; ?></p>
            <p><strong>Hora:</strong> <?php echo $cita_proxima['hora']; ?></p>
            <p><strong>Lugar:</strong> <?php echo $cita_proxima['lugar']; ?></p>
            <p><strong>Descripción:</strong> <?php echo $cita_proxima['descripcion']; ?></p>
        </div>
    </div>
</div>


   
<!-- Contenido principal -->
<main class="container my-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card profile-card">
                    <div class="card-body">
                        <h1 class="text-center">Tu perfil</h1>
                        <form method="POST" action="actualizarUsuarioHelper.php">
                            <input type="hidden" name="id_usuario" value="<?php echo $user_data['id_usuario']; ?>">
                            <div class="form-group">
                                <label for="nombreCompleto">Nombre Completo:</label>
                                <input type="text" class="form-control" id="nombreCompleto" name="nombre_completo" value="<?php echo $user_data['nombre_completo']; ?>" required>
                            </div>
                            <div class="form-group">
                                <label for="cedula">Cédula:</label>
                                <input type="text" class="form-control" id="cedula" name="cedula" value="<?php echo $user_data['cedula']; ?>" required>
                            </div>
                            <div class="form-group">
                                <label for="tipoSangre">Tipo de Sangre:</label>
                                <input type="text" class="form-control" id="tipoSangre" name="tipo_sangre" value="<?php echo $user_data['tipo_sangre']; ?>" required>
                            </div>
                            <div class="form-group">
                                <label for="provincia">Provincia:</label>
                                <input type="text" class="form-control" id="provincia" name="provincia" value="<?php echo $user_data['provincia']; ?>" required>
                            </div>
                            <div class="form-group">
                                <label for="canton">Cantón:</label>
                                <input type="text" class="form-control" id="canton" name="canton" value="<?php echo $user_data['canton']; ?>" required>
                            </div>
                            <div class="form-group">
                                <label for="distrito">Distrito:</label>
                                <input type="text" class="form-control" id="distrito" name="distrito" value="<?php echo $user_data['distrito']; ?>" required>
                            </div>
                            <div class="form-group">
                                <label for="direccionDetallada">Dirección Detallada:</label>
                                <input type="text" class="form-control" id="direccionDetallada" name="direccion_detallada" value="<?php echo $user_data['direccion_detallada']; ?>" required>
                            </div>
                            <div class="form-group">
                                <label for="correoElectronico">Correo Electrónico:</label>
                                <input type="email" class="form-control" id="correoElectronico" name="correo_electronico" value="<?php echo $user_data['correo_electronico']; ?>" required>
                            </div>
                            <button type="submit" class="btn btn-primary">Actualizar</button>
                        </form>
                    </div>
                </div>
            </div>
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