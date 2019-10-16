<?php include('../templates/header.html'); ?>

<body>

  <?php

    require("../config/conexion.php");


    $query = "SELECT DISTINCT region_tramitacion FROM recursos WHERE recursos.status='en trámite' OR recursos.status='aprobado';";
    $result = $db -> prepare($query);
    $result -> execute();
    $regiones = $result -> fetchAll();
    ?>

  <table class="table">
    <thead class="thead-dark">
      <tr>
        <th scope="col">Región</th>
      </tr>
    </thead>

    <tbody>
      <?php
      foreach ($regiones as $region) {
        echo "<tr> <td>$region[0]</td> </tr>";
      }
      ?>
    </tbody>

  </table>


<?php include('../templates/footer.html'); ?>
