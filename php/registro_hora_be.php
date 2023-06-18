
<?php

include 'conexion_be.php';

$nombre = $_POST['nombre'];
$apellido = $_POST['apellido'];
$rut = $_POST['rut'];
$fecha = $_POST['fecha'];
$hora = $_POST['hora'];
$motivo = $_POST['motivo'];



$sql = "INSERT INTO hora(nombre, apellido, rut, fecha, hora, motivo) VALUES ('$nombre', '$apellido', '$rut', '$fecha', '$hora', '$motivo')";
$resultado = mysqli_query($conexion, $sql);






echo '
<script>

    window.open ("https://sandbox.flow.cl/uri/WCJT63Jtv", "_blank");
    </script>
    ';




    
if ($resultado) {
    echo '
            <script>
            window.location="../index.php";
            </script>
        ';
}
?>