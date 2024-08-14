<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Notificaciones</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <special-header></special-header>
    <main class="container">
    <div class="container mt-5" id="contenido_notificaciones">
        <div class="row align-items-center mb-3">
            <div class="d-flex flex-row flex-wrap justify-content-center justify-content-md-between">
                <h2 class="m-auto pr-3">Tus notificaciones:</h2>
                <button type="button" class="btn btn-primary position-relative">
                    Nuevas
                    <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                        1
                        <span class="visually-hidden"></span>
                    </span>
                </button>
            </div>
            <div class="m-auto pr-3">
                <h2 class="m-auto">Leídos:</h2>
            </div>
        </div>
        <div class="row mt-2">
            <div class="col-12 col-md-5 mb-3 mb-md-0">
                <div id="carouselNewNotifications" class="carousel slide" data-ride="carousel">
                    <div class="carousel-inner" id="notificaciones_nuevas">
                        <div class="carousel-item active">
                            <div class="notification-item">
                                <h3>¡Confirma tu asistencia!</h3>
                                <p>Tu cita ha sido aceptada por el banco de sangre UCR, la fecha de la cita se realizará el lunes 27 de noviembre a las 6:00 am, recuerda seguir las recomendaciones para tu donación de sangre.</p>
                                <p>Te enviaremos un correo con la dirección del lugar.</p>
                                <button type="button" class="btn btn-primary">Confirmar asistencia</button>
                            </div>
                        </div>
                    </div>
                    <a class="carousel-control-prev" href="#carouselNewNotifications" role="button" data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#carouselNewNotifications" role="button" data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                    </a>
                </div>
            </div>
            <div class="col-12 col-md-1 d-flex justify-content-center align-items-center">
                <div class="divider"></div>
            </div>
            <div class="col-12 col-md-5">
                <div id="carouselSeenNotifications" class="carousel slide" data-ride="carousel">
                    <div class="carousel-inner" id="notificaciones_vistas">
                        <div class="carousel-item active">
                            <div class="notification-item">
                                <h3>Confirma tu correo</h3>
                                <p>Introduce el código a continuación en tu correo electrónico y haz click en el botón "Haz click aquí para verificar" para autenticar tu nueva cuenta.</p>
                                <p>¡Queremos asegurarnos de que eres tú!</p>
                                <br>
                                <br>
                                <br>
                                <p>¡Queremos asegurarnos de que eres tú!</p>
                                <div class="verification-code-container">
                                    <input type="text" id="verificationCode" value="123456" readonly>
                                    <button type="button" class="btn btn-secondary" onclick="copyToClipboard()">Copiar</button>
                                </div>
                            </div>
                        </div>
                        <div class="carousel-item">
                            <div class="notification-item" id="notification-thank-you">
                                <h3>¡Gracias por visitar nuestra clínica!</h3>
                                <p>Queremos agradecerte por haberte tomado el tiempo para visitarnos en uno de nuestros centros de donación. Esperamos que hayas tenido una experiencia satisfactoria.</p>
                                <p>Si tienes alguna pregunta o necesitas más información, no dudes en ponerte en contacto con nosotros.</p>
                                <button type="button" class="btn btn-primary">Contáctanos</button>
                            </div>
                        </div>
                    </div>
                    <a class="carousel-control-prev" href="#carouselSeenNotifications" role="button" data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#carouselSeenNotifications" role="button" data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                    </a>
                </div>
            </div>
        </div>
    </div>
</main>
    <special-footer></special-footer>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="./fragments.js"></script>

    <script>
    function copyToClipboard() {
        const codeInput = document.getElementById('verificationCode');
        codeInput.select();
        document.execCommand('copy');
        alert('Código copiado al portapapeles');
    }</script>
</body>
</html>