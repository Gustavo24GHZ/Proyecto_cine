<?php
session_start();

if (!isset($_SESSION['id_usu'])) {
    echo '<script>alert("Inicie Sesion antes de continuar");window.location.href="../../index.html";</script>';
    exit();
}

$nombreUsuario = $_SESSION['nombre_usu'] ?? 'Usuario';
$imagenSeleccionada = $_GET['imagen'] ?? '';
$diaSeleccionado = $_POST['dia'] ?? '';
$horaSeleccionada = $_POST['hora'] ?? '';
$comidaSeleccionada = $_POST['comida'] ?? '';
$bebidaSeleccionada = $_POST['bebida'] ?? '';

$opcionesComida = [
    'sin' => ['label' => 'Sin comida', 'precio' => 0],
    'combo1' => ['label' => 'combo clasico', 'precio' => 8],
    'combo2' => ['label' => 'Combo premium', 'precio' => 12],
];

$opcionesBebida = [
    'sin' => ['label' => 'Sin bebida', 'precio' => 0],
    'agua' => ['label' => 'Agua', 'precio' => 2],
    'refresco' => ['label' => 'Refresco', 'precio' => 3],
    'Nestea' => ['label' => 'Nestea', 'precio' => 4],
];

$precioTotal = 0;
if ($comidaSeleccionada && isset($opcionesComida[$comidaSeleccionada])) {
    $precioTotal += $opcionesComida[$comidaSeleccionada]['precio'];
}
if ($bebidaSeleccionada && isset($opcionesBebida[$bebidaSeleccionada])) {
    $precioTotal += $opcionesBebida[$bebidaSeleccionada]['precio'];
}

$mostrarRecibo = !empty($diaSeleccionado) && !empty($horaSeleccionada);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Compra de Entrada</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body { background: #111; color: #fff; }
        .card { background: #b3b2b2; border: 1px solid #ff2f28; }
        .btn-primary { background-color: #ff2f28; border-color: #ff2f28; }
        .btn-primary:hover { background-color: #d92620; border-color: #d92620; }
        .recibo { background: #fff; color: #1d1d1d; border-radius: 10px; padding: 20px; }
    </style>
</head>
<body>
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="card shadow-lg">
                    <div class="card-body p-4">
                        <h2 class="text-center mb-4">Reserva de entrada</h2>
                        <p class="text-center text-muted">Hola, <?php echo htmlspecialchars($nombreUsuario); ?>. Elige tu horario, día, comida y bebida.</p>

                        <?php if (!empty($imagenSeleccionada)): ?>
                            <div class="text-center mb-4">
                                <img src="../../<?php echo htmlspecialchars($imagenSeleccionada); ?>" alt="Pelicula seleccionada" style="max-width: 180px; border-radius: 10px; border: 2px solid #ff2f28;">
                            </div>
                        <?php endif; ?>

                        <form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">
                            <div class="row g-3">
                                <div class="col-md-6">
                                    <label class="form-label">Día disponible</label>
                                    <select class="form-select" name="dia" required>
                                        <option value="">Seleccione un día</option>
                                        <option value="Lunes" <?php echo ($diaSeleccionado === 'Lunes') ? 'selected' : ''; ?>>Lunes</option>
                                        <option value="Jueves" <?php echo ($diaSeleccionado === 'Jueves') ? 'selected' : ''; ?>>Jueves</option>
                                        <option value="Viernes" <?php echo ($diaSeleccionado === 'Viernes') ? 'selected' : ''; ?>>Viernes</option>
                                        <option value="Sábado" <?php echo ($diaSeleccionado === 'Sábado') ? 'selected' : ''; ?>>Sábado</option>
                                    </select>
                                </div>

                                <div class="col-md-6">
                                    <label class="form-label">Hora disponible</label>
                                    <select class="form-select" name="hora" required>
                                        <option value="">Seleccione una hora</option>
                                        <option value="14:00" <?php echo ($horaSeleccionada === '14:00') ? 'selected' : ''; ?>>14:00</option>
                                        <option value="16:00" <?php echo ($horaSeleccionada === '16:00') ? 'selected' : ''; ?>>16:00</option>
                                        <option value="18:30" <?php echo ($horaSeleccionada === '18:30') ? 'selected' : ''; ?>>18:30</option>
                                        <option value="20:00" <?php echo ($horaSeleccionada === '20:00') ? 'selected' : ''; ?>>20:00</option>
                                    </select>
                                </div>

                                <div class="col-md-6">
                                    <label class="form-label">Comida</label>
                                    <select class="form-select" name="comida">
                                        <?php foreach ($opcionesComida as $valor => $datos): ?>
                                            <option value="<?php echo $valor; ?>" <?php echo ($comidaSeleccionada === $valor) ? 'selected' : ''; ?>><?php echo $datos['label']; ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>

                                <div class="col-md-6">
                                    <label class="form-label">Bebida</label>
                                    <select class="form-select" name="bebida">
                                        <?php foreach ($opcionesBebida as $valor => $datos): ?>
                                            <option value="<?php echo $valor; ?>" <?php echo ($bebidaSeleccionada === $valor) ? 'selected' : ''; ?>><?php echo $datos['label']; ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                            </div>

                            <div class="text-center mt-4">
                                <button type="submit" class="btn btn-primary btn-lg">Comprar</button>
                            </div>
                        </form>

                        <?php if ($mostrarRecibo): ?>
                            <div class="recibo mt-5">
                                <h4 class="text-center mb-3">Recibo de compra</h4>
                                <p><strong>Cliente:</strong> <?php echo htmlspecialchars($nombreUsuario); ?></p>
                                <p><strong>Día:</strong> <?php echo htmlspecialchars($diaSeleccionado); ?></p>
                                <p><strong>Hora:</strong> <?php echo htmlspecialchars($horaSeleccionada); ?></p>
                                <p><strong>Comida:</strong> <?php echo htmlspecialchars($opcionesComida[$comidaSeleccionada]['label'] ?? 'Sin comida'); ?></p>
                                <p><strong>Bebida:</strong> <?php echo htmlspecialchars($opcionesBebida[$bebidaSeleccionada]['label'] ?? 'Sin bebida'); ?></p>
                                <hr>
                                <p class="fs-5"><strong>Total:</strong> $<?php echo number_format($precioTotal, 2); ?></p>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
