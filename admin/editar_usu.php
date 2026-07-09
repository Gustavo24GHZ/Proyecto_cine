<?php
    session_start();

        if ($_SESSION['tipo_usu'] <> 1) {
        session_destroy();
        header("Location: ../../index.html");
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Estudiante</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">

</head>
<body style="background-color: lightgray;">
            <ul class="nav justify-content-end bg-primary">
        <li class="nav-item">
            <a class="nav-link active text-white" aria-current="page" href="dashboard.php">Dashboard</a>
        </li>
        <li class="nav-item">
            <a class="nav-link text-white" href="estudiantes.php">Estudiantes</a>
        </li>
        <li class="nav-item">
            <a class="nav-link text-white" href="#">Profesores</a>
        </li>
        <li class="nav-item">
            <a href="../logout.php" class="nav-link text-white">Cerrar Sesion(<?php echo $_SESSION['nombre_usu'];?>)</a>
        </li>
        </ul>

        <div class="container text-center mt-5">
            <h1>Editar Estudiante</h1>
        </div>

        <?php 
        $id_est = base64_decode($_GET['id']);

        $mysql = new mysqli("localhost", "root","", "escuela1bd");
        $consulta_buscar = "SELECT * FROM estudiantes WHERE (id LIKE '$id_est')";
        $resultado_busqueda = $mysql->query($consulta_buscar);
        $filas_busqueda= $resultado_busqueda->fetch_assoc();
        ?>

        <div class="container mt-5">
            <div class="card">
                <div class="card-body">

                <?php 
                if ($resultado_busqueda->num_rows == 1) {
                ?>

            <form action="editar.php" method="POST">

    <div class="container text-center">
    <div class="row">
        <div class="col">
        <label for=""><b>Nombres</b></label>
        <input type="text" class="form-control" name="nombres_est" value="<?php echo $filas_busqueda ['nombres']?>" placeholder="Ingrese los nombres" maxlength="60" >
    </div>
    <div class="col">
        <label for=""><b>Apellidos</b></label>
        <input type="text" class="form-control" name="apellidos_est" value="<?php echo $filas_busqueda ['apellidos']?>" placeholder="Ingrese los apellidos" maxlength="60" >
    </div>
    </div>
</div>

            <div class="container text-center">
    <div class="row">
        <div class="col-4">
        <label for=""><b>Cedula</b></label>
        <input type="number" class="form-control" name="cedula_est" value="<?php echo $filas_busqueda ['cedula']?>" placeholder="Ingrese la cedula" maxlength="8" required>
    </div>
    <div class="col">
        <label for=""><b>Correo</b></label>
        <input type="email" class="form-control" name="correo_est" value="<?php echo $filas_busqueda ['correo']?>" placeholder="Ingrese el correo" maxlength="40" required>
    </div>
    </div>
</div>

<div class="container text-center">
    <div class="row">
        <div class="col">
        <label for=""><b>Telefono</b></label>
        <input type="text" class="form-control" name="telefono_est" value="<?php echo $filas_busqueda ['telefono']?>" placeholder="Ingrese el telefono" maxlength="15" required>
    </div>
</div>
</div> 
                    <div class="text-center mt-4">
                        <a href="estudiantes.php"><button class="btn btn-danger" type="button">Cancelar</button></a>
                        <button class="btn btn-secondary" type="reset">Borrar</button>
                        <button class="btn btn-primary" type="submit">Guardar Cambios</button>
                    </div>

        <input type="hidden" name="id_est" value="<?php echo $id_est;?>">

    </form>

                <?php
                } else {
                    echo '<div class="alert alert-danger text-center" role="alert">No se encontró el estudiante.</div>';
                }
                ?>

                </div>
            </div> 
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
</body>
</html>