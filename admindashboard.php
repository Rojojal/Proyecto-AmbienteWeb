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
                    <li class="nav-item"><a class="nav-link" href="date.php">Citas</a></li>
                    <li class="nav-item"><a class="nav-link" href="notificaciones.php">Notificaciones</a></li>
                    <li class="nav-item"><a class="nav-link" href="infoDonantes.php">Información para donantes</a></li>
                    <li class="nav-item"><a class="nav-link" href="aboutus.php">Sobre nosotros</a></li>
                </ul>
            </div>
            <ul class="navbar-nav">
                <?php if (isset($_SESSION['email'])): ?>
                    <li class="nav-item"><span class="nav-link">Bienvenido, <?php echo $_SESSION['email']; ?></span></li>
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
            <!-- Left Menu -->
            <nav id="left-menu" class="col-md-2 d-none d-md-block bg-light">
                <div class="position">
                    <h4 class="p-3">BloodCare Dashboard</h4>
                    <div class="menu-buttons">
                        <button class="btn btn-light" id="btn-dashboard">Dashboard</button>
                        <button class="btn btn-light" id="btn-citas">Citas Agendadas</button>
                        <button class="btn btn-light" id="btn-doctores">Doctores</button>
                        <button class="btn btn-light" id="btn-reportes">Reportes</button>
                        <button class="btn btn-light" id="btn-configuracion">Configuración</button>
                    </div>
                </div>
            </nav>

            <main class="col-md-8 ml-sm-auto col-lg-8 px-4 flex-fill">
                <div id="main-content">
                    <div id="dashboard-form" class="form-container">
                        <h1>Dashboard</h1>
                        <form>
                            <div class="metrics-container">
                                <div class="metric-box">
                                    <p>Litros de sangre</p>
                                    <p>Desde último mes</p>
                                    <p class="metric-number">+2</p>
                                </div>
                                <div class="metric-box">
                                    <p>Pacientes Nuevos</p>
                                    <p>Desde último mes</p>
                                    <p class="metric-number">+8</p>
                                </div>
                                <div class="metric-box">
                                    <p>Nuevas citas</p>
                                    <p>Desde último mes</p>
                                    <p class="metric-number">+12</p>
                                </div>
                            </div>
                            <div class="container">
                                <div class="chart">
                                    <canvas id="flujoSangre" width="600" height="600"></canvas>
                                </div>
                            </div>
                        </form>
                    </div>

                    <div id="citas-form" class="form-container">
                        <h1>Citas Agendadas</h1>
                        <form>
                            <div class="form-group">
                            </div>
                            <div class="container">
                                <div class="chart">
                                    <canvas id="citasAgendadas" width="200" height="200"></canvas>
                                </div>
                            </div>
                        </form>
                    </div>

                    <!-- Doctores Form with CRUD -->
                    <div id="doctores-form" class="form-container">
                        <h1>Doctores</h1>
                        <div class="crud-container">
                            <form id="doctores-form-crud">
                                <div class="form-group">
                                    <label for="doctorName">Nombre del Doctor</label>
                                    <input type="text" class="form-control" id="doctorName" placeholder="Ingrese el nombre">
                                </div>
                                <div class="form-group">
                                    <label for="doctorSpecialty">Especialidad</label>
                                    <input type="text" class="form-control" id="doctorSpecialty" placeholder="Ingrese especialidad">
                                </div>
                                <button type="submit" class="btn btn-primary">Agregar Doctor</button>
                                <button type="submit" class="btn btn-primary">Editar Doctor</button>
                                <button type="submit" class="btn btn-primary">Eliminar Doctor</button>
                            </form>
                            <div id="doctores-list" class="mt-3">
                            </div>
                        </div>
                    </div>


                    <div id="reportes-form" class="form-container">
                        <h1>Reportes</h1>
                        <div class="crud-container">
                            <form id="reportes-form-crud">
                                <div class="form-group">
                                    <label for="reporteTitle">Título del Reporte</label>
                                    <input type="text" class="form-control" id="reporteTitle" placeholder="Ingrese el título">
                                </div>
                                <div class="form-group">
                                    <label for="reporteContent">Contenido del Reporte</label>
                                    <textarea class="form-control" id="reporteContent" rows="3" placeholder="Ingrese el contenido"></textarea>
                                </div>
                                <button type="submit" class="btn btn-primary">Realizar Reporte</button>
                            </form>
                            <div id="reportes-list" class="mt-3">
                            </div>
                        </div>
                    </div>

                    <div id="configuracion-form" class="form-container">
                        <h1>Configuración</h1>
                        <div class="crud-container">
                            <form id="configuracion-form-crud">
                                <div class="form-group">
                                    <label for="clinicaName">Nombre actual:</label>
                                    <br>
                                    <label for="clinicaName">Nombre de la Clínica</label>
                                    <input type="text" class="form-control" id="clinicaName" placeholder="Ingrese el nuevo nombre de la clínica">
                                </div>
                                <div class="form-group">
                                    <label for="clinicaAddress">Dirección de la Clínica</label>
                                    <br>
                                    <label for="clinicaAddress" id="clinicaAddress">300 metros oeste del centro de Cartago</label>
                                    <br>
                                    <label for="clinicaAddress">Dirección de la Clínica</label>
                                    <input type="text" class="form-control" id="clinicaAddressNew" placeholder="Ingrese nueva dirección">
                                </div>
                                <button type="submit" class="btn btn-primary">Actualizar Información</button>
                            </form>
                            <div id="configuracion-list" class="mt-3">
                            </div>
                        </div>
                    </div>
                </div>
            </main>

            <!-- Right Menu -->
            <nav id="right-menu" class="col-md-2 d-none d-md-block bg-light">
                <div class="position-sticky">
                    <h4 class="p-3">Nombre clínica</h4>
                    <div class="new-metrics-container">
                        <div class="new-metric-box">
                            <h5 class="label">Citas</h5>
                            <p class="value">4250</p>
                        </div>
                        <div class="new-metric-box">
                            <h5 class="label">Pacientes Totales</h5>
                            <p class="value">1.1k</p>
                        </div>
                        <div class="new-metric-box">
                            <h5 class="label">Puntuación</h5>
                            <p class="value">4.9</p>
                        </div>
                    </div>
                </div>
            </nav>
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

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="./admindashboard.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js@4.4.3/dist/chart.umd.min.js"></script>
    <script src="citasAgendadas.js"></script>
    <script src="flujoSangre.js"></script>
</body>
</html>