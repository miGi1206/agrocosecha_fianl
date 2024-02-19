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
    <link rel="stylesheet" href="../../css/formulario_registro.css">
    <link href="https://unpkg.com/ionicons@4.5.10-0/dist/css/ionicons.min.css" rel="stylesheet">
    <!-- Enlace al archivo CSS de Bootstrap 5 -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link rel="website icon" type="jpg" href="../../img/Size-16.png">
</head>
<body>

    <?php include "../../conections/coneccion_tabla.php";?>

    <!--//TODO: formulario de registro de cliente -->
    <div class="formulario-contacto">
        <div style="text-align: center;">
            <h3 class="text-success h1 formulario"><b>Registrar servicio</b></h3>
        </div>
        <form action="../../controladores/servicio/registrar_servicio.php" method="POST" >
        
            <div class="form-floating mb-3" style="margin-top:15px;">
                <input name="codigo_servicio" type="number" class="form-control cuadro_texto1" id="floatingInputidentificacion" placeholder="Identificacion" requered>
                <label for="floatingInputidentificacion">Codigo:</label>
            </div>

            <div class="form-group">
                <label for="tipo">Tipo de servicio:</label>
                <select id="tipo" name="tipo">
                <?php
                
                //TODO: Consulta SQL para traer todos los datos de los administradores
                    $sql_tipo_servicio = "SELECT codigo_tipo_servicio ,tipo_servicio FROM `tbl_tipo_servicio`";
                    $result = mysqli_query($conn,$sql_tipo_servicio);
                    

                    //* Ciclo para mostrar los registros
                    while ($row = mysqli_fetch_assoc($result)){
                        echo "<option value='".$row['codigo_tipo_servicio']."'>".$row['tipo_servicio']."</option>"; 
                    }?>               
                </select>
            </div>

            <div class="form-floating mb-3" style="margin-bottom:15px !important; margin-top:15px;">
                <input name="nombre" type="text" class="form-control cuadro_texto1" id="nombre" placeholder="Nombre" requered>
                <label for="nombre">Nombre:</label>
                <div id="result_nombre" style="color:red; font-size:15px;"></div>
            </div>

            <div class="form-group">
                <label for="descripcion">Descripcion:</label>
                <textarea id="descripcion" name="descripcion" rows="4" required></textarea>
            </div>

            <div class="form-floating mb-3" style="margin-top:15px;">
                <input name="precio" type="number" class="form-control cuadro_texto1" id="floatingInputprecio" placeholder="precio" requered>
                <label for="floatingInputprecio">Precio:</label>
            </div>

            <div class="form-floating mb-3" style="margin-top:15px;">
                <input name="duracion" type="number" class="form-control cuadro_texto1" id="floatingInputduracion" placeholder="duracion" requered>
                <label for="floatingInputduracion">Duracion por hora:</label>
            </div>               
            <button type="submit" class="submit" name="guardar_servicio">Guardar</button>
        </form>
    </div>
    <!--//TODO: Fin formulario de registro del cliente -->
</div>

<script src="../../js/validaciones.js"></script>
</body>
</html>
