<nav class="container pb-5 bg-light" id="container_nav">

    <h5 class="h4 text-success" style="color:#28a745;" id="h5">Productos</h5>

    <ul id="container_ul">
        <form action="" method="GET">
        <?php
        //TODO: Consulta SQL para traer todos los datos de los administradores
        $sql_producto = "SELECT * FROM `tbl_producto`";
        $result_producto = mysqli_query($conn,$sql_producto);

        //* Ciclo para mostrar los registros
        while ($row = mysqli_fetch_assoc($result_producto)){ 
        ?>
        <form action="" method="GET">
            <div class="form-floating mb-3" style="margin-top:15px; margin-bottom:0px !important;" class="logo_nav A">
                <!-- <input name="busqueda" type="button" class="form-control cuadro_texto1" id="nombre" placeholder="Nombre" value="<?= $row['nombre']?>" requered readonly> -->
                <button style="width:100%; height:50px !important; margin-top:0px !important; border-radius:100px;" class="A"
                    type="submit" name="busqueda" value="<?= $row['codigo_producto']?>"><?= $row['nombre']?></button>
            </div>
        </form>
        <?php    
        }
        ?>
            
        </form>
    </ul>

    <h5 class="h4 text-success" style="color:#28a745;" id="h5">Alquiler de equipos</h5>

    <ul id="container_ul">
        <form action="" method="GET">
        <?php
        //TODO: Consulta SQL para traer todos los datos de los administradores
        $sql_alquiler = "SELECT * FROM `tbl_servicio`,`tbl_tipo_servicio` WHERE tbl_servicio.cod_tipo_servicio = tbl_tipo_servicio.codigo_tipo_servicio
        AND tbl_tipo_servicio.tipo_servicio='alquiler de equipos'";
        $result_alquiler = mysqli_query($conn,$sql_alquiler);

        //* Ciclo para mostrar los registros
        while ($row = mysqli_fetch_assoc($result_alquiler)){ 
        ?>
        <form action="" method="GET">
            <div class="form-floating mb-3" style="margin-top:15px; margin-bottom:0px !important;" class="logo_nav A">
                <!-- <input name="busqueda" type="button" class="form-control cuadro_texto1" id="nombre" placeholder="Nombre" value="<?= $row['nombre']?>" requered readonly> -->
                <button style="width:100%; height:50px !important; margin-top:0px !important; border-radius:100px;" class="A"
                    type="submit" name="busqueda2" value="<?= $row['codigo_servicio']?>"><?= $row['nombre']?></button>
            </div>
        </form>
        <?php    
        }
        ?>
            
        </form>
    </ul>

    <h5 class="h4 text-success" style="color:#28a745;" id="h5">Servicios personales</h5>

    <ul id="container_ul">
        <form action="" method="GET">
        <?php
        //TODO: Consulta SQL para traer todos los datos de los administradores
        $sql_personal = "SELECT * FROM `tbl_servicio`,`tbl_tipo_servicio` WHERE tbl_servicio.cod_tipo_servicio = tbl_tipo_servicio.codigo_tipo_servicio
        AND tbl_tipo_servicio.tipo_servicio='servicios personales'";
        $result_personal = mysqli_query($conn,$sql_personal);

        //* Ciclo para mostrar los registros
        while ($row = mysqli_fetch_assoc($result_personal)){ 
        ?>
        <form action="" method="GET">
            <div class="form-floating mb-3" style="margin-top:15px; margin-bottom:0px !important;" class="logo_nav A">
                <!-- <input name="busqueda" type="button" class="form-control cuadro_texto1" id="nombre" placeholder="Nombre" value="<?= $row['nombre']?>" requered readonly> -->
                <button style="width:100%; height:50px !important; margin-top:0px !important; border-radius:100px;" class="A"
                    type="submit" name="busqueda3" value="<?= $row['codigo_servicio']?>"><?= $row['nombre']?></button>
            </div>
        </form>
        <?php    
        }
        ?>
            
        </form>
    </ul>

