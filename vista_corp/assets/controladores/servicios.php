<?php
if (isset($_SESSION['tipo_usuario']) && $_SESSION['tipo_usuario'] == "2") {
    if (isset($result_precio) && $result_precio->num_rows > 0) {
        while ($row_precio = $result_precio->fetch_assoc()) {
            echo "<p><b>Precio del servicio: $".$row_precio["precio"] . "</b></p>";
        }
    }
}
if (isset($_SESSION['tipo_usuario']) && $_SESSION['tipo_usuario'] == "2") {
    if (isset($result_duracion) && $result_duracion->num_rows > 0) {
        while ($row_duracion = $result_duracion->fetch_assoc()) {
            echo "<p><b>duracion del servicio: ". $row_duracion["duracion"] . " horas</b></p>";
        }
    }
}
?>