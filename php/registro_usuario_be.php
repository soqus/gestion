<?php
include 'conexion_be.php';

$email = $_POST['email'];
$pass = $_POST['pass'];

//encripta pass
$pass = hash('sha512', $pass);

//verificar que el correo no exita en la BD
$verificar_correo = mysqli_query($conexion, "SELECT * FROM usuario WHERE email='$email' ");

if (mysqli_num_rows($verificar_correo) > 0) {
    echo '
            <script>
                alert("El email ya está registrado");
                window.location = "../login.php";
            </script>
        ';
    mysqli_close($conexion);
    exit();
}

//guarda datos en BD
$query = "INSERT INTO usuario(email, pass)
              VALUES ('$email', '$pass')";

$ejecutar = mysqli_query($conexion, $query);






if ($ejecutar) {
    echo '
            <script>
                alert("Usuario Registrado exitosamente");
                window.location = "../login.php";
            </script>

            ';
} else {
    echo '<script>
            alert("Error");
            window.location = "../registro.php";
            </script>
        ';
}

mysqli_close($conexion);

?>