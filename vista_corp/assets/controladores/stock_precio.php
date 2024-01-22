<?php
if (isset($_SESSION['tipo_usuario']) && $_SESSION['tipo_usuario'] == "3") {
    if (isset($result_stock) && $result_stock->num_rows > 0) {
        while ($row_stock = $result_stock->fetch_assoc()) {
            echo "<p><b>Stock de $producto_nombre: " . $row_stock["stock"] . " unidades</b></p>";
        }
    }
}
if (isset($_SESSION['tipo_usuario']) && $_SESSION['tipo_usuario'] == "2") {
    if (isset($result_precio) && $result_precio->num_rows > 0) {
        while ($row_precio = $result_precio->fetch_assoc()) {
            echo "<p><b>Precio de $producto_nombre: "."$". $row_precio["precio"] . "</b></p>";
        }
    }
}
?>