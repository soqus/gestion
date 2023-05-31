
/*No logré vincular en documentos apartes el script y el css asi que lo puse dentro del html. Para modificar estilos
de este archivo, modificarlos en el mismo html */

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
                event.preventDefault(); // Evita que se realice la acción por defecto del formulario (enviar y recargar la página)

                // Obtiene los datos del formulario
                var formData = $(this).serialize();

                // Realiza la solicitud AJAX
                $.ajax({
                    url: 'php/filtrar.php', // URL del archivo PHP que procesará los datos del formulario
                    type: 'POST', // Método HTTP utilizado
                    data: formData, // Datos del formulario enviados al servidor
                    success: function (response) {
                        // Se ejecuta cuando la solicitud AJAX se ha completado exitosamente
                        $('#tabla-body').html(response); // Reemplaza el contenido del cuerpo de la tabla con la respuesta del servidor
                    },
                    error: function (xhr, status, error) {
                        // Se ejecuta si ocurre un error durante la solicitud AJAX
                        console.log(error); // Muestra el mensaje de error en la consola del navegador
                    }
                });
            });
        });

    </script>
    <style>
        .tabla-formato {
            width: 100%;
            border-collapse: collapse;
        }

        .table-container {
        max-height: 300px;
        overflow-y: auto;
    }

  .table-scroll {
    overflow: auto;
    max-height: 100%;
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

</head>

<body>
    <div class="table_container">
        <form id="form-filtrar" method="POST">
            <input type="text" name="rut" placeholder="Ingrese el Rut">
            <button type="submit" id="filtrar">Filtrar</button>
        </form>

        <div class="table-container">
                <table id="tabla" class="tabla-formato">
                    <thead>
                        <th>Rut</th>
                        <th>Apellido</th>
                        <th>Nombre</th>
                        <th>Edad</th>
                        <th>-----</th>

                    </thead>
                    <tbody id="tabla-body">
                        <?php
                        include 'conexion_be.php';
                        $consulta = "SELECT RUT, NOMBRE, APELLIDO, EDAD FROM pacientes";
                        $resultado = mysqli_query($conexion, $consulta);
                        while ($row = mysqli_fetch_assoc($resultado)) {
                            ?>
                            <tr>
                                <td>
                                    <?php
                                    $rut = $row['RUT'];
                                    echo $rut ?>
                                </td>
                                <td>
                                    <?php echo $row['APELLIDO']; ?>
                                </td>
                                <td>
                                    <?php echo $row['NOMBRE']; ?>
                                </td>
                                <td>
                                    <?php echo $row['EDAD']; ?>
                                </td>
                                <td>
                                    <div>kkk</div>
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