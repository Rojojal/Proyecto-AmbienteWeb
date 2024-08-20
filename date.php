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

<main class="container my-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-body">
                    <h1 class="text-center">Selecciona tu clínica</h1>
                    <form id="form-clinica" method="POST">
                        <div class="form-group">
                            <label for="clinica">Elige una clínica: </label>
                            <select class="form-control" id="id_clinica" name="id_clinica" required>
                                <?php
                                include 'conexionBD.php';
                                $result = $conexion->query("SELECT id_clinica, nombre_clinica FROM tab_clinica");
                                
                                while ($row = $result->fetch_assoc()) {
                                    echo "<option value='{$row['id_clinica']}'>{$row['nombre_clinica']}</option>";
                                }
                                
                                $conexion->close();
                                ?>
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary btn-block">Seleccionar Clínica</button>
                    </form>

                    <div id="citas-disponibles" class="mt-4">
                        <h2 class="text-center">Citas Disponibles</h2>
                        <form id="form-cita" method="POST" action="registrarCitaHelper.php">
                            <input type="hidden" name="id_admin_clinica" value="<?php echo htmlspecialchars($user['id_usuario']); ?>">
                            <div id="lista-citas" class="list-group"></div>

                            <div id="submit-container" class="mt-4" style="display: none;">
                                <button type="submit" class="btn btn-primary btn-block">Agendar Cita</button>
                            </div>
                        </form>
                    </div>
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

<script>
document.getElementById('form-clinica').addEventListener('submit', function(event) {
    event.preventDefault();

    let id_clinica = document.getElementById('id_clinica').value;
    let listaCitas = document.getElementById('lista-citas');
    let submitContainer = document.getElementById('submit-container');
    listaCitas.innerHTML = '';

    fetch('mostrarCitasDisponibles.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/x-www-form-urlencoded',
        },
        body: 'id_clinica=' + encodeURIComponent(id_clinica)
    })
    .then(response => response.json())
    .then(data => {
        if (data.length > 0) {
            data.forEach(cita => {
                let listItem = document.createElement('div');
                listItem.classList.add('list-group-item');

                let radioInput = document.createElement('input');
                radioInput.type = 'radio';
                radioInput.name = 'id_cita';
                radioInput.value = cita.id_cita;
                radioInput.required = true;

                let label = document.createElement('label');
                label.textContent = `Cita ID: ${cita.id_cita} - Fecha y Hora: ${cita.fecha_hora}`;
                label.style.marginLeft = "10px";

                listItem.appendChild(radioInput);
                listItem.appendChild(label);

                listaCitas.appendChild(listItem);
            });

            submitContainer.style.display = 'block';
        } else {
            listaCitas.innerHTML = '<div class="list-group-item">No hay citas disponibles.</div>';
            submitContainer.style.display = 'none';
        }
    })
    .catch(error => {
        console.error('Error fetching citas:', error);
        listaCitas.innerHTML = '<div class="list-group-item">Error al cargar las citas.</div>';
        submitContainer.style.display = 'none';
    });
});
</script>

</body>

</html>