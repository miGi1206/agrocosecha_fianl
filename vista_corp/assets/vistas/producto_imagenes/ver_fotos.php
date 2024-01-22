<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <a href="./admin_producto_tabla.php"><b>Volver</b></a>
    <?php
    //!Conctarse a la base de datos
    include "../../conections/coneccion_tabla.php";

    $id_foto = (int) filter_var($_REQUEST['id_foto'], FILTER_SANITIZE_NUMBER_INT);

    $sqlQuery = $sql = "SELECT p.*, f.* FROM tbl_producto AS p INNER JOIN imagen_producto AS f
    ON p.id = f.id_producto AND p.id = {$id_foto}";
    $result = mysqli_query($conn, $sqlQuery);
    ?>

    <div class="container">
        <?php
        while ($data_fotos = mysqli_fetch_array($result)){?>
            <img src="../../img/img_productos/<?php echo $data_fotos["foto"] ?>" alt="">
        <?php
        }
        ?>
    </div>
</body>
</html>
