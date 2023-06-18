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
    <link rel="stylesheet" href="nuevo_paciente.css" type="text/css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    
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
            <li>
                <?php if (isset($_SESSION['usuario'])) {
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
    <div class="menu_lateral">
        <ul>
            <li><a href="horas_agendadas.php">Horas Agendadas</a></li>
            <li><a href="pacientes.php">Pacientes</a></li>
            <li><a href="registro.php">Registrar Usuario</a></li>
        </ul>
    </div>

    <div class="table_container">
        <div class="card" id="ficha_nuevo">
            <h3 id="titulo">Paciente nuevo</h3>
            <div class="linea_1">
                <div class="apartado">
                    <label for="rut">Rut: </label>
                    <input type="text" placeholder="Ingrese Rut" name="rut" id="rut">
                </div>
                <div class="apartado">
                    <label for="nombre">Nombre: </label>
                    <input type="text" placeholder="Ingrese Nombre" name="nombre" id="nombre">
                </div>
                <div class="apartado">
                    <label for="apellido">Apellido:</label>
                    <input type="text" placeholder="Ingrese Apellido" name="apellido" id="apellido">
                </div>
                <div class="apartado">
                    <label for="edad">Edad: </label>
                    <input type="number" placeholder="Ingrese Edad" name="edad" id="edad">
                </div>
            </div>
            <div class="linea_2">
                <div class="apartado">
                    <label for="enf_base">Enf. Base: </label>
                    <input type="text" placeholder="Ingrese una enfermedad base" name="enf_base" id="enf_base">
                </div>
                <div class="apartado">
                    <label for="telefono">Telefono: </label>
                    <input type="text" placeholder="Ingrese telefono" name="telefono" id="telefono">
                </div>
                <div class="apartado">
                    <label for="direccion">Direccion: </label>
                    <input type="text" placeholder="Ingrese direccion" name="direccion" id="direccion">
                </div>
                <div class="apartado">
                    <label for="email">Email: </label>
                    <input type="text" placeholder="Ingrese email" name="email" id="email">
                </div>
                <div id="historial">
                    <h3>Historial: </h3>
                </div>
                <div id="area">
                <textarea type="text" placeholder="Ingrese procesos realizados" name="pro_real" id="pro_real"></textarea>
                </div>
                
            </div>
            

        </div>
        <a href="#" id="guardar">Guardar</a>
    </div>
    <script src=funciones.js></script>
</body>
</html>