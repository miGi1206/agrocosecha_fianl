<style>
    nav{
        border:none !important;
    }
</style>
<nav class="navbar navbar-expand-lg navbar-light shadow" style="border 1px solid #28a745;">
    <div class="container d-flex justify-content-between align-items-center" style="margin-left: 5%;">
        <a class="navbar-brand text-success logo1 h1 align-self-center" href="/agrocosecha_final/index.php">
            <img src="/agrocosecha_final/vista_corp/assets/img/nombre_logo.png" alt="" style="width:50% !important;"/>
        </a>

        <button class="navbar-toggler border-0" type="button" data-bs-toggle="collapse"
            data-bs-target="#templatemo_main_nav" aria-controls="navbarSupportedContent" aria-expanded="false"
            aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="align-self-center collapse navbar-collapse flex-fill d-lg-flex justify-content-lg-between"
            id="templatemo_main_nav">
            <div class="flex-fill">
                <ul class="nav navbar-nav d-flex justify-content-between mx-lg-auto" style="margin-right:3% !important;">

                    <!-- <li class="nav-item">
                        <a class=" nav-link hola" href="../cliente/admin_cliente.php">Clientes</a>
                    </li> -->
                    <li class="nav-item">
                        <a class=" nav-link hola" href="../administrador/admin_admin_tabla.php">Personas</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link hola" href="../proveedor/admin_provee_tabla.php">Proveedores</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link hola" href="../producto/admin_producto_tabla.php">Productos</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link hola" href="../servicios/admin_servicio_tabla.php">Servicios</a>
                    </li>

                    <!-- <li class="nav-item">
                        <a class="nav-link hola" href="../mensaje/admin_mensaje.php">Mensajes</a>
                    </li> -->
                </ul>
            </div>
            <!-- //TODO: Funcion para mostrar la opcion de iniciar sesion -->
        <?php if (!isset($_SESSION['codigo_usuario'])) { ?>
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
        <style>
            div .navbar{
                border-left:1px solid gray; 
                border-top:none;
                border-bottom:none;
                border-right:none;
                padding-left:3%;
            }
            @media (max-width: 789px){
                div .navbar{
                    border-left:none; 
                    padding-left:0;
                    border-top:1px solid gray;
                }
            }
        </style>
            <div class="navbar align-self-center d-flex">
                <ul class="nav navbar-nav d-flex justify-content-between mx-lg-auto" >
                    <li class="nav-item dropdown" >
                        <a class="nav-link dropdown-toggle" href="#" id="usuarioDropdown" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fas fa-user"></i> <?php echo $nombre; ?>
                        </a>
                        <div class="dropdown-menu dropdown-menu dropdown-menu-end" aria-labelledby="usuarioDropdown">
                            <?php
                            if (isset($_SESSION['cod_tipo_usuario']) && $_SESSION['cod_tipo_usuario'] == 1) {
                                ?>
                                <a class="dropdown-item" href="/agrocosecha_final/index.php">Home</a>
                            <?php } ?>
                            <a class="dropdown-item" href="/agrocosecha_final/vista_corp/config/logout.php">Salir</a>
                        </div>
                    </li>
                </ul>
            </div>
        <?php } 
        ?>
        </div>
    </div>
</nav>