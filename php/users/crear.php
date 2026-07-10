<?php
session_start();

$mysql = new mysqli("localhost", "root", "", "cine_db");


$nombre_usuario = $mysql->real_escape_string($_POST['nombre_usuario']);
$correo_usuario = $mysql->real_escape_string($_POST['correo_usuario']);
$password = $_POST['password'];
$tipo_usuario = 2;
$activo= 1;

if (empty($_POST['nombre_usuario']) || empty($_POST['correo_usuario']) || empty($_POST['password'])) {
    echo '<script>alert("Debe completar todos los campos");window.location.href="crear_usu.php";</script>';
} else {
    $password_hash = password_hash($password, PASSWORD_DEFAULT);
    $insercion = "INSERT INTO usuarios_cine (nombre_usuario, correo_usuario, password, tipo_usuario, activo) VALUES ('$nombre_usuario', '$correo_usuario', '$password_hash', '$tipo_usuario', '$activo')";

    $resultado = $mysql->query($insercion);

    if ($resultado) {
        echo '<script>alert("Usuario agregado correctamente");window.location.href="../../login.php";</script>';
    } else {
        echo '<script>alert("Error al agregar usuario");window.location.href="crear_usu.php";</script>';
    }
}

$mysql->close();
?>
