<?php
include 'conexion_be.php';

if (isset($_POST['rut'])) {
    $rut = $_POST['rut'];
    $consulta = "SELECT RUT, NOMBRE, APELLIDO, EDAD FROM pacientes WHERE RUT = '$rut'";
    $resultado = mysqli_query($conexion, $consulta);
    while ($row = mysqli_fetch_assoc($resultado)) { ?>

        <form action="">
            <label for="nombre_ficha">Nombre: </label>
            <input type="text" disabled value="<?php echo $row['RUT']; ?>">

        </form>

        <?php
    }
} ?>
