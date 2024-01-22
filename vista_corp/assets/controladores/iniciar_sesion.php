<?php if (!isset($_SESSION['id'])) { ?>
<div class="navbar align-self-center d-flex">
    <ul class="nav navbar-nav d-flex justify-content-between mx-lg-auto">
        <li class="nav-item">
            <a class="nav-link" href="#" class="btn" data-bs-toggle="modal" data-bs-target="#exampleModalToggle" aria-expanded="false" role="button">Iniciar sesión</a>
        </li>
    </ul>
</div>
<?php
} else { 
    // Asegúrate de definir $nombre aunque sea como una cadena vacía
    $nombre = isset($_SESSION['usuario']) ? $_SESSION['usuario'] : '';
?>
    <div class="navbar align-self-center d-flex">
        <ul class="nav navbar-nav d-flex justify-content-between mx-lg-auto">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="usuarioDropdown" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="fas fa-user"></i> <?php echo $nombre; ?>
                </a>
                <div class="dropdown-menu dropdown-menu dropdown-menu-end" aria-labelledby="usuarioDropdown">
                    <?php
                    if (isset($_SESSION['tipo_usuario']) && $_SESSION['tipo_usuario'] == "1") { ?>
                        <a class="dropdown-item" href="/agrocosecha_final/vista_corp/assets/vistas/mensaje/admin_mensaje.php">Admin</a>
                    <?php } ?>
                    <a class="dropdown-item" href="/agrocosecha_final/vista_corp/config/logout.php">Salir</a>
                </div>
            </li>
        </ul>
    </div>
<?php } ?>