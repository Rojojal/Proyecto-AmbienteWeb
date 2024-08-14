<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BloodCare</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link th:href="@{/webjars/font-awesome/css/all.css}" rel="stylesheet"/>
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
            <h2>Requisitos para donar </h2>
            <p>Aquí tienes toda la informacion necesaria que se debe de tomar en cuenta una vez hayas decidido donar sangre</p>
        </section>

        <div class="row text-center my-5 ">
            <div class="col-md-3">
                <div class="card">
                    <div class="card-body colorCardsInfo">
                        <h3 class="card-title">Requisitos para donar</h3>
                        <p class="card-text">
                            <ul>
                                
                                <li>Tener entre 18 y 65 años.</li>
                                <li>Portar identificacion oficial: Cédula</li>
                                <li>Tomar un desayuno ligero, evitando lácteos y grasas</li>
                                <li>No portar sintomas de resfrio, gripe o infeccion</li>
                                <li>Pesar más de 50 kilogramos</li>
                                <li>En caso de tener el periodo, no debes tener dolores o sangrados fuertes</li>
                                <li>En los ultimos 3 meses solo haber tenido una pareja sexual </li>
                                <li>Tener más de 3 meses de haberse realizado un tatuaje o perforacion </li>
                                <li>No inyectarse insulina o drogas ilegales </li>
                                <li>No estar embarazada o en periodo de lactancia </li>
                              </ul>
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card">
                    <div class="card-body colorCardsInfo">
                        <h3 class="card-title">Periodos de espera</h3>
                        <p class="card-text">
                            <ul>
                                <li>15 dias después de terminar los sintomas de gripe, resfriado, diarrea o enfermedad</li>
                                <li>15 dias después de terminar el tratamiento de antibióticos por infecciones</li>
                                <li>6 semanas después de embarazo, lactancia o alborto</li>
                                <li>3 meses después de tatuajes, perforaciones o microblading</li>
                                <li>No puede donar si se inyecta drogas, tiene VIH, hepatitis B o C</li>
                                <li>Puede donar 5 años después de haber sido de alta de cáncer</li>
                                <li>Puede donar si usa tratamientos de acupuntura con agujas propias o desechables</li>
                                <li>No puede donar si padece de epilepsia, problemas cardíacos o enfermedades autoinmunes</li>
                              </ul>
                        </p>
                        
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card">
                    <div class="card-body colorCardsInfo">
                        <h3 class="card-title">Consejos antes de donar</h3>
                        <p class="card-text"> 
                            <ul>
                                <li>No se recomienda estar en ayuno, consuma un desayuno ligero evitando lacteos y grasas</li>
                                <li>No debe comer en abundacia antes de donar, si lo hizo mejor es mejor esperar 2 horas para donar</li>
                                <li>Tome bastante liquido el dia anterior  y se recomienda consumir 500 mL antes de donar</li>
                                <li>Evite el consumo de alcohol en grandes cantidades 24 horas antes de la donacion</li>
                                <li>Descansar bien la noche anterior a la donacion, entre 5 y 8 horas de sueño</li>
                                <li>No se recomienda fumar 2 horas antes y 2 horas después de la donacion de sangre</li>
                                <li>El nerviosimo le puede hacer sentir mal, hable con el personal de las clinicas, ellos le ayudarán a tranquilizarse</li>
                                <li>El consumo de alimentos ricos en hierro como carnes rojas, hígado, pescado, huevo, legumbres, le ayudará a tener niveles altos de hemoglobina</li>
                          </ul>
                        </p>
                        
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card">
                    <div class="card-body colorCardsInfo">
                        <h3 class="card-title">Consejos después de donar</h3>
                        <p class="card-text">
                            <ul>
                                <li>Evitar realizar ejercicios o esfuerzo en las siguientes 24 horas después de donar</li>
                                <li>Hidratese bien en las proximas 48 horas</li>
                                <li>No fume en las proximas 2 horas postdonacion</li>
                                <li>Evitar realizar cambios bruscos de posicion, ya que puede generar mareos </li>
                                <li>No se exponga al sol o a altas temperaturas por tiempos prolongados </li>
                                <li>Si siente mareos, acuéste y eleve sus pies hasta que se siente mejor </li>
                                <li>Si el sitio de punción sigue sangrado, haga presion en él y eleve el brazo por 15 minutos </li>
                            </ul>
                        </p>
                       
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

</body>

</html>