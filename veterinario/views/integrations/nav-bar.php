<nav class="navbar sticky-top navbar-expand-lg navbar-light">
    <div class="container-fluid">
        <a class="navbar-brand" href="?pagina=principal">Crias</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link <?php echo ($pagina == "principal" ? "active text-primary" : ""); ?> " aria-current="page" href="?pagina=principal">Inicio</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?php echo ($pagina == "cuarentena" || $pagina == "historial" ? "active text-primary" : ""); ?>" href="?pagina=cuarentena">Crias en cuarentena</a>
                </li>
            </ul>
        </div>
    </div>
</nav>