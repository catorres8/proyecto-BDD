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

    $id_mov = $_POST['id_mov'];
    $tipo_mov = $_POST['tipo_mov'];

    $query = "SELECT * FROM movilizaciones WHERE id = '$id_mov';";
    $result = $db -> prepare($query);
    $result -> execute();
    $mov_data = $result -> fetchAll();

    if ($tipo_mov == 'marcha') {
      $query2 = "SELECT * FROM marchas WHERE id = '$id_mov';";
    } elseif ($tipo_mov == 'redes sociales') {
      $query2 = "SELECT * FROM redes_sociales WHERE id = '$id_mov';";
    }
    $result2 = $db -> prepare($query2);
    $result2 -> execute();
    $mov_data2 = $result2 -> fetchAll();
     ?>

    <table class="table table-striped">
      <tbody>
        <?php
        foreach ($mov_data as $data) {
          $ong = $data[3];
          foreach ($mov_data2 as $data2) {
            if ($data[0] == $data2[0]) {
              if ($data[4] == 'marcha') {
                echo "<tr> <th>Id</th> <td>$data[0]</td> </tr>
                           <tr> <th>Nombre Proyecto</th> <td>$data[1]</td> </tr>
                           <tr> <th>Presupuesto</th> <td>$data[2]</td> </tr>
                           <tr> <th>Tipo</th> <td>$data[4]</td> </tr>
                           <tr> <th>Nro Estimado de Personas</th> <td>$data2[1]</td> </tr>
                           <tr> <th>Lugar</th> <td>$data2[2]</td> </tr>
                           <tr> <th>Fecha</th> <td>$data2[3]</td> </tr>";
              } else {
                echo "<tr> <th>Id</th> <td>$data[0]</td> </tr>
                           <tr> <th>Nombre Proyecto</th> <td>$data[1]</td> </tr>
                           <tr> <th>Presupuesto</th> <td>$data[2]</td> </tr>
                           <tr> <th>Tipo</th> <td>$data[4]</td> </tr>
                           <tr> <th>Tipo de Contenido</th> <td>$data2[1]</td> </tr>
                           <tr> <th>Fecha de Inicio</th> <td>$data2[2]</td> </tr>
                           <tr> <th>Duración</th> <td>$data2[3] meses</td> </tr>";
              }
            }
          }
        }
        ?>
      </tbody>
    </table>

    <div class="container">
      <div class="row">
        <div class="col-md">
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
