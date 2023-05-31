
/*Pagina utilizada para hacer pruebas  :3, no tomar en cuenta  */



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
</head>
<body>
<form method="POST" action="filtrar.php">
  <input type="text" name="filtro-rut" placeholder="Ingrese el rut a filtrar">
  <button type="submit">Filtrar</button>
</form>

<table>
  <thead>
    <tr>
      <th>Nombre</th>
      <th>Apellido</th>
      <th>Rut</th>
    </tr>
  </thead>
  <tbody>
      <?php
      // Conectar a la base de datos y realizar la consulta filtrando por rut
      $filtroRut = $_POST['filtro-rut'];
      include 'conexion_be.php';
    
      // Ejemplo de consulta SQL utilizando PDO
      $sql = "SELECT * FROM pacientes WHERE RUT = :rut";
      $stmt = $pdo->prepare($sql);
      $stmt->bindParam(':rut', $filtroRut);
      $stmt->execute();
      
      // Mostrar los resultados en las filas de la tabla
      while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        echo "<tr>";
        echo "<td>".$row['nombre']."</td>";
        echo "<td>".$row['apellido']."</td>";
        echo "<td>".$row['rut']."</td>";
        echo "</tr>";
      }
    ?>
  </tbody>
</table>
  
</body>
</html>
