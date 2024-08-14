<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Regístrate en BloodCare</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="styles.css">
</head>

<body>
    <special-header></special-header>
    <main class="container my-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <h1 class="text-center">¡Regístrate en BloodCare!</h1>
                        <form method="POST" action="registerhelper.php">
                            <div class="form-group">
                                <label for="fullName">Ingrese su nombre completo</label>
                                <input type="text" class="form-control" id="fullName" name="fullName" placeholder="Nombre completo" required>
                            </div>
                            <div class="form-group">
                                <label for="id">Cédula</label>
                                <input type="text" class="form-control" id="id" name="id" placeholder="Ingresa tu cédula" required>
                            </div>
                            <div class="form-group">
                                <label>¿Cuál es tu tipo de sangre?</label>
                                <div class="d-flex justify-content-around">
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="bloodType" id="oNeg" value="O-">
                                        <label class="form-check-label" for="oNeg">O-</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="bloodType" id="oPos" value="O+">
                                        <label class="form-check-label" for="oPos">O+</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="bloodType" id="aNeg" value="A-">
                                        <label class="form-check-label" for="aNeg">A-</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="bloodType" id="aPos" value="A+">
                                        <label class="form-check-label" for="aPos">A+</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="bloodType" id="bNeg" value="B-">
                                        <label class="form-check-label" for="bNeg">B-</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="bloodType" id="bPos" value="B+">
                                        <label class="form-check-label" for="bPos">B+</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="bloodType" id="abNeg" value="AB-">
                                        <label class="form-check-label" for="abNeg">AB-</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="bloodType" id="abPos" value="AB+">
                                        <label class="form-check-label" for="abPos">AB+</label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="province">Provincia</label>
                                <input type="text" class="form-control" id="province" name="province" placeholder="Ingresa tu provincia">
                            </div>
                            <div class="form-group">
                                <label for="canton">Cantón</label>
                                <input type="text" class="form-control" id="canton" name="canton" placeholder="Ingresa tu cantón">
                            </div>
                            <div class="form-group">
                                <label for="district">Distrito</label>
                                <input type="text" class="form-control" id="district" name="district" placeholder="Ingresa tu distrito">
                            </div>
                            <div class="form-group">
                                <label for="address">Dirección detallada</label>
                                <input type="text" class="form-control" id="address" name="address" placeholder="Ingresa tu dirección" required>
                            </div>
                            <div class="form-group">
                                <label for="email">Correo electrónico</label>
                                <input type="email" class="form-control" id="email" name="email" placeholder="Ingresa tu correo" required>
                            </div>
                            <div class="form-group">
                                <label for="password">Contraseña</label>
                                <input type="password" class="form-control" id="password" name="password" placeholder="Ingresa tu contraseña" required>
                                <small class="form-text text-muted">Usa 8 o más caracteres usando números, letras y símbolos</small>
                            </div>
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input" id="notifications" name="notifications">
                                <label class="form-check-label" for="notifications">Estoy de acuerdo en compartir mi información para recibir notificaciones</label>
                            </div>
                            <div class="form-group my-3">
                                <div class="g-recaptcha" data-sitekey="YOUR_SITE_KEY"></div>
                            </div>
                            <button type="submit" class="btn btn-primary btn-block">Registrarse</button>
                        </form>
                        <p class="text-center mt-3">¿Ya tienes cuenta? Entonces <a href="login.php">inicia sesión aquí</a></p>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script> 
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
    <script src="./fragments.js"></script>
</body>
</html>