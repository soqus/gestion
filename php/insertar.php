<?php
include 'conexion_be.php';

// Obtén los valores enviados desde JavaScript
$rut = $_POST['rut'];
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
$sql = "INSERT INTO pacientes (RUT, NOMBRE, APELLIDO, EDAD, ENF_BASE, TELEFONO, DIRECCION, EMAIL, PRO_REAL) 
        VALUES ('$rut', '$nombre', '$apellido', '$edad', '$enf_base', '$telefono', '$direccion', '$email', '$pro_real')";

if ($conexion->query($sql) === TRUE) {
    echo "Datos insertados correctamente";
} else {
    echo "Error al insertar datos: " . $conexion->error;
}

// Cierra la conexión a la base de datos
$conexion->close();
?>
