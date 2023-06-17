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
  $(document).ready(function() {
    $('#form-filtrar').submit(function(event) {
      event.preventDefault(); // Evita que el formulario se envíe de forma convencional

      // Obtén el valor del rut ingresado
      var rut = $('#rut_ficha').val();

      // Realiza la solicitud AJAX al archivo PHP que obtiene los datos del paciente
      $.ajax({
        url: 'php/filtrar.php', // Ruta al archivo PHP que obtiene los datos del paciente
        method: 'POST',
        data: { rut: rut }, // Envía el rut al servidor
        success: function(response) {
          // Actualiza el contenido del contenedor con los datos del paciente recibidos en la respuesta
          $('#paciente-info').html(response);
        },
        error: function() {
          alert('Error al obtener los datos del paciente');
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
            position: relative;
        }

        .table-scroll {
            overflow: auto;
            max-height: 100%;
        }

        .btn-right {
            position: absolute;
            right: 150px;
            transform: translateY(-260%);
        }

        #filtrar {
            margin-bottom: 3%;
        }

        .posi-inp {
            
            margin-right: 10px;
            margin-bottom: 10px;
        }

        label,
        input[type="submit"] {
            /*display: block;*/
            margin-bottom: 10px;
        }

        input[type="submit"] {
            background-color: lightblue;
            border: 2px solid #000;
            color: #fff;
            margin-top: 20px;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
        }

        textarea {
            resize: vertical;
            min-width: 70%;
            min-height: 150px;
            /* Cambia este valor para ajustar el tamaño por defecto */
        }

        #rut {
            margin-left: 46px;
        }

        #nombre {
            margin-left: 3px;
        }

        #apellido {
            margin-left: 10px;
        }

        #edad {
            margin-left: 35px;
        }

        #enf_base {
            margin-left: 1px;
        }

        #email {
            margin-left: 27px;
        }
    </style>
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
    </div>
    <div id="ficha-paciente">
        <form method="POST">
            <div>
                <div class="posi-inp">
                    <label for="rut">Rut: </label>
                    <input type="text" id="rut" name="rut" required>
                </div>
                <div class="posi-inp">
                    <label for="nombre">Nombre:</label>
                    <input type="text" id="nombre" name="nombre" required>
                </div>
                <div class="posi-inp">
                    <label for="apellido">Apellido:</label>
                    <input type="text" id="apellido" name="apellido" required>
                </div>
                <div class="posi-inp">
                    <label for="edad">Edad:</label>
                    <input type="text" id="edad" name="edad" required>
                </div>
            </div>
            <div>
                <div class="posi-inp">
                    <label for="enf_base">Enf. Base:</label>
                    <input type="text" id="enf_base" name="enf_base" required>
                </div>
                <div class="posi-inp">
                    <label for="Telefono">Telefono:</label>
                    <input type="text" id="Telefono" name="Telefono" required>
                </div>
                <div class="posi-inp">
                    <label for="direccion">Direccion:</label>
                    <input type="text" id="direccion" name="direccion" required>
                </div>
                <div class="posi-inp">
                    <label for="email">Email:</label>
                    <input type="text" id="email" name="email" required>
                </div>
            </div>
            <div>
                <div class="posi-inp">
                    <label for="pro_real">Historial:</label>
                </div>
            </div>
            <textarea id="pro_real" name="pro_real"></textarea>



        </form>

    </div>
</body>

</html>