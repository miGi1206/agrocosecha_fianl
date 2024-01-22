<?php
session_start();

// Cerrar la sesión
session_unset();
session_destroy();

// Evitar caché del navegador
header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
header("Pragma: no-cache");
header("Expires: Sat, 26 Jul 1997 05:00:00 GMT");

// Redirigir a la página de inicio de sesión
header("Location: /agrocosecha_final/index.php");
exit;
?>
