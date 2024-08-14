class SpecialHeader extends HTMLElement {
    connectedCallback(){

        this.innerHTML = `
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
                    <li class="nav-item"><a class="nav-link register .nav-link register Background Color" href="register.php">Registrarse</a></li>
                    <li class="nav-item"><a class="nav-link login .nav-link login Background Color" href="login.php">Iniciar Sesión</a></li>
                </ul>
            </nav>
        </div>
         `
    }

}

class SpecialFooter extends HTMLElement {
    connectedCallback(){

        this.innerHTML = `
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
         `
    }

}

customElements.define('special-header', SpecialHeader)
customElements.define('special-footer', SpecialFooter)