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
    <title>Agregar Usuario</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">

</head>
<body >
            <ul class="nav justify-content-end bg-primary">
        <li class="nav-item">
            <a class="nav-link active text-white" aria-current="page" href="dashboard.php">Dashboard</a>
        </li>
        <li class="nav-item">
            <a class="nav-link text-white" href="usuarios.php">Usuarios</a>
        </li>
        <li class="nav-item">
            <a href="../logout.php" class="nav-link text-white">Cerrar Sesion(<?php echo $_SESSION['nombre_usu'];?>)</a>
        </li>
        </ul>

        <div class="container text-center mt-5">
            <h1> Agregar Usuario</h1>
        </div>

        <div class="container-fluid d-flex justify-content-center align-items-center" style="height: 75vh;" >
            <div class="card"  style="width: 25rem; background-color: #6d6d6d;">
                <div class="card-body">

            <form action="agregar.php" method="POST">

    <div class="container text-center">
    <div class="row">
        <div class="col">
        <label for=""><b>Nombre y apellido</b></label>
        <input type="text" class="form-control" name="nombre_usuario" placeholder="Ingrese su nombre y apellidos" maxlength="60" required>
</div>
    </div>
</div>
<br>

<div class="container text-center">
    <div class="row">
        <div class="col">
        <label for=""><b>Correo</b></label>
        <input type="text" class="form-control" name="correo_usuario" placeholder="Ingrese su correo" maxlength="60" required>
        </div>
    </div>
</div>
<br>

<div class="container text-center">
    <div class="row">
        <div class="col">
        <label for=""><b>Contraseña</b></label>
        <input type="password" class="form-control" name="password" placeholder="Ingrese su Contraseña" maxlength="60" required>
        </div>
    </div>
</div>
<br>

        <div class="container text-center">
        <label for=""><b>Tipo de usuario</b></label>
        <select name="tipo_usuario" id="tipo_usuario" class="form-control" required>
            <option value="">Seleccione una opción</option>
            <option value="1">administrador</option>
            <option value="2">usuario</option>
        </select>
        </div>

</div> 
                    <div class="text-center m-3">
                        <a href="usuarios.php"><button class="btn btn-danger" type="button">Cancelar</button></a>
                        <button class="btn btn-secondary" type="reset">Borrar</button>
                        <button class="btn btn-primary" type="submit">Agregar</button>
                    </div>
    </form>
                </div>
            </div> 
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
</body>
</html>