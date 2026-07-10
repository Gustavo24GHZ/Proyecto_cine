<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>php</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <link rel="stylesheet" href="styles.css">

</head>
<body style="background-color: #030303;">
    <div class="container-fluid d-flex justify-content-center align-items-center" style="height: 100vh;">

        <div class="card" style="width: 18rem; background-color: #363535 ;">
            <div class="card-header text-center fs-4 bg-danger text-white" >Iniciar Sesion</div>
                <div class="card-body">
                    <form action="auth.php" method="post">
                    <label for=""><b>Usuario</b></label>
                    <input type="text" class="form-control" placeholder="correo electronico" name="usuario" required> 
                    <br>
                    <label for=""><b>contraseña</b></label>
                    <div class="input-group">
                        <input type="password" class="form-control" placeholder="password" name="contrasena" id="contrasenaLogin" required>
                        <button class="btn btn-outline-secondary" type="button" onclick="togglePassword('contrasenaLogin', this)">Mostrar</button>
                    </div>
                        <div class="text-center mt-4">
                        <button  type="submit" class="btn btn-primary">Entrar</button>
                        <br><br>
                        <a href="php/users/crear_usu.php" >no tienes cuenta?<br> crear cuenta</a>
                        </div>
                    </form>
                </div>
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