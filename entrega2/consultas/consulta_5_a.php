<?php include('../templates/header.html'); ?>

<body>

<?php

  require("../config/conexion.php");

  $ong = $_POST["ong"];

  $query = "SELECT *
  FROM movilizaciones
  WHERE ong = '$ong'
  ORDER BY presupuesto DESC;";
  $result = $db -> prepare($query);
  $result -> execute();
  $movilizaciones = $result -> fetchAll();
  ?>


  <table class="table">
    <thead class="thead-dark">
      <tr>
        <th scope="col">Id</th>
        <th scope="col">Nombre Proyecto</th>
        <th scope="col">Presupuesto</th>
        <th scope="col">ONG</th>
        <th scope="col">Tipo</th>
      </tr>
    </thead>
    <tbody>
      <?php
      foreach ($movilizaciones as $movilizacion) {
        echo "<tr> <td>$movilizacion[0]</td>
                   <td>$movilizacion[1]</td>
                   <td>$movilizacion[2]</td>
                   <td>$movilizacion[3]</td>
                   <td>$movilizacion[4]</td></tr>";
      }
      ?>
    </tbody>

  </table>
<?php include('../templates/footer.html'); ?>
