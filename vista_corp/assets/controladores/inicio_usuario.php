<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agrocoseca</title>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link rel="shortcut icon" type="image/x-icon" href="/agrocosecha_final/vista_corp/assets/img/Size-16.png">
</head>
<body>
<?php
    session_start();
	include "../vista_corp/config/SERVER.php";
	include "../vista_corp/config/database.php";

    if($_POST){

        $usuario = $_POST['usuario'];
        $password = $_POST['contraseña'];
        
        $sql = "SELECT codigo_usuario, usuario, contraseña, cod_tipo_usuario from tbl_usuario where usuario='$usuario'";
        $resultado = $mysqli->query($sql);
        $num = $resultado->num_rows;

        if($num > 0){
            $row= $resultado->fetch_assoc();
            $password_bd = $row['contraseña'];
            $pass_c = sha1($password);

            if($password_bd == $pass_c){

                
                $_SESSION['codigo_usuario'] = $row['codigo_usuario'];
                $_SESSION['usuario'] = $row['usuario'];
                $_SESSION['cod_tipo_usuario'] = $row['cog_tipo_usuario'];
                if (isset($_SESSION['cod_tipo_usuario']) && $_SESSION['cod_tipo_usuario'] == "1") {
                    header("Location: /agrocosecha_final/vista_corp/assets/vistas/administrador/admin_admin_tabla.phpp");
                    session_start();
                    $_SESSION['msj_inicio_sesion'] = "Sesion iniciada";
                } else {
                    header("Location: /agrocosecha_final/index.php");
                    session_start();
                    $_SESSION['msj_inicio_sesion'] = "Sesion iniciada";
                } 
                
                exit;

            } else{
                echo '<script>
                    Swal.fire({
                        title: "contraseña incorrecta",
                        text: "",
                        icon: "error"
                    }).then(function() {
                        window.location.replace("");
                    });
                </script>';
                
            }

        }else{
            echo '<script>
                    Swal.fire({
                        title: "No existe este usuario",
                        text: "",
                        icon: "error"
                    }).then(function() {
                        window.location.replace("");
                    });
                </script>';
            // echo "No existe ese usuario";
        }

    }
    
?>
</body>
</html>
