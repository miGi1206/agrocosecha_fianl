<?php
    session_start();
	include "../vista_corp/config/SERVER.php";
	include "../vista_corp/config/database.php";

    if($_POST){

        $usuario = $_POST['usuario'];
        $password = $_POST['password'];
        
        $sql = "SELECT id, usuario, `password`, tipo_usuario from tbl_usuarios where usuario='$usuario'";
        $resultado = $mysqli->query($sql);
        $num = $resultado->num_rows;

        if($num > 0){
            $row= $resultado->fetch_assoc();
            $password_bd = $row['password'];
            $pass_c = sha1($password);

            if($password_bd == $pass_c){

                
                $_SESSION['id'] = $row['id'];
                $_SESSION['usuario'] = $row['usuario'];
                $_SESSION['tipo_usuario'] = $row['tipo_usuario'];
                if (isset($_SESSION['tipo_usuario']) && $_SESSION['tipo_usuario'] == "1") {
                    
                    header("Location: /agrocosecha_final/vista_corp/assets/vistas/mensaje/admin_mensaje.php");
                } else {
                    header("Location: /agrocosecha_final/index.php");
                } 
                
                exit;

            } else{
                echo "La contraseña no coincide";
            }

        }else{
            echo "No existe ese usuario";
        }

    }
    
?>