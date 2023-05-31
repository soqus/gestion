<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menu de horas</title>
    <script src=funciones.js></script>
</head>
<style>
    .tabla-formato {
    width: 100%;
    border-collapse: collapse;
  }

  .tabla-formato th,
  .tabla-formato td {
    padding: 8px;
    text-align: left;
    border-bottom: 1px solid #ddd;
  }

  .tabla-formato th {
    background-color: #f2f2f2;
  }
</style>

<body>
    <div class="table_container">

    <table id="tabla" class= "tabla-formato">
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
            include 'conexion_be.php';
            $consulta = "SELECT ID, NOMBRE, APELLIDO, ENFERMEDAD, CELULAR, DIRECCION, FECHA, MOTIVO FROM horas";
            $resultado = mysqli_query($conexion, $consulta);
            while ($row = mysqli_fetch_assoc($resultado)) {
                ?>
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