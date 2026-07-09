<?php

use Dompdf\Dompdf;
use Dompdf\Options;

ob_start();

require_once '../../dompdf/autoload.inc.php';

$mysql = new mysqli("localhost", "root", "", "escuela1bd");
$consulta = "SELECT * FROM estudiantes";
$resultado = $mysql->query($consulta);
$filas = $resultado->fetch_all(MYSQLI_ASSOC);
$mysql->close();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Estudiantes</title>

    <style>
        thead{
            background-color: #0e84f3; 
        }
        table,th,td{
            border: 1px black solid;
            border-collapse:collapse;
            text-align:center;
        }
        body{
            font-family:Arial,helvetica,sans-serif;
        }
        .container{
            overflow:auto;
        }
        .seccion1{
            width: 50%;
            box-sizing: border-box;
            font-size:12px;
            text-align:center;
            float:left;
        }
        .seccion2{
            width: 50%;
            box-sizing: border-box;
            font-size:12px;
            text-align:center;
            float:right;
        }
        td{
            font-size:12px; 
        }
    </style>

</head>
<body>

    <div class="container">
        <div class="seccion1">
            <?php $ima = base64_encode(file_get_contents('../../img/logoescuela.png')); ?>
            <img src="data:image/png;base64,<?php echo $ima;?>" alt="" width="65">
        </div>
        <div class="seccion2">REPUBLICA BOLIVARIANA DE VENEZUELA<br>MINISTERIO DE EDUCACION<br>ESCUELA "LA ESCUELITA"<br>MARACAIBO, ESTADO ZULIA</div>
    </div>
<br><br><br><br><br><br><br><br>
<div align="center">
    <h1>Lista de Estudiantes</h1>
</div>

    <table border="1">
        <thead>
            <tr class="table-primary text-white">
                <th>#</th>
                <th>NOMBRES</th>
                <th>APELLIDOS</th>
                <th>CEDULA</th>
                <th>TELEFONO</th>
                <th>CORREO</th>
            </tr>
        </thead>
        <tbody>
        <?php
            $num = 1;
            foreach ($filas as $fila) {
        ?>
            <tr>
                <td><?php echo $num++; ?></td>
                <td><?php echo $fila['nombres']; ?></td>
                <td><?php echo $fila['apellidos']; ?></td>
                <td><?php echo $fila['cedula']; ?></td>
                <td><?php echo $fila['telefono']; ?></td>
                <td><?php echo $fila['correo']; ?></td>
            </tr>
        <?php
            }
        ?>
        </tbody>
    </table>
</body>
</html>

<?php

$html = ob_get_clean();

$options = new Options();
$options->set('defaultFont', 'Courier');

$dompdf = new Dompdf($options);
$dompdf->loadHtml($html);
$dompdf->setPaper('letter');
$dompdf->render();
$dompdf->stream('lista_estudiantes.pdf', array('Attachment' => false));

?>