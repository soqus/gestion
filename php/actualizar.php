//actualizar paciente existente en la bd

<?php
include 'conexion_be.php';

// Obtén los valores enviados desde JavaScript
$rut = $_POST['rut_paciente'];
$nombre = $_POST['nombre'];
$apellido = $_POST['apellido'];
$edad = $_POST['edad'];
$enf_base = $_POST['enf_base'];
$telefono = $_POST['telefono'];
$direccion = $_POST['direccion'];
$email = $_POST['email'];
$pro_real = $_POST['pro_real'];

// Escapa los valores para evitar inyección de SQL
$rut = $conexion->real_escape_string($rut);
$nombre = $conexion->real_escape_string($nombre);
$apellido = $conexion->real_escape_string($apellido);
$edad = $conexion->real_escape_string($edad);
$enf_base = $conexion->real_escape_string($enf_base);
$telefono = $conexion->real_escape_string($telefono);
$direccion = $conexion->real_escape_string($direccion);
$email = $conexion->real_escape_string($email);
$pro_real = $conexion->real_escape_string($pro_real);

// Ejecuta la consulta SQL de inserción
$sql = "UPDATE pacientes SET NOMBRE = '$nombre', APELLIDO = '$apellido', EDAD = '$edad', ENF_BASE = '$enf_base', TELEFONO = '$telefono', DIRECCION = '$direccion', EMAIL = '$email', PRO_REAL = '$pro_real' WHERE RUT = '$rut'";

// Ejecutar la consulta
if (mysqli_query($conexion, $sql)) {
    echo "Los datos se han actualizado correctamente";
} else {
    echo "Error al actualizar los datos: " . mysqli_error($conexion);
}

// Cerrar la conexión a la base de datos
mysqli_close($conexion);
?>