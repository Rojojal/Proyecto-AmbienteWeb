<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BloodCare</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.3/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"></script>
    <script
        src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>
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

    <main class="container">
        <section class="text-center my-5">
            <h2>Agende su cita</h2>
        </section>
        <section>
            <div class="container">
                <div class="row">
                    <div class="col">
                        <form class="row g-3" action="guardarCita.php" method="POST">
                            <div class="col-md-6">
                                <label for="inputName" class="form-label">Nombre</label>
                                <input type="name" class="form-control" id="inputName" name="nombre" required>
                            </div>
                            <div class="col-md-6">
                                <label for="inputID" class="form-label">Cédula</label>
                                <input type="text" class="form-control" id="inputID" name="cedula" placeholder="1-1111-1111" required>
                            </div>
                            <div class="col-md-6">
                                <label for="inputEmail" class="form-label">Correo</label>
                                <input type="text" class="form-control" id="inputEmail" name="correo" placeholder="example@example.com" required>
                            </div>
                            <div class="col-md-6">
                                <label for="inputNumber" class="form-label">Teléfono</label>
                                <input type="text" class="form-control" id="inputNumber" name="telefono" placeholder="8888-8888" required>
                            </div>
                        
                    </div>
                    <div class="col">
                        <label>Ubicación</label>
                        <div class="ratio ratio-1x5">
                            <iframe
                                src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d1964.9451723291495!2d-84.044445!3d9.943081!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x8fa0e386e75847f5%3A0x16158c318d2ec39d!2sUCR%2C%20Oficina%20de%20Bienestar%20y%20Salud%20(OBS)!5e0!3m2!1ses!2scr!4v1721620218964!5m2!1ses!2scr"
                                width="500" height="150" style="border:0;" allowfullscreen="" loading="lazy"
                                referrerpolicy="no-referrer-when-downgrade"></iframe>
                        </div>
                    </div>
        </section>
        <section>
            <div class="container">
                <div class="row">
                    <div class="col">
                        <section class="container">
                            <h3 class="pt-4 pb-2">Seleccione la fecha de la cita</h3>
                            <form>
                                <div class="row form-group">
                                    <label for="date" class="col-sm-1 col-form-label">Fecha:</label>
                                    <div class="col-sm-4">
                                        <div class="input-group date" id="datepicker">
                                            <input type="text" class="form-control" id="inputDate" name="fecha" required>
                                            <span class="input-group-append">
                                                <span class="input-group-text bg-white">
                                                    <i class="fa fa-calendar"></i>
                                                </span>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </section>
                    </div>
                    <div class="col">
                        <section class="container">
                            <h3 class="pt-4 pb-2">Seleccione la hora de la cita</h3>
                            <select class="form-select" id="horaCita" aria-label="Default select example" name="hora" required>
                                <option selected>Horas Disponibles</option>                                
                            </select>
                        </section>
                    </div>
        </section>
        <div class="d-flex justify-content-end">
            <button type="submit" class="btn btn-info">Agendar Cita</button>
        </div>
        </form>
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

    <script type="text/javascript">
        $(function () {
            var today = new Date();
            $('#datepicker').datepicker({
                startDate: today,
                autoclose: true
            }).on('changeDate', function(e) {
              // Actualiza el valor del campo de fecha
              $('#inputDate').val(e.format('yyyy-mm-dd'));
            });
        });

        $(document).ready(function() {
        const startHour = 7; // Hora de inicio 7:00 am
        const endHour = 16;  // Hora de fin 4:00 pm
        const interval = 30; // Intervalo de tiempo en minutos
        const selectHora = $('#horaCita');

        for (let hour = startHour; hour < endHour; hour++) {
            for (let min = 0; min < 60; min += interval) {
                let formattedHour = hour % 12 === 0 ? 12 : hour % 12;
                let period = hour < 12 ? "am" : "pm";
                let formattedMinute = min < 10 ? '0' + min : min;
                let time = `${formattedHour}:${formattedMinute} ${period}`;

                // Añade la opción al select
                selectHora.append(`<option value="${hour}:${formattedMinute}">${time}</option>`);
            }
        }
    });

  
    </script>
</body>

</html>