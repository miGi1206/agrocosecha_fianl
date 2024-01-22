<?php
    session_start();

    // Cerrar la sesión
    session_unset();
    session_destroy();

    // Redirigir a la página de inicio de sesión
    header("Location: ../index.php");
    exit;
?>
