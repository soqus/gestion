/*metodo para regstrar horas a la base de datos, no tocar xD */

<?php

include 'conexion_be.php';

$nombre = $_POST['nombre'];
$apellido = $_POST['apellido'];
$enfermedad = $_POST['EnfermedadBase'];
$celular = $_POST['celular'];
$direccion = $_POST['direccion'];
$fecha = $_POST['Fecha'];
$motivo = $_POST['motivo'];

echo '
<script>

    window.open ("https://sandbox.flow.cl/uri/WCJT63Jtv", "_blank");
    </script>
    ';

$sql = "INSERT INTO horas(nombre, apellido, enfermedad, celular, direccion, fecha, motivo) VALUES ('$nombre', '$apellido', '$enfermedad', '$celular', '$direccion', '$fecha', '$motivo')";
$resultado = mysqli_query($conexion, $sql);

if ($resultado) {
    echo '
            <script>
            window.location="../index.php";
            </script>
        ';
}
?>