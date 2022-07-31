<nav class="navbar sticky-top navbar-expand-lg navbar-light">
    <div class="container-fluid">
        <a class="navbar-brand" href="?pagina=index">Crias</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link <?php echo ($pagina == "index" ? "active text-primary" : ""); ?> " aria-current="page" href="?pagina=index">Inicio</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?php echo ($pagina == "registrar_crias" ? "active text-primary" : ""); ?>" href="?pagina=registrar_crias">Registrar Nueva</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Pricing</a>
                </li>
            </ul>
        </div>
    </div>
</nav>