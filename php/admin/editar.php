<?php 
    session_start();

$mysql = new mysqli("localhost", "root","", "cine_db");

$id_est = $_POST['id_est'];
$nombre_usuario = $mysql->real_escape_string($_POST['nombre_usuario']);
$correo_usuario = $mysql->real_escape_string($_POST['correo_usuario']);
$tipo_usuario = $mysql->real_escape_string($_POST['tipo_usuario']);

if (empty($_POST['nombre_usuario']) || empty($_POST['correo_usuario']) || empty($_POST['tipo_usuario'])) {
    echo '<script>alert("Debe completar todos los campos");window.location.href="usuarios.php";</script>';
} else {

$edicion = "UPDATE usuarios SET
    nombre_usuario='$nombre_usuario',
    correo_usuario='$correo_usuario',
    tipo_usuario='$tipo_usuario'
    WHERE id='$id_est'
";

$resultado = $mysql->query($edicion);

    if($resultado) {
        echo '<script>alert("Usuario actualizado correctamente");window.location.href="usuarios.php";</script>';
    } else {
        echo '<script>alert("Error al actualizar usuario");window.location.href="usuarios.php";</script>';
    }
}

$mysql->close();
?>
