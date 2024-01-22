<?php
    $mysqli = new mysqli(SERVER, USER, PASS, DB);

    if ($mysqli->connect_error) {
        die('Error de Conexión (' . $mysqli->connect_errno . ') ' . $mysqli->connect_error);
    }
?>