<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" rel="stylesheet" />
  <link rel="stylesheet" href="agendar.css">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.10.2/fullcalendar.min.css">
  
</head>

<body>

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
  <section>
  <form action="" method="POST">
    <label for="nombre">Nombre:</label>
    <input type="text" id="nombre" name="nombre" required>

    <label for="apellido">Apellido:</label>
    <input type="text" id="apellido" name="apellido" required>

    <label for="rut">RUT:</label>
    <input type="text" id="rut" name="rut" pattern="[0-9]{8}-[0-9Kk]{1}" placeholder="Formato: 11111111-1" required>
    <label for="fecha_consulta">Fecha de consulta:</label>
    <input type="date" name="fecha" id="fecha" placeholder="Introduce una fecha" required min=<?php $hoy=date("Y-m-d"); echo $hoy;?> />
    <div class="error-message" id="fecha_error"></div>

    <label for="hora_consulta">Hora de consulta:</label>
    <select id="hora_consulta" name="hora_consulta" required>
      <option disabled selected>Selecciona una hora</option>
      <option value="09:00">9:00</option>
      <option value="10:00">10:00</option>
      <option value="11:00">11:00</option>
      <option value="12:00">12:00</option>
      <option value="13:00">13:00</option>
      <option value="14:00">14:00</option>
      <option value="15:00">15:00</option>
      <option value="16:00">16:00</option>
    </select>

    <label for="motivo">Motivo de la consulta:</label>
    <textarea id="motivo" name="motivo" required></textarea>

    <label for="valor_pagar">Valor a pagar: $18.000</label>

    <input type="submit" value="Pagar">
  </form>
  </section>

  <script src=funciones.js></script>
  <script src="agendar_horas.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/dayjs@1.10.6/dayjs.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.10.2/fullcalendar.min.js"></script>
</body>

</html>