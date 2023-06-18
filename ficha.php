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
                    // Sesión activa, mostrar botón "apartado medico"
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
    <?php

    // Obtén los valores enviados desde JavaScript
    $rut_paciente = $_POST['rut_paciente'];

    // Eliminar espacios en blanco al inicio y al final del valor
    $rut_paciente = trim($rut_paciente);

    // Verificar si el valor existe en la base de datos
    $consulta_verificacion = "SELECT COUNT(*) AS count FROM pacientes WHERE RUT = '$rut_paciente'";
    $resultado_verificacion = mysqli_query($conexion, $consulta_verificacion);
    $row_verificacion = mysqli_fetch_assoc($resultado_verificacion);
    $count = $row_verificacion['count'];

    if ($count == 0) {
        echo '<h2>No se encontró ningún registro con el Rut proporcionado.</h2>' . $rut_paciente;
        // Puedes redireccionar a otra página o mostrar un mensaje de error
    
        exit;
    }


    $consulta = "SELECT * FROM pacientes WHERE RUT = '$rut_paciente'";
    $resultado = mysqli_query($conexion, $consulta);

    // Genera la tabla completa
    while ($row = mysqli_fetch_assoc($resultado)) {
        ?>

        <div class="table_container">
            <div class="card" id="ficha">
                <h3 id="titulo">Ficha Paciente</h3>
                <div class="linea_1">
                    <div class="apartado">
                        <label for="rut">Rut: </label>
                        <input type="text" value="<?php echo $row['RUT']; ?>" placeholder="Ingrese Rut" name="rut" id="rut_paciente">
                    </div>
                    <div class="apartado">
                        <label for="nombre">Nombre: </label>
                        <input type="text" placeholder="Ingrese Nombre" value="<?php echo $row['NOMBRE']; ?>" name="nombre"
                            id="nombre">
                    </div>
                    <div class="apartado">
                        <label for="apellido">Apellido:</label>
                        <input type="text" placeholder="Ingrese Apellido" value="<?php echo $row['APELLIDO']; ?>"
                            name="apellido" id="apellido">
                    </div>
                    <div class="apartado">
                        <label for="edad">Edad: </label>
                        <input type="number" placeholder="Ingrese Edad" value="<?php echo $row['EDAD']; ?>" name="edad"
                            id="edad">
                    </div>
                </div>
                <div class="linea_2">
                    <div class="apartado">
                        <label for="enf_base">Enf. Base: </label>
                        <input type="text" value="<?php echo $row['ENF_BASE']; ?>" placeholder="Ingrese una enfermedad base"
                            name="enf_base" id="enf_base">
                    </div>
                    <div class="apartado">
                        <label for="telefono">Telefono: </label>
                        <input type="text" value="<?php echo $row['TELEFONO']; ?>" placeholder="Ingrese telefono"
                            name="telefono" id="telefono">
                    </div>
                    <div class="apartado">
                        <label for="direccion">Direccion: </label>
                        <input type="text" value="<?php echo $row['DIRECCION']; ?>" placeholder="Ingrese direccion"
                            name="direccion" id="direccion">
                    </div>
                    <div class="apartado">
                        <label for="email">Email: </label>
                        <input type="text" value="<?php echo $row['EMAIL']; ?>" placeholder="Ingrese email" name="email"
                            id="email">
                    </div>
                    <div id="historial">
                        <h3>Historial: </h3>
                    </div>
                    <div id="area">
                        <textarea type="text" <?php echo $row['PRO_REAL']; ?>
                            placeholder="Ingrese procesos realizados" name="pro_real" id="pro_real"><?php echo $row['PRO_REAL']; ?></textarea>
                    </div>

                </div>


            </div>
            <a href="#" id="guardar">Guardar</a>
        </div>
        <?php
    }
    ; ?>
    <script src=actualizar_paciente.js></script>
</body>

</html>