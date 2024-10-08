<?php
    session_start();
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
                <?php $user = $_SESSION['user_data'];?>
                    <li class="nav-item"><span class="nav-link">Bienvenido, <?php echo $user['nombre_completo']; ?></span></li>
                    <li class="nav-item"><a class="nav-link" href="perfilUsuario.php">Ver Perfil</a></li>
                    <li class="nav-item"><a class="nav-link" href="closeSession.php">Cerrar Sesión</a></li>
                <?php else: ?>
                    <li class="nav-item"><a class="nav-link register .nav-link register Background Color" href="register.php">Registrarse</a></li>
                    <li class="nav-item"><a class="nav-link login .nav-link login Background Color" href="login.php">Iniciar Sesión</a></li>
                <?php endif; ?>
            </ul>
        </nav>
    </div>

    <main class="container">
        <section class="text-center my-5">
            <h2>¿Por qué es importante donar sangre?</h2>
            <p>La sangre es necesaria para la atención de pacientes en emergencias, cirugías, tratamientos crónicos,
                etc. Diariamente se necesita mucha sangre para que los pacientes puedan sobrevivir y recuperarse.</p>
        </section>

        <div class="row text-center my-5">
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <h3 class="card-title">¿Qué debo saber antes de donar?</h3>
                        <p class="card-text">Antes de donar sangre, asegúrate de estar sano, bien hidratado y haber
                            comido adecuadamente. Debes cumplir con los requisitos de edad y peso, y no estar tomando
                            ciertos medicamentos.</p>
                        <a href="infoDonantes.php" class="btn btn-primary">Más Información</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <h3 class="card-title">¿Deseas una cita para donar?</h3>
                        <p class="card-text">Te brindamos una gran red de clínicas donde puedes acercarte a donar
                            sangre, gracias a la asociación de las mismas, si deseas agendar hazlo ya mismo</p>
                        <a href="date.php" class="btn btn-primary">Agenda tu cita</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <h3 class="card-title">¿Deseas administrar una clínica?</h3>
                        <p class="card-text">Si eres administrador de un centro de donación o clínica y deseas que haya
                            mayor visibilidad y mejor flujo inscribe la clínica en la página, nos dedicamos a
                            administrar y mejorar el flujo de donaciones de sangre a nivel nacional</p>
                        <a href="admindashboard.php" class="btn btn-primary">Más Información</a>
                    </div>
                </div>
            </div>
        </div>

        <section class="text-center my-5">
            <h2>Nuestros resultados en números</h2>
            <div class="row">
                <div class="col-md-4">
                    <div class="result-box">
                        <h3>99%</h3>
                        <p>Satisfacción del usuario</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="result-box">
                        <h3>+2300</h3>
                        <p>Activos donantes en la página</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="result-box">
                        <h3>180%</h3>
                        <p>Cantidad de sangre</p>
                    </div>
                </div>
            </div>
        </section>
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

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>

</html>