</nav>
    <!-- <h5 class="h4 text-success" style="color:#28a745; margin-left:8px;" id="h5">Productos</h5>
        <ul id="ul">
            <li id="li">
                <a class="logo_nav A" href="/agrocosecha_final/vista_corp/vista_gallinas.php">
                    <img src="/agrocosecha_final/vista_corp/assets/img/1face_gallina.png" alt="" class="imagen_a">
                    <span class="nav_item">Gallinas criollas</span>
                </a>
            </li>
            <li id="li">
                <a class="logo_nav A" href="/agrocosecha_final/vista_corp/vista_pollos.php">
                    <img src="/agrocosecha_final/vista_corp/assets/img/2face_pollos.png" alt="" class="imagen_a">
                    <span class="nav_item">Pollos</span>
                </a>
            </li>
            <li id="li">
                <a class="logo_nav A" href="/agrocosecha_final/vista_corp/vista_cerdos.php">
                    <img src="/agrocosecha_final/vista_corp/assets/img/primeraface_cerdos.png" alt="" class="imagen_a">
                    <span class="nav_item">Cerdos</span>
                </a>
            </li>
            <li id="li">
                <a class="logo_nav A" href="/agrocosecha_final/vista_corp/vista_ponedoras.php">
                    <img src="/agrocosecha_final/vista_corp/assets/img/3face_gallina.png" alt=""  class="imagen_a">
                    <span class="nav_item">Ponedora</span>
                </a>
            </li>
            <li id="li">
                <a class="logo_nav A" href="/agrocosecha_final/vista_corp/vista_ganado.php">
                    <img src="/agrocosecha_final/vista_corp/assets/img/1face_ganado.png" alt="" class="imagen_a">
                    <span class="nav_item">Ganado</span>
                </a>
            </li>
            <li id="li">
                <a class="logo_nav A" href="/agrocosecha_final/vista_corp/vista_arroz.php">
                    <img src="/agrocosecha_final/vista_corp/assets/img/arroz.jpg" alt="" class="imagen_a">
                    <span class="nav_item">Arroz</span>
                </a>
            </li>
            <li id="li">
                <a class="logo_nav A" href="/agrocosecha_final/vista_corp/vista_yuca.php">
                    <img src="/agrocosecha_final/vista_corp/assets/img/1face_yuca.png" alt="" class="imagen_a">
                    <span class="nav_item">Yuca</span>
                </a>
            </li>
            <li id="li">
                <a class="logo_nav A" href="/agrocosecha_final/vista_corp/vista_platano.php">
                    <img src="/agrocosecha_final/vista_corp/assets/img/1face_platano.png" alt="" class="imagen_a">
                    <span class="nav_item">Platano</span>
                </a>
            </li>
            <li id="li">
                <a class="logo_nav A" href="/agrocosecha_final/vista_corp/vista_peces.php">
                    <img src="/agrocosecha_final/vista_corp/assets/img/1face_peces.png" alt="" class="imagen_a">
                    <span class="nav_item">Peces</span>
                </a>
            </li>
        </ul>

        <h5 class="h4 text-success" style="color:#28a745; margin-top:20px; margin-left:15px;" id="h5">Alquiler de equipos</h5>
        <ul id="ul">
            <li id="li">
                <a class="logo_nav A" href="/agrocosecha_final/vista_corp/vista_fumigacion.php">
                    <img src="/agrocosecha_final/vista_corp/assets/img/1face_fumicacion.png" alt="" class="imagen_a" style="margin-right:15px">
                    <span class="nav_item">Fumigación</span>
                </a>
            </li>
            <li id="li">
                <a class="logo_nav A" href="/agrocosecha_final/vista_corp/vista_abono.php">
                    <img src="/agrocosecha_final/vista_corp/assets/img/1face_abono.png" alt="" class="imagen_a" style="margin-right:15px">
                    <span class="nav_item">Abonos</span>
                </a>
            </li>
        </ul>

        <h5 class="h4 text-success" style="color:#28a745; margin-top:20px;" id="h5">Servicios personales</h5>

        <ul id="ul">
            <li id="li">
                <a class="logo_nav A" href="/agrocosecha_final/vista_corp/servicio_personales_fumigacion.php">
                    <img src="/agrocosecha_final/vista_corp/assets/img/1face_fumicacion.png" alt="" class="imagen_a" style="margin-right:15px">
                    <span class="nav_item">Fumigación</span>
                </a>
            </li>
            <li id="li">
                <a class="logo_nav A" href="/agrocosecha_final/vista_corp/servicio_personales_controles.php">
                    <img src="/agrocosecha_final/vista_corp/assets/img/1servicio_fumigacion.png" alt="" class="imagen_a" style="margin-right:15px">
                    <span class="nav_item">Controles</span>
                </a>
            </li>
            <li id="li">
                <a class="logo_nav A" href="/agrocosecha_final/vista_corp/servicio_personales_abono.php">
                    <img src="/agrocosecha_final/vista_corp/assets/img/1servicio_abono.png" alt="" class="imagen_a" style="margin-right:15px">
                    <span class="nav_item">Abonos</span>
                </a>
            </li>
            <li id="li">
                <a class="logo_nav A" href="/agrocosecha_final/vista_corp/servicio_personales_asesoria.php">
                    <img src="/agrocosecha_final/vista_corp/assets/img/1asesoria.png" alt="" class="imagen_a" style="margin-right:15px">
                    <span class="nav_item">Asesorias</span>
                </a>
            </li>
        </ul> -->
            <!-- 
            <ul class="collapse show list-unstyled pl-3">
            <li>
                <a class="justify-content-between h3 text-decoration-none"
                    href="servicio_personales_preparacion.php">Preparacion de
                    tierra</a>
                </li>
            </ul>
        </ul> -->
    <!-- </ul> -->
<!-- </nav> -->
