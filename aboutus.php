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
    <special-header></special-header>

    <main class="container">
        <section class="text-center my-5">
            <h2>Sobre Nosotros</h2>
            <p>Aquí tienes toda la informacion necesaria de nuestra empresa</p>
        </section>

        <div class="row text-center my-5    ">
            <div class="col-12 mb-4">
                <div class="card">
                    <div class="card-body">
                        <h3 class="card-title">Requisitos para donar</h3>
                        <p class="card-text">
                            BloodCare es una innovadora aplicacion web diseñada para transformar la gestion de recursos en los centros de donacion de sangre. Nuestro objetivo es facilitar
                            una conexion fluida y efectia entre donantes y centros de donacion, optimizando la programacion en citas y asegurando un flujo constante y adecuado de donaciones 
                            de sangre. Utilizamos tecnologías avanzadas para crear una plataforma integrada que no solo reduce el tiempo de espera, sino que tambien mejora significativamente la eficiencia
                            en la gestion de donaciones.
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 mb-4">
                <div class="card">
                    <div class="card-body">
                        <h3 class="card-title">Nuestra Misión</h3>
                        <p class="card-text">
                           En BloodCare, nuestra mision es resolver los desafios criticos en la gestion de donaciones de sangre y recursos en los centros de donaciones.
                           A través de una plataforma intuitiva y eficaz, buscamos mejorar la disponibilidad de sangre y productos sanguíneos, esenciales para emergencias médicas,
                           cirugías y tratamientos de enfermedades crónicas.
                        </p>
                        
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 mb-4">
                <div class="card">
                    <div class="card-body">
                        <h3 class="card-title">Nuestro Comprimiso</h3>
                        <p class="card-text"> 
                            BloodCare está comprometido con la mejora continua y la innovación. Implementamos sistemas de alertas y notificaciones para necesidades urgentes de sangre, 
                            proporcionamo herramientras para la generacion de informes de personalizados y estadísticas sobre donaciones, y establecemos programas de incentivos para motivar
                            a los donantes. Nuestro enfoque integral asegura que cada donacion cuenta, y cada donante se siente valorado.
                        </p>
                        
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 mb-4">
                <div class="card">
                    <div class="card-body">
                        <h3 class="card-title">Impacto y beneficios</h3>
                        <p class="card-text">
                            Con BloodCarel, prometemos un impacto significativo en la estabilidad del suministro de sangre y en la calidad de la atencion médica en Costa Rica. Nuestra solución no solo facilita la interaccion
                            entre donantes y centros de donación, sino que tambien optimiza la programacion de citas y proporciona una administracion más eficiente y adecuada de los recursos sanguíneos
                        </p>
                       
                    </div>
                </div>
            </div>
        </div>

       
    </main>

    <special-footer></special-footer>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src = "./fragments.js"></script>


</body>

</html>