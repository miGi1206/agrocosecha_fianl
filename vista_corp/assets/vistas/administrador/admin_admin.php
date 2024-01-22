<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Agrocosecha</title>
    <link rel="website icon" type="jpg" href="imagenes/Size-16.jpg">
    <link rel="stylesheet" href="../../css/admin_cliente.css">
    <link rel="stylesheet" href="../../css/navbar_cliente.css">
    <link href="https://unpkg.com/ionicons@4.5.10-0/dist/css/ionicons.min.css" rel="stylesheet">
    <!-- Enlace al archivo CSS de Bootstrap 5 -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css">
</head>
<body>
    <?php 
    include "../../conections/coneccion_tabla.php";
    include "../../controladores/eliminar_cliente.php"; 
    include "../../modelos/navbar_admin.php";
    ?>

    <!-- Navbar -->
    
    
    <h1>Clientes</h1>
    <div class="buscar">
        <input class="barra" placeholder="Buscar por identificación, nombres, usuario, etc.">
    </div>       
    <div class="contenedor">
        <button class="boton-registrar"><a href="./assets/vistas/administrador/formulario_admin.php" class="text-decoration-none" style="color:white;"><b>Registrar</b></a></button>
        <table>
            <thead>
                <tr>
                    <th>Identificación</th>
                    <th>Nombres</th>
                    <th>Usuario</th>
                    <th>Contraseña</th>
                    <th>Correo</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    $sql = "SELECT * FROM `tbl_cliente`";
                    $result = mysqli_query($conn,$sql);
                    while ($row = mysqli_fetch_assoc($result)){ 
                    ?>
                    <tr> 
                        <td><?php echo $row["id"] ?></td>
                        <td><?php echo $row["nombre"] ?></td>
                        <td><?php echo $row["usuario"] ?></td>
                        <td><?php echo $row["contraseña"] ?></td>
                        <td><?php echo $row["correo"] ?></td>
                        <td>
                        <form method="post" action="formulario_modi_admin.php">
                            <a href="./assets/vistas/cliente/formulario_modi_cliente.php?id=<?php echo $row['id'];?>" type="botton" class="botones">Editar</a>
                        </form>
                        <form method="post">
                            <input type="hidden" name="id_a_eliminar" value="<?php echo $row['id']; ?>">
                            <button type="submit" name="registro_eliminar" class="botones">Eliminar</button>
                        </form>
                        </td>
                    </tr>   
                <?php    
                }
                ?>
            </tbody>
        </table>
    </div>
    <div class="container d-flex justify-content-center align-items-center">
            <div class="btn-group me-2" role="group" aria-label="First group">
                <button type="button" class="btn btn-color ">1</button>
                <button type="button" class="btn btn-color ">2</button>
                <button type="button" class="btn btn-color ">3</button>
                <button type="button" class="btn btn-color ">4</button>
            </div>
    </div>


    <!-- Scripts de Bootstrap (jQuery y Popper.js son necesarios para Bootstrap) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.min.js"></script>

</body>
</html>
