<?php
include "../../conections/coneccion_tabla.php";

$id = $_POST['identificacion'];
$nombre = $_POST['nombre'];
$descripcion = $_POST['descripcion'];
$precio = $_POST['precio'];
$fecha_registro = date('Y-m-d');
$stock = $_POST['stock'];

$dir_local = "../../img/img_productos";

if (!file_exists($dir_local)) {
    mkdir($dir_local, 0777, true);
}

if (isset($_POST['guardar_producto']) && count($_FILES['fotos']['name']) > 0) {
    $sql = "INSERT INTO tbl_producto (id, nombre, descripcion, precio, fecha_registro, stock) 
            VALUES ('{$id}','{$nombre}','{$descripcion}','{$precio}','{$fecha_registro}','{$stock}')";

    if (mysqli_query($conn, $sql)) {
        foreach ($_FILES['fotos']['name'] as $i => $name) {
            if (strlen($_FILES['fotos']['name'][$i]) > 1) {
                $file_name = $_FILES['fotos']['name'][$i];
                $sourse_foto = $_FILES['fotos']['tmp_name'][$i];
                $tamaño_foto = $_FILES['fotos']['size'][$i];
                $restriccion_tamaño = 500; //MB

                if ((($tamaño_foto / 1024) / 1024) <= $restriccion_tamaño) {
                    $nuevo_nombre_file = md5(uniqid(rand()));
                    $extension_foto = pathinfo($file_name, PATHINFO_EXTENSION);
                    $nombre_foto = $nuevo_nombre_file . '/' . $nombre . '.' . $extension_foto;

                    $target_dir = $dir_local . '/' . $nuevo_nombre_file;
                    if (!file_exists($target_dir)) {
                        mkdir($target_dir, 0777, true);
                    }

                    $result_foto = $dir_local . '/' . $nombre_foto;

                    move_uploaded_file($sourse_foto, $result_foto);

                    $insert_image_sql = "INSERT INTO imagen_producto (foto, id_producto) VALUES ('{$nombre_foto}','{$id}')";
                    mysqli_query($conn, $insert_image_sql);
                } else {
                    echo '<p style="color:red;">Existe una foto que supera el peso máximo de ' . $tamaño_foto . '</p>';
                }
            }
        }
        header("Location: ../../vistas/producto/admin_producto_tabla.php");
    } else {
        echo "Error en la consulta: " . mysqli_error($conn);
    }
}

mysqli_close($conn);
?>
