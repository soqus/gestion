<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PodoClear</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="registro.css">
    <script src=funciones.js></script>
</head>

<body>

    <!--navigation-->
    <header class="sticky">
        <a href="#" class="logo">PodoClear<span>.</span></a>
        <div class="menuToggle" onclick="toggleMenu();"></div>
        <ul class="navigation">
            <li><a href="index.php#banner" onclick="toggleMenu();">Inicio</a></li>
            <li><a href="index.php#acerca" onclick="toggleMenu();">Acerca de Dra.</a></li>
            <li><a href="informate.php" onclick="toggleMenu();">Informate</a></li>
            <li><a href="AgendarHora.php" onclick="toggleMenu();">Atencion</a></li>
            <li><a href="index.php#contacto" onclick="toggleMenu();">Contacto</a></li>
            <li><a href="Galeria.php" onclick="toggleMenu();">Galeria</a></li>
            <li><?php if (isset($_SESSION['usuario'])) {
                // Sesión activa, mostrar botón "Cerrar sesión"
                echo '<a href="vista_medica.php" onclick="toggleMenu();">Apartado médico</a>';
            }
            ?>
            </li>
        </ul>
        <div>
            <?php
            if(isset($_SESSION['usuario'])) {
                // Sesión activa, mostrar botón "Cerrar sesión"
                echo '<button onclick="cerrar_sesion()">Cerrar sesión</button>';
            } else {
                // Sin sesión activa, mostrar botón "Iniciar sesión"
                echo '<button onclick="iniciar_sesion()" >Iniciar sesión</button>';
            }
            ?>
        </div>
    </header>
            /*Apartado de registro de usuario. */
    <div class="card">
        <div class="register-section">
            <h2>Registrar nuevo usuario</h2>
            <form action="php/registro_usuario_be.php" method="POST" class="formulario_register">
                <input type="email" class="input-field" name="email" placeholder="Aquí tu email">
                <input type="password" class="input-field" name="pass" placeholder="Aquí tu password">
                <button>Registrar</button>
            </form>
        </div>
    </div>
</body>

</html>