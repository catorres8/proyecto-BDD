<?php include('../templates/header.html'); ?>


<body>

  <?php

    require("../config/conexion.php");

    $fecha_a = $_POST["fecha_a"];
    $fecha_b = $_POST["fecha_b"];

    $query = "SELECT * FROM recursos WHERE fecha_apertura>='$fecha_a' AND fecha_apertura<='$fecha_b';";
    $result = $db -> prepare($query);
    $result -> execute();
    $recursos = $result -> fetchAll();
  ?>

  <table class="table">
    <thead class="thead-dark">
      <tr>
        <th scope="col">Id</th>
        <th scope="col">Numero</th>
        <th scope="col">Nombre</th>
        <th scope="col">Causa Contaminante</th>
        <th scope="col">Area Influencia</th>
        <th scope="col">Descripcion</th>
        <th scope="col">fecha_apertura</th>
        <th scope="col">Region</th>
        <th scope="col">Comuna</th>
        <th scope="col">Estatus</th>
        <th scope="col">Ong asociada</th>
        <th scope="col">Fecha Dictamen</th>
      </tr>
    </thead>

    <tbody>
        
      <?php
      foreach ($recursos as $recurso) {
        echo "<tr> <td>$recurso[0]</td>
                   <td>$recurso[1]</td>
                   <td>$recurso[2]</td>
                   <td>$recurso[3]</td>
                   <td>$recurso[4]</td>
                   <td>$recurso[5]</td>
                   <td>$recurso[6]</td>
                   <td>$recurso[7]</td>
                   <td>$recurso[8]</td>
                   <td>$recurso[9]</td>
                   <td>$recurso[10]</td>
                   <td>$recurso[11]</td> </tr>";
      }
      ?>
    </tbody>

  </table>



<?php include('../templates/footer.html'); ?>
