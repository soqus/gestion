<?php
session_start();
include 'conexion_be.php';

$email = $_POST['email'];
$pass = $_POST['pass'];
$pass = hash('sha512', $pass);

$validar_login = mysqli_query($conexion, "SELECT * FROM usuario WHERE email='$email' AND pass='$pass'");


if (mysqli_num_rows($validar_login) > 0) {
    $_SESSION['usuario'] = $email;
    header("location: ../vista_medica.php");
    exit();
} else {
    echo '
            <script>
                alert("Usuario no existe");
                window.location="../index.php";
                </script>
        ';
    exit();
}

?>