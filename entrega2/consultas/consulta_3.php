<?php include('../templates/header.html'); ?>

<body>

  <?php

    require("../config/conexion.php");

    $proyecto = $_POST["proyecto"];

    $query = "SELECT ongs.id, ongs.nombre, ongs.pais, ongs.descripcion
    FROM ongs, ongs_participantes
    WHERE ongs.nombre= ongs_participantes.ong
    AND ongs_participantes.proyecto='$proyecto';";
    $result = $db -> prepare($query);
    $result -> execute();
    $ongs = $result -> fetchAll();
    ?>

  <table class="table">
    <thead class="thead-dark">
      <tr>
        <th scope="col">Id</th>
        <th scope="col">Nombre ONG</th>
        <th scope="col">País de origen</th>
        <th scope="col">Descripcion</th>
      </tr>
    </thead>

    <tbody>
      <?php
      foreach ($ongs as $ong) {
        echo "<tr> <td>$ong[0]</td>
                   <td>$ong[1]</td>
                   <td>$ong[2]</td>
                   <td>$ong[3]</td> </tr>";
      }
      ?>
    </tbody>

  </table>



<?php include('../templates/footer.html'); ?>
