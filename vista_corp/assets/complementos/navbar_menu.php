<!-- //! Segundo navbar, MENU de opciones -->
<nav class="navbar navbar-expand-lg navbar-light shadow">
    <div class="container d-flex justify-content-between align-items-center">
        <div>
        <a class="navbar-brand text-success logo align-self-center" href="/Agrocosecha_final/index.php">
            <img src="/agrocosecha_final/vista_corp/assets/img/nombre_logo.png" alt="" class="logo" style="width:60% !important;">
        </a>
        </div>

        <button class="navbar-toggler border-0" type="button" data-bs-toggle="collapse"
            data-bs-target="#templatemo_main_nav" aria-controls="navbarSupportedContent" aria-expanded="false"
            aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <?php
            // Realiza una consulta SQL para obtener el primer ID de la base de datos
            $sql_obtener_primer_id = "SELECT codigo_producto FROM tbl_producto ORDER BY codigo_producto ASC LIMIT 1";
            $resultado = mysqli_query($conn, $sql_obtener_primer_id);

            if ($row = mysqli_fetch_assoc($resultado)) {
                // Obtiene el ID
                $primer_id = $row['id'];
            }
        ?>

        <div class="align-self-center collapse navbar-collapse flex-fill  d-lg-flex justify-content-lg-between"
            id="templatemo_main_nav">
            <div class="flex-fill">
                <ul class="nav navbar-nav d-flex justify-content-between mx-lg-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="/agrocosecha_final/index.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/agrocosecha_final/vista_corp/pagina_auto.php?busqueda=<?= $primer_id ?>">Productos y Servicios</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/agrocosecha_final/vista_corp/quienessomos.php">Quienes somos</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/agrocosecha_final/vista_corp/contact.php">Contactanos</a>
                    </li>

                </ul>
            </div>

            <!-- //TODO: Funcion para mostrar la opcion de iniciar sesion -->
            <?php if (!isset($_SESSION['id'])) { ?>
            <div class="navbar align-self-center d-flex">
                <ul class="nav navbar-nav d-flex justify-content-between mx-lg-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="#" class="btn" data-bs-toggle="modal" data-bs-target="#exampleModalToggle" aria-expanded="false" role="button">Iniciar sesión</a>
                    </li>
                </ul>
            </div>
            
            <?php

            //TODO: Funcion si no se cumple la anterior; Muestra un icono de usuario, si es administrador 
            //todo: muestra una opcion para ir a las tablas de los clientes, proveedores y otros administradores
            } else { 
                //* Asegúrate de definir $nombre aunque sea como una cadena vacía
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
        </div>
    </div>
</nav>