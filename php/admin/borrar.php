<?php

$mysql = new mysqli("localhost", "root", "", "cine_db");

if (!isset($_GET['id']) || empty($_GET['id'])) {
    echo '<script>alert("No se recibió el identificador del usuario");window.location.href="usuarios.php";</script>';
    exit;
}

if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
    echo '<script>alert("No se recibió un identificador válido");window.location.href="usuarios.php";</script>';
    exit;
}

$id_usuario = intval($_GET['id']);

$eliminacion = "DELETE FROM usuarios_cine WHERE id = '$id_usuario'";
$resultado = $mysql->query($eliminacion);

if($resultado) {
    echo '<script>alert("Usuario eliminado correctamente");window.location.href="usuarios.php";</script>';
    } else {
    echo '<script>alert("Error al eliminar usuario");window.location.href="usuarios.php";</script>';
    }

    $mysql->close();
?>