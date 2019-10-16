<?php include('../templates/header.html'); ?>

<body>

  <?php

    require("../config/conexion.php");

    $query = "SELECT DISTINCT nombre FROM recursos WHERE status = 'en trámite';";
    $result = $db -> prepare($query);
    $result -> execute();
    $proyectos = $result -> fetchAll();
    ?>

  <table class="table">
    <thead class="thead-dark">
      <tr>
        <th scope="col">Proyectos</th>
        <th scope="col">Marchas</th>
        <th scope="col">Redes sociales</th>
      </tr>
    </thead>

    <tbody>
      <?php
      foreach ($proyectos as $proyecto) {
        echo "<tr>
        <td> $proyecto[0] </td>
        <td>
        <form action='consulta_6_a.php' method='post'>
          <div class='form group'>
            <input class='btn btn-secondary' type='submit' name='proyecto' value='Ver marchas'>
          </div>
        </form>
        </td>
        <td>
        <form action='consulta_6_b.php' method='post'>
          <div class='form group'>
            <input class='btn btn-secondary' type='submit' name='proyecto' value='Ver eventos de RRSS'>
          </div>
        </form>
        </td> </tr>";
      }
      ?>
    </tbody>

  </table>
<label></label>

<?php include('../templates/footer.html'); ?>
