<?php
session_start(); 

if (!isset($_SESSION['user_data'])) {
    header("Location: login.php");
    exit;
}

$user = $_SESSION['user_data'];
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BloodCare</title>
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
                <li class="nav-item"><a class="nav-link" href="infoDonantes.php">Información para donantes</a></li>
                <li class="nav-item"><a class="nav-link" href="aboutus.php">Sobre nosotros</a></li>
            </ul>
        </div>
        <ul class="navbar-nav">
            <?php if (isset($_SESSION['user_data'])): ?>
                <li class="nav-item"><span class="nav-link">Bienvenido, <?php echo $user['nombre_completo']; ?></span></li>
                <li class="nav-item"><a class="nav-link" href="perfilUsuario.php">Ver Perfil</a></li>
                <li class="nav-item"><a class="nav-link" href="closeSession.php">Cerrar Sesión</a></li>
            <?php else: ?>
                <li class="nav-item"><a class="nav-link" href="register.php">Registrarse</a></li>
                <li class="nav-item"><a class="nav-link" href="login.php">Iniciar Sesión</a></li>
            <?php endif; ?>
        </ul>
    </nav>
</div>

<main class="container my-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card profile-card">
                <div class="card-body">
                    <h1 class="text-center">Información personal</h1>
                    <form method="POST" action="actualizarInfoUsuarioHelper.php">
                        <div class="form-group">
                            <label for="nombreCompleto">Nombre Completo:</label>
                            <input type="text" class="form-control" id="nombreCompleto" name="nombrecompleto" value="<?php echo $user['nombre_completo']; ?>" required>
                        </div>
                        <div class="form-group">
                            <label for="cedula">Cédula:</label>
                            <input type="text" class="form-control" id="cedula" name="cedula" value="<?php echo $user['cedula']; ?>" readonly>
                        </div>
                        <div class="form-group">
                            <label for="tipoSangre">Tipo de sangre:</label>
                            <input type="text" class="form-control" id="tipoSangre" name="tipoSangre" value="<?php echo $user['tipo_sangre']; ?>" readonly>
                        </div>
                        <div class="form-group">
                            <label for="provincia">Provincia:</label>
                            <input type="text" class="form-control" id="provincia" name="provincia" value="<?php echo $user['provincia']; ?>" required>
                        </div>
                        <div class="form-group">
                            <label for="canton">Cantón:</label>
                            <input type="text" class="form-control" id="canton" name="canton" value="<?php echo $user['canton']; ?>" required>
                        </div>
                        <div class="form-group">
                            <label for="distrito">Distrito:</label>
                            <input type="text" class="form-control" id="distrito" name="distrito" value="<?php echo $user['distrito']; ?>" required>
                        </div>
                        <div class="form-group">
                            <label for="direccionDetallada">Dirección Detallada:</label>
                            <input type="text" class="form-control" id="direccionDetallada" name="direccion_detallada" value="<?php echo $user['direccion_detallada']; ?>" required>
                        </div>
                        <div class="form-group">
                            <label for="correoElectronico">Correo Electrónico:</label>
                            <input type="email" class="form-control" id="correoElectronico" name="correo_electronico" value="<?php echo $user['correo_electronico']; ?>" required>
                        </div>
                        <button type="submit" class="btn btn-primary">Actualizar información personal</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card profile-card">
                <div class="card-body">
                    <h2 class="text-center">Actualizar Contraseña</h2>
                    <form method="POST" action="actualizarContraseñaHelper.php">
                        <div class="form-group">
                            <label for="passwordActual">Contraseña Actual:</label>
                            <input type="password" class="form-control" id="passwordActual" name="passwordActual" required>
                        </div>
                        <div class="form-group">
                            <label for="passwordNueva">Nueva Contraseña:</label>
                            <input type="password" class="form-control" id="passwordNueva" name="passwordNueva" required>
                        </div>
                        <div class="form-group">
                            <label for="passwordConfirm">Confirmar Nueva Contraseña:</label>
                            <input type="password" class="form-control" id="passwordConfirm" name="passwordConfirm" required>
                        </div>
                        <button type="submit" class="btn btn-primary">Actualizar Contraseña</button>
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
                <a href="admindashboard.php" class="text-white">Administrar Clínica</a>
                <br>
                <a href="contact.php" class="text-white">Contáctanos</a>
            </div>
        </div>
    </div>
</div>
</body>
</html>