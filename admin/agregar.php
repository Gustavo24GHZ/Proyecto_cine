<?php
session_start();

$mysql = new mysqli("localhost", "root", "", "escuela1bd");


$nombres_est   = $_POST['nombres_est'];
$apellidos_est = $_POST['apellidos_est'];
$cedula_est    = $_POST['cedula_est'];
$correo_est    = $_POST['correo_est'];
$telefono_est  = $_POST['telefono_est'];

if (empty($_POST['nombres_est']) || empty($_POST['apellidos_est']) || empty($_POST['cedula_est']) || empty($_POST['correo_est']) || empty ($_POST['telefono_est'])) {
    echo '<script>alert ("debe completar todos los campos ");window.location.href="agregar_estudiante.php";</script>';
} else {
    $insercion = "INSERT estudiantes SET

    nombres='$nombres_est',
    apellidos='$apellidos_est',
    cedula='$cedula_est', 
    correo='$correo_est', 
    telefono='$telefono_est'
";

$resultado = $mysql->query($insercion);

        if($resultado) {
    echo '<script>alert("Estudiante actualizado correctamente");window.location.href="estudiantes.php";</script>';
    } else {
    echo '<script>alert("Error al actualizar estudiante");window.location.href="estudiantes.php";</script>';
    }
}

$mysql->close();
?>
