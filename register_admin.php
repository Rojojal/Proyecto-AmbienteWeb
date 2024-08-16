<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Regístra tu clínica en BloodCare</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="styles.css">
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
                    <li class="nav-item"><a class="nav-link" href="date.php">Citas</a></li>
                    <li class="nav-item"><a class="nav-link" href="notificaciones.php">Notificaciones</a></li>
                    <li class="nav-item"><a class="nav-link" href="infoDonantes.php">Información para donantes</a></li>
                    <li class="nav-item"><a class="nav-link" href="aboutus.php">Sobre nosotros</a></li>
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


    <main class="container my-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <h1 class="text-center">¡Regístra tu clínica en BloodCare!</h1>
                        <form method="POST" action="registerAdminHelper.php">
                            <input type="hidden" name="id_admin_clinica" value="<?php echo $_SESSION['user_data']['id_usuario']; ?>">
                            <div class="form-group">
                                <label for="fullName">Nombre: <?php echo $user['nombre_completo']; ?></label> 
                            </div>
                            <div class="form-group">
                                <label for="id">Cédula: <?php echo $user['cedula']; ?></label>
                            </div>
                            <div class="form-group">
                                <label for="province">Dirección personal:</label>
                            </div>
                            <div class="form-group">
                                <label for="province"><?php echo $user['provincia']; ?> <?php echo $user['canton']; ?> <?php echo $user['distrito']; ?></label>
                            </div>
                            <div class="form-group">
                                <label>Información de la clínica</label>
                            </div>
                            <div class="form-group">
                                <label for="address">Nombre de la clínica</label>
                                <input type="text" class="form-control" id="nombre_clinica" name="nombre_clinica" placeholder="Ingresa el nombre de la clínica" required>
                            </div>
                            <div class="form-group">
                                <label for="address">Capacidad de almacenamiento en Litros</label>
                                <input type="text" class="form-control" id="cantidad_litros" name="cantidad_litros" placeholder="Ingresa la capacidad de la clínica" required>
                            </div>
                            <div class="form-group">
                                <label for="address">Dirección de la clínica</label>
                                <input type="text" class="form-control" id="direccion_clinica" name="direccion_clinica" placeholder="Ingresa la dirección de la clínica" required>
                            </div>
                            <div class="form-group">
                                <label for="address">Número de teléfono</label>
                                <input type="text" class="form-control" id="numero_clinica" name="numero_clinica" placeholder="Ingresa el número de teléfono" required>
                            </div>
                            <div class="form-group">
                                <label for="address">Correo electrónico de la clínica</label>
                                <input type="text" class="form-control" id="correo_clinica" name="correo_clinica" placeholder="Ingresa el correo electrónico de la clínica" required>
                            </div>
                            <div class="form-group">
                                <label for="address">Número de registro de la clínica</label>
                                <input type="text" class="form-control" id="registro_clinica" name="registro_clinica" placeholder="Ingresa el número de registro de la clínica" required>
                            </div>
                            <button type="submit" class="btn btn-primary btn-block">Registrar clínica</button>
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
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script> 
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
</body>
</html>