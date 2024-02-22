<?php
    session_start();
    if(!isset($_SESSION['usuario'])){
        header("Location: /agrocosecha_final/index.php");
        exit();
    }
    
    
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Agrocosecha</title>
    <link rel="website icon" type="jpg" href="../../img/Size-16.png">
    <link rel="stylesheet" href="../../css/admin_cliente.css">
    <link rel="stylesheet" href="../../css/navbar_cliente.css">
    <link rel="stylesheet" href="../../css/navbar_admin.css">
    <link href="https://unpkg.com/ionicons@4.5.10-0/dist/css/ionicons.min.css" rel="stylesheet">
    <!-- Enlace al archivo CSS de Bootstrap 5 -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

</head>

<body>
    <?php 
    //! Coneccion con la base de datos
    include "../../conections/coneccion_tabla.php";

    //! Conectarse con la funcion de eliminar el registro
    include "../../controladores/admin/eliminar_admin.php"; 
    ?>

    <!-- //TODO: Inicio del navbar -->
    <?php include "../../complementos/navbar_admin.php";?>
    <!-- //TODO Fin del navbar -->

    <!-- //* alerta nuevo registro -->
    <?php
    include "../../controladores/alertas.php";
    ?>

    <!-- //* alerta sesion iniciada -->
    <?php
    if(isset($_SESSION['msj_inicio_sesion'])){
        $respuesta = $_SESSION['msj_inicio_sesion'];?>
    <script>
    Swal.fire({
        title: "Sesion iniciada",
        text: "",
        icon: "success",
        timer: 2000,
        timerProgressBar: true,
        backdrop: false
    });
    </script>

    <?php
    unset($_SESSION['msj_inicio_sesion']);
    }
    ?>

    <h1>Clientes/Administradores</h1>

    <!-- //! Barra de busqueda -->
    <div class="container-fluid" style="display:flex; justify-content:center;">
        <form class="d-flex" style="width: 70%;">
            <form action="" method="GET">
                
                <!-- //TODO: informacion sobre busqueda -->
                <div class="btn-group" style="height:30px !important">
                    <button type="button" data-bs-toggle="dropdown"
                        aria-expanded="false" style="margin-top:5px; background-color:transparent !important; border:none;">
                        <img src="../../img/informacion.png" alt="">
                    </button>
                    <ul class="dropdown-menu" style="width:200px !important;">
                        <p style="padding:10% !important;">
                            Puedes buscar por cualquier campo de la tabla 
                            <br>
                            
                            <br><br>
                            <span style="color:#065F2C;">
                            <b>
                            Para regresar darle
                            click a buscar sin nada en la barra
                            de busqueda
                            </b>
                            </span>
                        </p>

                    </ul>
                </div>
                <!-- //TODO: Fin de informacion sobre busqueda -->

                <input style="border-radius:30px; height:70% !important;" class="form-control me-2" type="search"
                    placeholder="Buscar"
                    name="busqueda">
                <button style="height:auto !important; margin-top:0px !important; border-radius:100px;" class="botones"
                    type="submit" name="enviar">Buscar</button>
            </form>
        </form>
    </div>
    <!-- //! Fin barra de busqueda -->

    <?php
    $buscar="";
    if (isset($_GET['enviar'])){
        $busqueda = $_GET['busqueda'];

        if (isset($_GET['busqueda'])) {
            $buscar = "WHERE tbl_persona.identificacion LIKE '%" . $busqueda . "%' 
                OR tbl_persona.primer_nombre LIKE '%" . $busqueda . "%'
                OR tbl_persona.segundo_nombre LIKE '%" . $busqueda . "%' 
                OR tbl_persona.primer_apellido LIKE '%" . $busqueda . "%' 
                OR tbl_persona.segundo_apellido LIKE '%" . $busqueda . "%'
                OR tbl_persona.telefono LIKE '%" . $busqueda . "%' 
                OR tbl_persona.correo LIKE '%" . $busqueda . "%' 
                OR tbl_sexo.sexo LIKE '%" . $busqueda . "%' 
                OR tbl_tipo_usuario.tipo_usuario LIKE '%" . $busqueda . "%'
                OR tbl_persona.fecha_nacimiento LIKE '%" . $busqueda . "%' 
                OR tbl_persona.direccion LIKE '%" . $busqueda . "%' 
                OR tbl_usuario.usuario LIKE '%" . $busqueda . "%' 
                OR tbl_persona.fecha_creacion LIKE '%" . $busqueda . "%'";
        }
    }
    ?>

    <!-- //TODO: Inicio de la tabla de los administradores -->
    <div class="tabla_container" style="margin-top:-15px !important; width:100%;">

        <button class="boton-registrar"><a href="formulario_admin.php" class="text-decoration-none"
                style="color:white;"><b>Registrar</b></a></button>
        <div style="overflow-x:auto !important; width:100% !important;">
            <table>
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Identificación</th>
                        <th>Nombres</th>
                        <th>Apellidos</th>
                        <th>Telefono</th>
                        <th>Correo</th>
                        <th>Sexo</th>
                        <th>Fecha de nacimiento</th>
                        <th>Dirección</th>
                        <th>Usuario</th>
                        <th>Fecha de creación</th>
                        <th>Tipo de usuario</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php

                        if(!empty($_REQUEST["nume"])){ $_REQUEST["nume"];}else{ $_REQUEST["nume"] = '1';}
                        if($_REQUEST["nume"] == ""){$_REQUEST["nume"] = "1";}
                        $articulos=mysqli_query($conn,"SELECT tbl_persona.codigo_persona, tbl_persona.identificacion, tbl_persona.primer_nombre, tbl_persona.segundo_nombre,
                        tbl_persona.primer_apellido, tbl_persona.segundo_apellido, tbl_persona.telefono, tbl_persona.correo, tbl_tipo_usuario.tipo_usuario,
                        tbl_sexo.sexo, tbl_persona.fecha_nacimiento, tbl_usuario.usuario, tbl_persona.fecha_creacion, tbl_persona.direccion 
                        FROM `tbl_persona`
                        JOIN `tbl_usuario` ON tbl_persona.codigo_persona = tbl_usuario.cod_persona
                        JOIN `tbl_sexo` ON tbl_persona.cod_sexo = tbl_sexo.codigo_sexo
                        JOIN `tbl_tipo_usuario` ON tbl_usuario.cod_tipo_usuario = tbl_tipo_usuario.codigo_tipo_usuario
                        $buscar  ;");
                        $num_registros=mysqli_num_rows($articulos);
                        $registros= '5';
                        $pagina=$_REQUEST["nume"];
                        if(is_numeric($pagina))
                        $inicio= (($pagina-1)*$registros);
                        else
                        $inicio=0;
                        $busqueda=mysqli_query($conn,"SELECT tbl_persona.codigo_persona, tbl_persona.identificacion, tbl_persona.primer_nombre, tbl_persona.segundo_nombre,
                        tbl_persona.primer_apellido, tbl_persona.segundo_apellido, tbl_persona.telefono, tbl_persona.correo, tbl_tipo_usuario.tipo_usuario,
                        tbl_sexo.sexo, tbl_persona.fecha_nacimiento, tbl_usuario.usuario, tbl_persona.fecha_creacion, tbl_persona.direccion 
                        FROM `tbl_persona`
                        JOIN `tbl_usuario` ON tbl_persona.codigo_persona = tbl_usuario.cod_persona
                        JOIN `tbl_sexo` ON tbl_persona.cod_sexo = tbl_sexo.codigo_sexo
                        JOIN `tbl_tipo_usuario` ON tbl_usuario.cod_tipo_usuario = tbl_tipo_usuario.codigo_tipo_usuario
                        $buscar LIMIT $inicio,$registros;");
                        $paginas=ceil($num_registros/$registros);

                //TODO: Consulta SQL para traer todos los datos de los administradores
                // $sql = "SELECT tbl_persona.codigo_persona, tbl_persona.identificacion, tbl_persona.primer_nombre, tbl_persona.segundo_nombre,
                // tbl_persona.primer_apellido, tbl_persona.segundo_apellido, tbl_persona.telefono, tbl_persona.correo, tbl_tipo_usuario.tipo_usuario,
                // tbl_sexo.sexo, tbl_persona.fecha_nacimiento, tbl_usuario.usuario, tbl_persona.fecha_creacion, tbl_persona.direccion 
                // FROM `tbl_persona`
                // JOIN `tbl_usuario` ON tbl_persona.codigo_persona = tbl_usuario.cod_persona
                // JOIN `tbl_sexo` ON tbl_persona.cod_sexo = tbl_sexo.codigo_sexo
                // JOIN `tbl_tipo_usuario` ON tbl_usuario.cod_tipo_usuario = tbl_tipo_usuario.codigo_tipo_usuario
                // $buscar";


                //     $result = mysqli_query($conn, $sql);
        
                    //* Ciclo para mostrar los registros
                    while ($row = mysqli_fetch_assoc($busqueda)){ 
                    ?>
                    <tr>
                        <td><?php echo $row["codigo_persona"] ?></td>
                        <td><?php echo $row["identificacion"] ?></td>
                        <td><?php echo $row["primer_nombre"] . " " . $row["segundo_nombre"]; ?></td>
                        <td><?php echo $row["primer_apellido"] . " " . $row["segundo_apellido"]; ?></td>
                        <?php
                        // Supongamos que $row["telefono"] contiene el número de teléfono
                        $telefono = $row["telefono"];

                        // Asegurémonos de que solo tengamos dígitos
                        $telefono = preg_replace('/[^0-9]/', '', $telefono);

                        // Verifiquemos si el número de teléfono tiene 10 dígitos
                        if (strlen($telefono) >= 7) {
                            // Formateemos el número con guiones
                            $telefono_formateado = substr($telefono, 0, 3) . '-' . substr($telefono, 3, 3) . '-' . substr($telefono, 6, 4);
                            echo '<td>' . $telefono_formateado . '</td>';
                        } else {
                            // Si no tiene 10 dígitos, simplemente mostramos el número sin formato
                            echo '<td>' . $telefono . '</td>';
                        }
                        ?>
                        <td><?php echo $row["correo"] ?></td>
                        <td><?php echo $row["sexo"] ?></td>
                        <td><?php echo $row["fecha_nacimiento"] ?></td>
                        <td><?php echo $row["direccion"] ?></td>
                        <td><?php echo $row["usuario"] ?></td>
                        <td><?php echo $row["fecha_creacion"] ?></td>
                        <td><?php echo $row["tipo_usuario"] ?></td>
                        
                        <td
                            style="display:grid; grid-template-columns: repeat(2,1fr); padding-top:15px; padding-bottom:15px;">

                            <!-- //* Ingresar al formulario para modificar los datos del admin -->
                            <form method="POST" action="formulario_modi_admin.php">
                                <a href="formulario_modi_admin.php?id=<?php echo $row['identificacion'];?>" type="botton"
                                    class="botones"
                                    style="text-decoration:none !important; color:white; margin-right:5px; background-color: #FFCC03 !important;">Editar</a>
                            </form>

                            <!-- //* Coneccion con la funcion para eliminar el registro -->
                            <form method="POST" class="eliminarForm" style="margin-top:-13px;">
                                <input type="hidden" name="id_a_eliminar" class="id_a_eliminar_input"
                                    style="margin-top:5% !important;" value="<?php echo $row['identificacion']; ?>">
                                <button type="submit" name="registro_eliminar" class="botones eliminarBtn" style="background-color:red;">
                                    Eliminar
                                </button>
                            </form>
                        </td>
                    </tr>
                    <?php    
                }
                ?>
                </tbody>
            </table>
        </div>
    </div>
    <!-- //TODO: Fin de la tabla de los administradores -->

    <!-- //! paginacion -->
<div class="container-fluid" style="display:flex; justify-content:center; text-align:center; margin-top:-5%;">
    <ul class="pagination pg-dark justify-content-center pb-5 pt-5 mb-0" style="float:none;">
        <?php
        $pagina = $_REQUEST["nume"];
        $ultima = ceil($num_registros / $registros);

        if ($_REQUEST["nume"] > 1) {
            // página anterior
            echo "<li class='page-item'><a class='page-link' href='/agrocosecha_final/vista_corp/assets/vistas/administrador/admin_admin_tabla.php?nume=" . ($_REQUEST["nume"] - 1) . "' aria-label='Previous'><span aria-hidden='true'>&laquo;</span></a></li>";
        }
        

        // Enlace a la página anterior
        if ($pagina > 1) {
            echo "<li class='page-item'><a class='page-link' href='/agrocosecha_final/vista_corp/assets/vistas/administrador/admin_admin_tabla.php?nume=" . ($pagina - 1) . "'>" . ($pagina - 1) . "</a></li>";
        }

        // Enlace a la página actual
        echo "<li class='page-item active'><a class='page-link'>" . $pagina . "</a></li>";

        // Enlace a la página siguiente
        if ($pagina < $ultima) {
            echo "<li class='page-item'><a class='page-link' href='/agrocosecha_final/vista_corp/assets/vistas/administrador/admin_admin_tabla.php?nume=" . ($pagina + 1) . "'>" . ($pagina + 1) . "</a></li>";
        }

        if ($pagina < $paginas && $paginas > 1) {
    // página siguiente
    echo "<li class='page-item'><a class='page-link' href='/agrocosecha_final/vista_corp/assets/vistas/administrador/admin_admin_tabla.php?nume=" . ($pagina + 1) . "' aria-label='Next'><span aria-hidden='true'>&raquo;</span></a></li>";
}


        echo "<li class='page-item'><a class='page-link' aria-label='Next'>" . $ultima . " Paginas</a></li>";
        ?>
    </ul>
</div>
<!-- //! fin paginacion -->




    <!-- Scripts de Bootstrap (jQuery y Popper.js son necesarios para Bootstrap) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.min.js"></script>

    <!-- //* alerta eliminar registro -->
    <?php
    include "../../controladores/alerta_eliminar.php";
    ?>

</body>

</html>