<?php
    session_start();
    if(!isset($_SESSION['usuario'])){
        header("Location: /agrocosecha_final/index.php");
        exit();
    }
    
    
?>
<?php 

    //! Conectarse con la base de datos
    include("../../conections/coneccion_tabla.php");

    //! traer el ID de la base de datos
    $id=$_GET["id"];

    //! Consulta para traer la informacion del cliente
    $sql="SELECT * FROM tbl_producto WHERE `tbl_producto`.`codigo_producto`='$id'";
    $query=mysqli_query($conn, $sql);

    $row=mysqli_fetch_array($query);
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

    <!--//TODO: formulario de registro de cliente -->
    <div class="formulario-contacto">
        <div style="text-align: center;">
            <h3 class="text-success h1 formulario"><b>Modificar Producto</b></h3>
        </div>
        <form action="../../controladores/producto/modificar_producto.php" method="POST">
        
            <div class="form-floating mb-3" style="margin-top:15px;">
                <input name="codigo_producto" type="text" class="form-control cuadro_texto1" id="codigo_producto" placeholder="codigo_producto" value="<?= $row['codigo_producto']?>" readonly required>
                <label for="codigo_producto">Codigo:</label>
                <div id="result_codigo_producto" style="color:red; font-size:15px;"></div>
            </div>

            <div class="form-floating mb-3" style="margin-top:15px; margin-bottom:15px !important;">
                <input name="nombre" type="text" class="form-control cuadro_texto1" id="nombre" placeholder="Nombre" value="<?= $row['nombre']?>" required maxlength="50">
                <label for="nombre">Nombre:</label>
                <div id="result_nombre" style="color:red; font-size:15px;"></div>
            </div>

            <div class="form-group">
                <label for="descripcion">Descripción:</label>
                <textarea type="text" id="descripcion" name="descripcion" rows="4" required><?= $row['descripcion']?></textarea>
            </div>
            
            <div style="display:grid; grid-template-columns: repeat(2,1fr) ;">
                <div class="form-floating mb-3" style="margin-top:15px; margin-right: 5%;">
                    <input name="precio" type="text" class="form-control cuadro_texto1" id="precio" placeholder="precio" value="<?= $row['precio']?>" required maxlength="15">
                    <label for="precio">Precio:</label>
                <div id="result_precio" style="color:red; font-size:15px;"></div>
                </div>

                <div class="form-floating mb-3" style="margin-top:15px;">
                    <input name="stock" type="text" class="form-control cuadro_texto1" id="stock" placeholder="stock" value="<?= $row['stock']?>" required maxlength="11">
                    <label for="stock">Stock:</label>
                <div id="result_stock" style="color:red; font-size:15px;"></div>
                </div>
            </div>

            <!-- //TODO: aqui va el campo para el video-->
            <div class="form-floating mb-3" style="margin-top:15px;">
                <input name="video" type="text" class="form-control cuadro_texto1" id="floatingInputvideo" placeholder="video" value="<?= $row['video']?>" required>
                <label for="floatingInputvideo">Video:</label>
            </div>

            <button type="submit" class="submit" name="modificar_producto">Actualizar</button>
        </form>
    </div> 
    <!--//TODO: Fin formulario de registro del cliente -->
    

<!-- //! Validacion para solo numeros en el campo del precio -->
<script>
    const precio = document.getElementById('precio');
    const result_precio = document.getElementById('result_precio');

    let lastValidInputprecio = ''; // Variable para almacenar la última entrada válida

    precio.addEventListener('input', (event) => {
        const textValue = event.currentTarget.value;

        if (!isValidInputPrecio(textValue)){
            precio.value = lastValidInputprecio; // Restaurar el último valor válido
            return result_precio.innerHTML = `Este campo solo permite números`;
        } else {
            lastValidInputprecio = textValue; // Actualizar la última entrada válida
        }
        result_precio.innerHTML = '';
    });

    function isValidInputPrecio(text){
        // Verificar si la cadena solo contiene números
        return /^[0-9]*$/.test(text);
    }
</script>

    <!-- //! Validacion para solo numeros en el campo del stock -->
    <script>
    const stock = document.getElementById('stock');
    const result_stock = document.getElementById('result_stock');

    let lastValidInputstock = ''; // Variable para almacenar la última entrada válida

    stock.addEventListener('input', (event) => {
        const textValue = event.currentTarget.value;

        if (!isValidInputStock(textValue)){
            stock.value = lastValidInputstock; // Restaurar el último valor válido
            return result_stock.innerHTML = `Este campo solo permite números`;
        } else {
            lastValidInputstock = textValue; // Actualizar la última entrada válida
        }
        result_stock.innerHTML = '';
    });

    function isValidInputStock(text){
        // Verificar si la cadena solo contiene números
        return /^[0-9]*$/.test(text);
    }
</script>

    <!-- //! Validacion para solo letras y espacios en el campo de nombre -->
<script>
    const nombre = document.getElementById('nombre');
    const result_nombre = document.getElementById('result_nombre');

    let lastValidInputNombre = ''; // Variable para almacenar la última entrada válida

    nombre.addEventListener('input', (event) => {
        const textValue = event.currentTarget.value;

        if (!isValidInputNombre(textValue)){
            nombre.value = lastValidInputNombre; // Restaurar el último valor válido solo si la nueva entrada no es válida
            return result_nombre.innerHTML = `El nombre no puede contener números ni caracteres especiales`;
        } else {
            lastValidInputNombre = textValue; // Actualizar la última entrada válida
        }
        result_nombre.innerHTML = '';
    });

    function isValidInputNombre(text){
        // Verificar si la cadena solo contiene letras y espacios
        return /^[A-Za-zñÑ\s]*$/.test(text);
    }
</script>

</body>
</html>
