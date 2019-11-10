<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=devide-width, initial-scale=1">

        <link rel="stylesheet" href="css/bootstrap.min.css">
        <link rel="stylesheet" href="css/styles.css">
        <title>Grupo 76-87</title>
    </head>
  <body>
    <?php

      include 'config/conexion_cris.php';

      $id_recurso = $_POST['id_recurso'];

      $query = "SELECT * FROM recursos WHERE id = '$id_recurso';";
      $result = $db -> prepare($query);
      $result -> execute();
      $recurso_data = $result -> fetchAll();

      ?>

      <table class="table table-striped">
        <tbody>
          <?php
          foreach ($recurso_data as $data) {
            $proyecto = $data[2];
            $ong = $data[10];
            echo "<tr> <th>Id</th> <td>$data[0]</td> </tr>
                       <tr> <th>Número</th> <td>$data[1]</td> </tr>
                       <tr> <th>Causa Contaminante</th> <td>$data[3]</td> </tr>
                       <tr> <th>Area Influencia</th> <td>$data[4]</td> </tr>
                       <tr> <th>Descripción</th> <td>$data[5]</td> </tr>
                       <tr> <th>Fecha Apertura</th> <td>$data[6]</td> </tr>
                       <tr> <th>Región de Tramitación</th> <td>$data[7]</td> </tr>
                       <tr> <th>Comuna de Tramitación</th> <td>$data[8]</td> </tr>
                       <tr> <th>Status</th> <td>$data[9]</td> </tr>
                       <tr> <th>Fecha de Dictamen</th> <td>$data[11]</td> </tr>";
          }
          ?>
        </tbody>
      </table>
      <div class="container">
        <div class="row">
          <div class="col-md-6">
            <h2>Proyecto</h2>
            <?php
            echo "<tr> <td> <form action='project_profile.php' method='post'>
                  <div class='form group'>
                    <input class='btn btn-link' type='submit' name='proyecto' value='$proyecto'>
                  </div>
                  </form> </td> </tr>";
            ?>

          </div>
          <div class="col-md-6">
            <h2>ONG</h2>
            <?php
            echo "<tr> <td> <form action='ong_profile.php' method='post'>
                  <div class='form group'>
                    <input class='btn btn-link' type='submit' name='ong' value='$ong'>
                  </div>
                  </form> </td> </tr>";
             ?>

          </div>
        </div>
      </div>
  </body>
</html>
