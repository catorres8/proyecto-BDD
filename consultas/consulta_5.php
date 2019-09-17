<?php include('../templates/header.html'); ?>


<body>

  <?php

    require("../config/conexion.php");

    $query = "SELECT ongs.nombre, movilizaciones.id, movilizaciones.nombre_proyecto, movilizaciones.presupuesto, movilizaciones.tipo
  	FROM ongs, movilizaciones
  	WHERE ongs.nombre = movilizaciones.ong
  	ORDER BY ongs.nombre, movilizaciones.presupuesto DESC;";
    $result = $db -> prepare($query);
    $result -> execute();
    $ongs = $result -> fetchAll();
    ?>

<div class="container">
    <table class="table">
      <thead class="thead-dark">
        <tr>
          <th scope="col">Nombre ONG</th>
          <th scope="col">Id Movilizacion</th>
          <th scope="col">Nombre Proyecto</th>
          <th scope="col">Presuouesto Anual</th>
          <th scope="col">Tipo de Movilizacion</th>
        </tr>
      </thead>

      <tbody>
        <?php
        foreach ($ongs as $ong) {
          echo "<tr> <td>$ong[0]</td>
                     <td>$ong[1]</td>
                     <td>$ong[2]</td>
                     <td>$ong[3]</td>
                     <td>$ong[4]</td> </tr>";
        }
        ?>
      </tbody>

    </table>

</div>


<?php include('../templates/footer.html'); ?>
