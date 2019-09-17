<?php include('../templates/header.html'); ?>


<body>

  <?php

    require("../config/conexion.php");


    $fecha_a = $_POST["fecha_a"];
    $fecha_b = $_POST["fecha_b"];

    if ($fecha_a == '') {
      $fecha_a = '2020-01-01';
    }

    if ($fecha_b == '') {
      $fecha_b = '2020-12-31';
    }

    $query = "SELECT *
    FROM marchas
    WHERE fecha >= '$fecha_a'
      AND fecha <= '$fecha_b';";
    $result = $db -> prepare($query);
    $result -> execute();
    $marchas = $result -> fetchAll();

  ?>


  <table class="table">
    <thead class="thead-dark">
      <tr>
        <th scope="col">Id</th>
        <th scope="col">Numero Estimado Personas</th>
        <th scope="col">Lugar</th>
        <th scope="col">Fecha</th>
        <th scope="col">Tipo</th>
      </tr>
    </thead>

    <tbody>
      <?php
      foreach ($marchas as $marcha) {
        echo "<tr>
                <td>$marcha[0]</td>
                <td>$marcha[1]</td>
                <td>$marcha[2]</td>
                <td>$marcha[3]</td>
                <td>$marcha[4]</td> </tr>";
      }
      ?>
    </tbody>

  </table>


<?php include('../templates/footer.html'); ?>
