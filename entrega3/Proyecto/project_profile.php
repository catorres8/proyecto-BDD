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

      $proyecto = $_POST['proyecto'];

      $query = "SELECT * FROM proyectos WHERE p_nombre = '$proyecto';";
      $result = $db2 -> prepare($query);
      $result -> execute();
      $proyectos = $result -> fetchAll();

      ?>

      <?php
      $tipos = array(
        "1" => "Mina",
        "2" => "Central",
        "3" => "Vertedero",
      );
       ?>

    <table class="table table-striped">
      <tbody>
        <?php
        foreach ($proyectos as $proyect) {
          $tipo = $proyect[1];
          echo "<tr> <th>Id</th> <td>$proyect[0]</td> </tr>
                     <tr> <th>Nombre</th> <td>$proyect[2]</td> </tr>
                     <tr> <th>Tipo</th> <td>$tipos[$tipo]</td> </tr>
                     <tr> <th>Latitud</th> <td>$proyect[3]</td> </tr>
                     <tr> <th>Longitud</th> <td>$proyect[4]</td> </tr>
                     <tr> <th>Región</th> <td>$proyect[5]</td> </tr>
                     <tr> <th>Comuna</th> <td>$proyect[6]</td> </tr>
                     <tr> <th>Apertura</th> <td>$proyect[7]</td> </tr>
                     <tr> <th>En Operación</th> <td>$proyect[8]</td> </tr>";
        }
        ?>
      </tbody>
    </table>
    <br>
    <h2>Recursos asociados al proyecto</h2>

    <?php
    $qry = "SELECT id, numero FROM recursos WHERE nombre = '$proyecto' ORDER BY id ASC;";
    $result = $db -> prepare($qry);
    $result -> execute();
    $recursos = $result -> fetchAll();
     ?>

     <table class="table table-striped">
       <tbody>
         <?php
         foreach ($recursos as $recurso) {
           echo "<tr> <td> <form action='recurso.php' method='post'>
                 <div class='form group'>
                  <input type='hidden' name='id_recurso' value='$recurso[0]'>
                   Recurso nro: <input class='btn btn-link' type='submit' value='$recurso[1]'>
                 </div>
                 </form> </td> </tr>";
         } ?>
       </tbody>
     </table>

  </body>
</html>
