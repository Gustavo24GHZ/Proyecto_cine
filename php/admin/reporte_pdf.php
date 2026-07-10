<?php

use Dompdf\Dompdf;
use Dompdf\Options;

ob_start();

require_once '../../dompdf/autoload.inc.php';

$mysql = new mysqli("localhost", "root", "", "cine_db");
$consulta = "SELECT * FROM usuarios_cine";
$resultado = $mysql->query($consulta);
$filas = $resultado->fetch_all(MYSQLI_ASSOC);
$mysql->close();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Usuarios</title>

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

        table{
            margin: 60px auto;
            width: 80%;
        }
    </style>

</head>
<body>

    <div class="container">
        <div class="seccion1">
            <?php $ima = base64_encode(file_get_contents('../../img/logo_cine.jpg')); ?>
            <img src="data:image/png;base64,<?php echo $ima;?>" alt="" width="65">
        </div>
        <div class="seccion2"><b>La Pelicula Repetida<b></div>
    </div>
<br><br><br><br><br><br><br><br>


<div align= "center">
    <h1>Lista de Usuarios</h1>
</div>

    <table>
        <thead>
            <tr class="table-primary text-white">
                <th>#</th>
                <th>NOMBRE</th>
                <th>CORREO</th>
                <th>TIPO</th>
            </tr>
        </thead>
        <tbody>
        <?php
            $num = 1;
            foreach ($filas as $fila) {
        ?>
            <tr>
                <td><?php echo $num++; ?></td>
                <td><?php echo $fila['nombre_usuario']; ?></td>
                <td><?php echo $fila['correo_usuario']; ?></td>
                <td><?php echo ($fila['tipo_usuario'] == 1) ? 'Administrador' : 'Usuario'; ?></td>
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