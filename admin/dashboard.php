<?php
    session_start();

    if ($_SESSION['tipo_usu'] <> 1) {
        session_destroy();
        header("Location: ../../index.html");
    }

    $mysql = new mysqli("localhost", "root","", "escuela1bd");

    $consulta = "SELECT * FROM estudiantes";
    $resultado = $mysql->query($consulta);
    $filas= $resultado->fetch_all(MYSQLI_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>php</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">

</head>
<body style="background-color: lightgray;">
            <ul class="nav justify-content-end bg-primary">
        <li class="nav-item">
            <a class="nav-link active text-white" aria-current="page" href="#">Dashboard</a>
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
            <h1>Bienvenido Administrador <?php echo $_SESSION['nombre_usu'];?></h1>
        </div>

    <div class="container text-center">
<div class="row">
    <div class="col">
        <div class="container-fluid d-flex justify-content-center align-items-center" style="height: 50vh;">
        <div class="card" style="width: 18rem;">
            <div class="card-header text-center fs-4 bg-success text-white">Estudiantes en BD</div>
                <div class="card-body bg-success text-white">
                    <h1>
                        <?php echo count($filas); ?>
                    </h1>
                </div>
            </div>
        </div>
            </div>
    <div class="col">
        <div class="container-fluid d-flex justify-content-center align-items-center" style="height: 50vh;">

        <div class="card" style="width: 18rem;">
            <div class="card-header text-center fs-4 bg-success text-white">Profesores en BD</div>
                <div class="card-body bg-success text-white">
                    <h1>
                        50
                    </h1>
                </div>
        </div>
    </div>
    </div>
</div>
</div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
</body>
</html>