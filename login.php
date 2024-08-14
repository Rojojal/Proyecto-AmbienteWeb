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
    <special-header></special-header>

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

    <div id="footer-placeholder"></div>
    <special-footer></special-footer>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src = "./fragments.js"></script>
</body>
</html>