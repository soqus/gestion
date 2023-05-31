<?php
include 'conexion_be.php';

if (isset($_POST['rut'])) {
    $rut = $_POST['rut'];

    // Consulta SQL con filtro por rut
    $consulta = "SELECT RUT, NOMBRE, APELLIDO, EDAD FROM pacientes WHERE RUT = '$rut'";
    $resultado = mysqli_query($conexion, $consulta);

    // Genera la tabla filtrada
    while ($row = mysqli_fetch_assoc($resultado)) {
        ?>
        <tr>
            <td><?php echo $row['RUT']; ?></td>
            <td><?php echo $row['APELLIDO']; ?></td>
            <td><?php echo $row['NOMBRE']; ?></td>
            <td><?php echo $row['EDAD']; ?></td>
            <td><div>kkk</div></td>
        </tr>
        <?php
    }
} else {
    // Si no se proporciona un Rut, muestra todos los registros
    $consulta = "SELECT RUT, NOMBRE, APELLIDO, EDAD FROM pacientes";
    $resultado = mysqli_query($conexion, $consulta);

    // Genera la tabla completa
    while ($row = mysqli_fetch_assoc($resultado)) {
        ?>
        <tr>
            <td><?php echo $row['RUT']; ?></td>
            <td><?php echo $row['APELLIDO']; ?></td>
            <td><?php echo $row['NOMBRE']; ?></td>
            <td><?php echo $row['EDAD']; ?></td>
            <td><div>kkk</div></td>
        </tr>
        <?php
    }
}
?>
