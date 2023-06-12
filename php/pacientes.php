<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function () {
            $('#form-filtrar').on('submit', function (event) {
                event.preventDefault();
                var formData = $(this).serialize();
                $.ajax({
                    url: 'php/filtrar.php',
                    type: 'POST',
                    data: formData,
                    success: function (response) {
                        $('#tabla-body').html(response);
                    },
                    error: function (xhr, status, error) {
                        console.log(error);
                    }
                });
            });

            $('.form-ficha').on('submit', function (event) {
                event.preventDefault();
                var formData = $(this).serialize();
                $.ajax({
                    url: 'php/ficha_paciente.php',
                    type: 'POST',
                    data: formData,
                    success: function (response) {
                        // Hacer algo con la respuesta si es necesario
                        // Por ejemplo, mostrar la página "ficha_paciente.php" en una nueva pestaña:
                        $('#tabla-body').html(response);
                    },
                    error: function (xhr, status, error) {
                        console.log(error);
                    }
                });
            });
        });
    </script>
    
</head>

<body>
    <div class="table_container">
        <form id="form-filtrar" method="POST">
            <input id="rut_ficha" type="text" name="rut" placeholder="Ingrese el Rut">
            <button type="submit" id="filtrar">Filtrar</button>
        </form>
        <form action="php/nuevo_paciente.php">
            <button type="submit" id="nuevo_paciente" class="btn-right">Nuevo Paciente</button>
        </form>

        <div class="table-container">
            <table id="tabla" class="tabla-formato">
                <thead>
                    <th>Rut</th>
                    <th>Apellido</th>
                    <th>Nombre</th>
                    <th>Edad</th>
                    <th>Ficha</th>
                </thead>
                <tbody id="tabla-body">
                    <?php
                    include 'conexion_be.php';
                    $consulta = "SELECT RUT, NOMBRE, APELLIDO, EDAD FROM pacientes";
                    $resultado = mysqli_query($conexion, $consulta);
                    while ($row = mysqli_fetch_assoc($resultado)) {
                        ?>
                        <tr>
                            <form class="form-ficha" action="ficha_paciente.php" method="POST">
                                <td>
                                    <input type="text" id="rut_ficha" disabled name="rut_ficha" value="<?php echo $row['RUT']; ?>">
                                </td>
                                <td>
                                    <input type="text" disabled value="<?php echo $row['APELLIDO']; ?>">
                                </td>
                                <td>
                                    <?php echo $row['NOMBRE']; ?>
                                </td>
                                <td>
                                    <?php echo $row['EDAD']; ?>
                                </td>
                                <td><button type="submit">Ver ficha</button></td>
                            </form>
                        </tr>
                        <?php
                    }
                    ?>
                </tbody>
            </table>
        </div>
</body>

</html>
