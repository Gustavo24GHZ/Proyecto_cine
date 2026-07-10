<?php
    session_start();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nuevo Usuario</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">

</head>
<body style="background-color: #030303;">
        <div class="container text-center mt-5 text-white">
            <h1> Crear Usuario</h1>
        </div>

        <div class="container-fluid d-flex justify-content-center align-items-center" style="height: 75vh;" >
            <div class="card"  style="width: 25rem; background-color: #363535;">
                <div class="card-body">

            <form action="crear.php" method="POST">

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
        <div class="input-group">
            <input type="password" class="form-control" name="password" id="passwordRegistro" placeholder="Ingrese su Contraseña" maxlength="60" required>
            <button class="btn btn-outline-primary" type="button" onclick="togglePassword('passwordRegistro', this)">Mostrar</button>
        </div>
        </div>
    </div>
</div>

</div> 
                    <div class="text-center m-3"> 
                        <a href="../../login.php"><button class="btn btn-danger" type="button">Cancelar</button></a>
                        <button class="btn btn-secondary" type="reset">Borrar</button>
                        <button class="btn btn-primary" type="submit">Agregar</button>
                    </div>
    </form>
                </div>
            </div> 
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
        <script>
            function togglePassword(inputId, button) {
                const input = document.getElementById(inputId);
                if (input.type === 'password') {
                    input.type = 'text';
                    button.textContent = 'Ocultar';
                } else {
                    input.type = 'password';
                    button.textContent = 'Mostrar';
                }
            }
        </script>
</body>
</html>