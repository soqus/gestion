<?php
session_start();

if (!isset($_SESSION['usuario'])) {
    echo '
    <script>
        alert("por favor inicia sesion primero");
        window.location = "index.php";
    </script>
    ';
    session_destroy();
    die();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menu de horas</title>
    <link rel="stylesheet" href="menu_doc.css">
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

            if (isset($_SESSION['usuario'])) {
                // Sesión activa, mostrar botón "Cerrar sesión"
                echo '<button onclick="cerrar_sesion()">Cerrar sesión</button>';
            } else {
                // Sin sesión activa, mostrar botón "Iniciar sesión"
                echo '<button onclick="iniciar_sesion()" >Iniciar sesión</button>';
            }
            ?>
        </div>
    </header>
    <div class="table_container">

    <table id="tabla" class= "table-striped table-bordered">
        <thead>
            <th>id</th>
            <th>Nombre</th>
            <th>Apellido</th>
            <th>Enfermedad Base</th>
            <th>Celular</th>
            <th>Dirección</th>
            <th>F. Nacimiento</th>
            <th>Motivo Consulta</th>
        </thead>
        <tbody>
            <?php
            include 'php/conexion_be.php';
            $consulta = "SELECT ID, NOMBRE, APELLIDO, ENFERMEDAD, CELULAR, DIRECCION, FECHA, MOTIVO FROM horas";
            $resultado = mysqli_query($conexion, $consulta);
            while ($row = mysqli_fetch_assoc($resultado)) {
                ?>
                /*tabla que muestra las horas agendadas */
                <tr>
                    <td>
                        <?php echo $row['ID']; ?>
                    </td>
                    <td>
                        <?php echo $row['NOMBRE']; ?>
                    </td>
                    <td>
                        <?php echo $row['APELLIDO']; ?>
                    </td>
                    <td>
                        <?php echo $row['ENFERMEDAD']; ?>
                    </td>
                    <td>
                        <?php echo $row['CELULAR']; ?>
                    </td>
                    <td>
                        <?php echo $row['DIRECCION']; ?>
                    </td>
                    <td>
                        <?php echo $row['FECHA']; ?>
                    </td>
                    <td>
                        <?php echo $row['MOTIVO']; ?>
                    </td>
                </tr>
                <?php
            }
            ?>

        </tbody>

    </table>
        </div>


</body>

</html>