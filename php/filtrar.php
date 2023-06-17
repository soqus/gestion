<?php
include 'conexion_be.php';
// Obtén el rut enviado por AJAX
$rut = $_POST['rut'];

// Realiza la consulta para obtener los datos del paciente con el rut indicado
$query = "SELECT * FROM pacientes WHERE rut = '$rut'";
$result = $conn->query($query);

// Verifica si se encontraron resultados
if ($result->num_rows > 0) {
    // Obtén los datos del paciente
    $row = $result->fetch_assoc();
    $nombre = $row['NOMBRE'];
    $apellido = $row['APELLIDO'];
    $edad = $row['EDAD'];
    $enf_base =$row['ENF_BASE'];
    $telefono =$row['TELEFONO'];
    $direccion =$row['DIRECCION'];
    $email =$row['EMAIL'];
    $pro_real =$row['PRO_REAL'];
    


// Genera la respuesta HTML con los datos del paciente
$response = '<div>';
$response .= '<p>Nombre: ' . $nombre . '</p>'; // Suponiendo que $nombre contiene el nombre del paciente obtenido de la base de datos
$response .= '<p>Apellido: ' . $apellido . '</p>'; // Suponiendo que $apellido contiene el apellido del paciente obtenido de la base de datos
// Agrega aquí los demás campos del paciente

$response .= '</div>';

// Envía la respuesta al cliente
echo $response;
}else{
    echo "No se encontraron resultados para el rut indicado";
}
// Cierra la conexión a la base de datos
$conn->close();
?>
