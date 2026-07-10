<?php

    session_start();

    $usu = $_POST['usuario'];
    $pass = $_POST['contrasena'];

    if(empty($usu) OR empty($pass)) {
        echo "Por favor, complete todos los campos";
            exit();
    } 

    $mysql = new mysqli("localhost", "root","", "cine_db");

    //if($mysql){
   //     echo "conexion exitosa";
    //}

    $query = "SELECT * FROM usuarios_cine WHERE nombre_usuario = '$usu' OR correo_usuario = '$usu' LIMIT 1";
    $result = $mysql->query($query);

    //echo $result->num_rows;

    if ($result->num_rows == 1) {
        $row = $result->fetch_assoc();

        if (password_verify($pass, $row['password']) || $pass === $row['password']) {
            echo "Bienvenido " . $row['nombre_usuario'];
            $_SESSION['id_usu'] = $row['id'];
            $_SESSION['nombre_usu'] = $row['nombre_usuario'];
            $_SESSION['correo_usu'] = $row['correo_usuario'];
            $_SESSION['tipo_usu'] = $row['tipo_usuario'];

            if ($row['tipo_usuario'] == 1) {
                header("Location:php/admin/dashboard.php");
                exit();
            }

            if ($row['tipo_usuario'] == 2) {
                header("Location:index.html");
                exit();
            }

        }else{
            echo "Contraseña incorrecta";
        }

    } else {
        echo "Usuario no encontrado";
        exit();
    }

$mysql->close();

?>