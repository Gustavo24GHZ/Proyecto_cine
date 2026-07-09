<?php 
    session_start();

$mysql = new mysqli("localhost", "root","", "escuela1bd");

$id_est        =$_POST['id_est'];
$nombres_est   = $_POST['nombres_est'];
$apellidos_est = $_POST['apellidos_est'];
$cedula_est    = $_POST['cedula_est'];
$correo_est    = $_POST['correo_est'];
$telefono_est  = $_POST['telefono_est'];

if (empty($_POST['nombres_est']) || empty($_POST['apellidos_est']) || empty($_POST['cedula_est']) || empty($_POST['correo_est']) || empty ($_POST['telefono_est'])) {
    echo '<script>alert ("debe completar todos los campos ");window.location.href="estudiantes.php";</script>';
} else {

$edicion = "UPDATE estudiantes SET

    nombres='$nombres_est',
    apellidos='$apellidos_est',
    cedula='$cedula_est', 
    correo='$correo_est', 
    telefono='$telefono_est'

    WHERE id='$id_est'
";

$resultado = $mysql->query($edicion);

        if($resultado) {
    echo '<script>alert("Estudiante actualizado correctamente");window.location.href="estudiantes.php";</script>';
    } else {
    echo '<script>alert("Error al actualizar estudiante");window.location.href="estudiantes.php";</script>';
    }
}

$mysql->close();
?>
