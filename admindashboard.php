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

<?php
    include('dashboardQueries.php');
?>

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

    <main class="container">

    <?php if (isset($_GET['success']) && $_GET['success'] == 1): ?>
            <div id="success-message" class="alert alert-success">
                Cita finalizada correctamente.
            </div>
        <?php elseif (isset($_GET['error'])): ?>
            <?php
            $error = $_GET['error'];
            switch ($error) {
                case 'clinica_no_encontrada':
                    $message = 'Error: No se ha encontrado la clínica.';
                    break;
                case 'cita_no_existe':
                    $message = 'Error: La cita no existe.';
                    break;
                case 'cita_finalizada':
                    $message = 'Error: La cita ya está finalizada o no está en estado AGENDADA.';
                    break;
                case 'permiso_denegado':
                    $message = 'Error: No tiene permiso para finalizar esta cita.';
                    break;
                default:
                    $message = 'Error: Ha ocurrido un problema.';
                    break;
            }
            ?>
            <div id="error-message" class="alert alert-danger">
                <?php echo $message; ?>
            </div>
        <?php endif; ?>


        <div class="row">
            <div class="col-md-6">
                <h4>Distribución de Usuarios por Tipo de Sangre</h4>
                <canvas id="chartTipoSangre"></canvas>
            </div>
            <div class="col-md-6">
            <h4>Cantidad de Usuarios por Provincia</h4>
                <canvas id="chartProvincia"></canvas>
            </div>
        </div>
        
        <div class="row">
        
            <div class="col-md-4">
                <h4>Citas por Estado</h4>
                <canvas id="chartCitasEstado"></canvas>
            </div>
            <div class="col-md-6">
                <h4>Citas por Mes</h4>
                <canvas id="chartCitasMes"></canvas>
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
                        <a href="home.php" class="text-white">Volver</a>
                        <br>
                        <a href="contact.php" class="text-white">Contáctanos</a>
                    </div>
                </div>
            </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js@4.4.3/dist/chart.umd.min.js"></script>

    
    <script>
        function hideMessage() {
            var messageElement = document.getElementById('success-message');
            var errorMessageElement = document.getElementById('error-message');
            if (messageElement) {
                messageElement.style.display = 'none';
            }
            if (errorMessageElement) {
                errorMessageElement.style.display = 'none';
            }
        }

        document.addEventListener('DOMContentLoaded', function() {
            setTimeout(hideMessage, 15000); 
        });
    </script>

    <script>
        const ctx = document.getElementById('chartTipoSangre');
        new Chart(ctx, {
            type: 'bar',
            data: {
                labels: <?php echo json_encode(array_column($data_tipo_sangre, 'tipo_sangre')); ?>,
                datasets: [{
                    label: 'Cantidad por Tipo de Sangre',
                    data: <?php echo json_encode(array_column($data_tipo_sangre, 'total')); ?>,
                
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });

        const ctxP  = document.getElementById('chartProvincia');
        new Chart(ctxP, {
                        type: 'bar',
                                data: {
                                    labels: <?php echo json_encode(array_column($data_provincia, 'provincia')); ?>,
                                    datasets: [{
                                        label: 'Cantidad de Usuarios por Provincia',
                                        data: <?php echo json_encode(array_column($data_provincia, 'total')); ?>,
                                        backgroundColor: 'rgba(153, 102, 255, 0.2)',
                                        borderColor: 'rgba(153, 102, 255, 1)',
                                        borderWidth: 1
                                    }]
                                },
                                options: {
                                    scales: {
                                        y: {
                                            beginAtZero: true
                                        }
                                    }
                                }
                            });

        const ctxE = document.getElementById('chartCitasEstado');
        new Chart(ctxE, {
            type: 'pie',
            data: {
                labels: <?php echo json_encode(array_column($citas_estado_data, 'estado_cita')); ?>,
                datasets: [{
                    data: <?php echo json_encode(array_column($citas_estado_data, 'total')); ?>,
                    backgroundColor: ['rgba(255, 99, 132, 0.2)', 'rgba(54, 162, 235, 0.2)', 'rgba(255, 206, 86, 0.2)'],
                    borderColor: ['rgba(255, 99, 132, 1)', 'rgba(54, 162, 235, 1)', 'rgba(255, 206, 86, 1)'],
                    borderWidth: 1
                }]
            }
        });

        const ctxM = document.getElementById('chartCitasMes');
        new Chart(ctxM, {
            type: 'line',
            data: {
                labels: <?php echo json_encode(array_column($citas_mes_data, 'mes')); ?>,
                datasets: [{
                    label: 'Citas por Mes',
                    data: <?php echo json_encode(array_column($citas_mes_data, 'total')); ?>,
                    fill: false,
                    borderColor: 'rgba(75, 192, 192, 1)',
                    tension: 0.1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });

        const ctxM = document.getElementById('chartCantidadSangre');
        new Chart(ctxM, {
            type: 'line',
            data: {
                labels: <?php echo json_encode(array_column($data_sangre, 'fecha')); ?>,
                datasets: [{
                    label: 'Citas por Mes',
                    data: <?php echo json_encode(array_column($data_sangre, 'total')); ?>,
                    fill: false,
                    borderColor: 'rgba(75, 192, 192, 1)',
                    tension: 0.1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
</script>

    </body>
</html>