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
      $ong = $_POST['ong'];

      $query = "SELECT * FROM ongs WHERE nombre = '$ong';";
      $result = $db -> prepare($query);
      $result -> execute();
      $ong_data = $result -> fetchAll();
      ?>

      <table class="table table-striped">
        <tbody>
          <?php
          foreach ($ong_data as $data) {
            echo "<tr> <th>Id</th> <td>$data[0]</td> </tr>
                       <tr> <th>Nombre</th> <td>$data[1]</td> </tr>
                       <tr> <th>Pais</th> <td>$data[2]</td> </tr>
                       <tr> <th>Descripción</th> <td>$data[3]</td></tr>";
          }
          ?>
        </tbody>
      </table>

      <div class="container">
        <div class="row">
          <div class="col-md-6">
            <h2>Recursos asociados a la ONG</h2>

            <?php
            $query = "SELECT id, numero FROM recursos WHERE fecha_dictamen = '$ong' ORDER BY id ASC;";
            $result = $db -> prepare($query);
            $result->execute();
            $recursos_asociados = $result->fetchAll();
            ?>
            <table class="table table-striped">
              <tbody>
                <?php
                foreach ($recursos_asociados as $recurso) {
                  echo "<tr> <td> <form action='recurso.php' method='post'>
                  <div class='form group'>
                  <input type='hidden' name='id_recurso' value='$recurso[0]'>
                   Recurso nro: <input class='btn btn-link' type='submit' value='$recurso[1]'>
                 </div>
                  </form> </td> </tr>";
                } ?>
              </tbody>
            </table>

          </div>
          <div class="col-md-6">
          <h2>Movilizaciones que dirige la ONG</h2>

          <?php
          $query = "SELECT id, nombre_proyecto, tipo FROM movilizaciones WHERE ong = '$ong' ORDER BY id ASC;";
          $result = $db -> prepare($query);
          $result->execute();
          $movilizaciones_asociadas = $result->fetchAll();
          ?>
          <table class="table table-striped">
            <tbody>
              <?php
              foreach ($movilizaciones_asociadas as $movilizacion) {
                echo "<tr> <td> <form action='movilizacion.php' method='post'>
                      <div class='form group'>
                        <input type='hidden' name='id_mov' value='$movilizacion[0]'>
                        <input type='hidden' name='tipo_mov' value='$movilizacion[2]'>
                        Movilizacion contra: <input class='btn btn-link' type='submit' value='$movilizacion[1]'>
                      </div>
                      </form> </td> </tr>";
              } ?>
            </tbody>
          </table>
        </div>
        </div>
      </div>

  </body>
</html>
