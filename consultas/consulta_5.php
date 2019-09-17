<?php include('../templates/header.html'); ?>


<body>

    <?php
    require("../config/conexion.php");

    $query = "SELECT nombre FROM ongs ORDER BY nombre ASC;";
    $result = $db -> prepare($query);
    $result -> execute();
    $ongs = $result -> fetchAll();

   ?>

<div class="container">
    <table class="table">
      <thead class="thead-dark">
        <tr>
          <th scope="col">ONGs</th>
        </tr>
      </thead>

      <tbody>

        <?php

        foreach ($ongs as $ong) {
          echo "<tr> <td> <form action='consulta_5_a.php' method='post'>
            <div class='form group'>
              <input class='btn btn-secondary' type='submit' name='ong' value='$ong[0]'>
            </div>
          </form> </td> </tr>";
        }

       ?>
      </tbody>

    </table>

</div>


<?php include('../templates/footer.html'); ?>
