<?php

$mysql = new mysqli("localhost", "root", "", "escuela1bd");

$id_est = base64_decode($_GET['id']);

$eliminacion = "DELETE FROM estudiantes WHERE id = $id_est";
$resultado = $mysql->query($eliminacion);

if($resultado) {
    echo '<script>alert("Estudiante Eliminado correctamente");window.location.href="estudiantes.php";</script>';
    } else {
    echo '<script>alert("Error al eliminar estudiante");window.location.href="estudiantes.php";</script>';
    }

    $mysql->close();
?>