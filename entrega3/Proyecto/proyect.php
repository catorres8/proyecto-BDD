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

    <table class="table tablee-striped">
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
    if (isset($_GET["page"])) { $page  = $_GET["page"]; } else { $page=1; };

    $records = 10; // change here for records per page
    $start_from = ($page-1) * $records;


    $qry = "SELECT COUNT(*) AS total FROM recursos WHERE nombre = '$proyecto';";
    $result = $db -> prepare($qry);
    $result -> execute();
    $row_sql = $result -> fetch();
    $total_records = $row_sql[0];
    $total_pages = ceil($total_records / $records);

    $qry2 = "SELECT * FROM recursos WHERE nombre = '$proyecto' ORDER BY id ASC LIMIT $records OFFSET $start_from;";
    $result = $db -> prepare($qry2);
    $result -> execute();
    $select = $result -> fetchAll();
     ?>

    <table class="table">
      <thead class="thead-dark">
        <tr>
          <th scope="col">Id</th>
          <th scope="col">Número</th>
          <th scope="col">Nombre</th>
          <th scope="col">Causa Contaminante</th>
          <th scope="col">Área Influencia</th>
          <th scope="col">Descrición</th>
          <th scope="col">Fecha Apertura</th>
          <th scope="col">Región Tramitante</th>
          <th scope="col">Comuna Tramitante</th>
          <th scope="col">Status</th>
          <th scope="col">ONG Asociada</th>
          <th scope="col">Fecha Dictamen</th>
        </tr>
      </thead>
      <tbody>
        <?php
        foreach ($select as $recurso) {
          echo "<tr>
                  <td>$recurso[0]</td>
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
                  <td>$recurso[11]</td></tr>";
        }
         ?>
      </tbody>
    </table>
    <?php
    for ($i=1; $i<=$total_pages; $i++) {
            echo "<a href='proyect.php?page=".$i."' class='yourclass'>".$i."</a>&nbsp;&nbsp;";
    }
    ?>
  </body>
</html>
