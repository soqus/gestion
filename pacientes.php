<?php
session_start();
include 'php/conexion_be.php';
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
    <title>PodoClear</title>
    <link rel="stylesheet" href="pacientes.css" type="text/css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
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
            ?></li>
            
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
    <div class="menu_lateral">
    <ul>
    <li><a href="horas_agendadas.php">Horas Agendadas</a></li>
      <li><a href="pacientes.php">Pacientes</a></li>
      <li><a href="registro.php">Registrar Usuario</a></li>
    </ul>
  </div>

<div class="botones">
<form action="" method="POST">
    <input type="text" placeholder="12345678-9">
    <button type="submit">Filtrar</button>
</form>
        <a href="" id="nuevo_paciente">Nuevo paciente</a>
    <h3>Pacientes</h3>
</div>
  <div class="table_container">
    <table id="tabla" class= "tabla-formato">
        <thead>
            <th>Rut</th>
            <th>Nombre</th>
            <th>Apellido</th>
            <th>Edad</th>
            <th>Fichas</th>
        </thead>
        <tbody>
            <?php
            $consulta = "SELECT *  FROM pacientes";
            $resultado = mysqli_query($conexion, $consulta);
            while ($row = mysqli_fetch_assoc($resultado)) {
                ?>
                <tr>
                    <td>
                        <?php echo $row['RUT']; ?>
                    </td>
                    <td>
                        <?php echo $row['NOMBRE']; ?>
                    </td>
                    <td>
                        <?php echo $row['APELLIDO']; ?>
                    </td>
                    <td>
                        <?php echo $row['EDAD']; ?>
                    </td>
                    <td>Ver ficha</td>
                </tr>
                <?php
            }
            ?>

        </tbody>

    </table>
        </div>
  </body>
</html>