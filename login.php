<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BloodCare - Iniciar Sesión</title>
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
                <h2 class="text-center">¡Inicia Sesión en BloodCare!</h2>
                <form method="POST" action="loginhelper.php">
                    <div class="form-group">
                        <label for="email">Correo electrónico</label>
                        <input type="email" class="form-control" id="email" placeholder="Ingresa correo electrónico" name="email" required>
                    </div>
                    <div class="form-group">
                        <label for="password">Contraseña</label>
                        <input type="password" class="form-control" id="password" placeholder="Ingresa contraseña" name="password" required>
                    </div>
                    <div class="form-check">
                        <input type="checkbox" class="form-check-input" id="remember-me">
                        <label class="form-check-label" for="remember-me">Mantener sesión iniciada</label>
                    </div>
                    <button type="submit" class="btn btn-primary btn-block my-4">Iniciar Sesión</button>
                    <p class="text-center">¿No tienes cuenta? <a href="register.php">Regístrate aquí</a></p>
                </form>
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
</body>
</html>